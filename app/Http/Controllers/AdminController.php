<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusNotification;
use App\Models\User;
use App\Models\Category; 
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Feedback;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function home()
{
    if (Auth::check() && Auth::user()->role === 'admin') {
        
        $total_sales = Order::where('payment_status', 'paid')->sum('total_price');
        $new_orders = Order::where('status', 'new')->count();
        $total_users = User::where('role', 'user')->count();
        $total_orders = Order::count(); 
        $previous_month_sales = Order::whereMonth('created_at', now()->subMonth()->month)
                                     ->where('payment_status', 'paid')
                                     ->sum('total_price');  

        $percentage_sales = $previous_month_sales > 0 ? (($total_sales - $previous_month_sales) / $previous_month_sales) * 100 : 0;

        $userData = User::selectRaw('MONTH(created_at) as month, COUNT(*) as user_count')
                        ->groupBy(DB::raw('MONTH(created_at)'))
                        ->orderBy(DB::raw('MONTH(created_at)'))
                        ->get();

        if ($userData->isEmpty()) {
            $months = [];
            $user_counts = [];
        } else {
            $months = $userData->pluck('month')->toArray();
            $user_counts = $userData->pluck('user_count')->toArray();
        }

        $previous_month_user_count = User::whereMonth('created_at', now()->subMonth()->month)->count();
        $percentage_users = $previous_month_user_count > 0 ? (($total_users - $previous_month_user_count) / $previous_month_user_count) * 100 : 0;

        $total_products = Product::count();

        $recent_orders = Order::with('products')->latest()->take(10)->get();
        $revenue = Order::sum('total_price');  

        $delivered_orders = Order::where('delivery_status', 'delivered')->count();

        $processing_orders = Order::where('status', 'processing')->count();

        
        $sold_products = Product::sum('quantity_sold');

       
        return view('admin.admin_blade', compact(
    'total_users', 'total_sales', 'new_orders', 'months', 'user_counts', 'percentage_sales', 'percentage_users', 'recent_orders', 'total_products', 'delivered_orders', 'processing_orders', 'sold_products', 'revenue', 'total_orders'
));

    } else {
        return redirect('/');
    }
}

    



    public function showOrder()
    {
        $order = \App\Models\Order::with(['product', 'customer'])->where('payment_status', 'paid')->first();
        
        dd($order->product->title, $order->customer->name);
    }
    
 
    public function approveOrder($id)
{
    try {
        $order = Order::findOrFail($id);
        
        if ($order->delivery_status !== 'pending') {
            return redirect()->back()->with('warning', 'Only pending orders can be approved');
        }

        $order->delivery_status = 'approved';
        $order->save();
        
        Mail::to($order->email)->send(new OrderStatusNotification($order, 'approved'));
        
        return redirect()->back()->with('success', 'Order approved successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to approve order: ' . $e->getMessage());
    }
}

public function declineOrder($id)
{
    try {
        $order = Order::findOrFail($id);
        
        if (!in_array($order->delivery_status, ['pending', 'processing'])) {
            return redirect()->back()->with('warning', 'Only pending or processing orders can be declined');
        }

        $order->delivery_status = 'declined';
        $order->save();
        
        Mail::to($order->email)->send(new OrderStatusNotification($order, 'declined'));
        
        return redirect()->back()->with('success', 'Order declined successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to decline order: ' . $e->getMessage());
    }
}

public function deliverOrder($id)
{
    try {
        $order = Order::findOrFail($id);
        
        if (!in_array($order->delivery_status, ['approved', 'processing', 'shipped'])) {
            return redirect()->back()->with('warning', 'Only approved or processing orders can be marked as delivered');
        }

        $order->delivery_status = 'delivered';
        $order->save();
        
        Mail::to($order->email)->send(new OrderStatusNotification($order, 'delivered'));
        
        return redirect()->back()->with('success', 'Order marked as delivered successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to mark order as delivered: ' . $e->getMessage());
    }
}

public function shipOrder(Request $request, $id)
{
    $request->validate([
        'tracking_number' => 'required|string|max:255'
    ]);

    try {
        $order = Order::findOrFail($id);
        
        if ($order->delivery_status !== 'approved') {
            return redirect()->back()->with('warning', 'Only approved orders can be shipped');
        }

        $order->delivery_status = 'shipped';
        $order->tracking_number = $request->tracking_number;
        $order->save();
        
        
        Mail::to($order->email)->send(new OrderStatusNotification($order, 'shipped'));
        
        return redirect()->back()->with('success', 'Order marked as shipped with tracking number!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to ship order: ' . $e->getMessage());
    }
}
    
    public function deleteOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
    
            if ($order->preview_image) {
                if (Storage::disk('public')->exists($order->preview_image)) {
                    Storage::disk('public')->delete($order->preview_image);
                }
                elseif (file_exists(public_path($order->preview_image))) {
                    unlink(public_path($order->preview_image));
                }
            }
    
            $order->delete();
    
            return redirect()->back()->with('success', 'Order deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete order: ' . $e->getMessage());
        }
    }
    
    



    public function viewOrders()
    {
        $orders = Order::with(['products', 'customer'])
                     ->orderBy('created_at', 'desc')
                     ->paginate(10);
        
        $orders->transform(function ($order) {
            if ($order->preview_image) {
                if (file_exists(public_path($order->preview_image))) {
                    $order->preview_image = asset($order->preview_image);
                } 
                elseif (Storage::exists($order->preview_image)) {
                    $order->preview_image = asset('storage/' . $order->preview_image);
                } 
                else {
                    $order->preview_image = null;
                }
            }
            return $order;
        });
        
        return view('admin.orders', compact('orders'));
    }

public function SearchOrder(Request $request)
{
    $searchText = $request->input('search');
    
    $orders = Order::with(['products', 'customer'])
        ->where('tracking_id', 'LIKE', "%$searchText%")
        ->orWhereHas('customer', function($query) use ($searchText) {
            $query->where('name', 'LIKE', "%$searchText%")
                  ->orWhere('email', 'LIKE', "%$searchText%");
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10)
        ->appends(['search' => $searchText]);
    
    return view('admin.orders', compact('orders'));
}


    public function ViewCategory()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {

                $categories = Category::all();
                return view('admin.category', compact('categories'));
                
            } else {
                return redirect('admin/login');
            }

    }

    public function AddCategory(Request $request)
    {
            if (Auth::check() && Auth::user()->role === 'admin') {

                $data = new Category();
                $data->category_name = $request->category;
                $data->save();
                return redirect()->back()->with('message', 'Category Added Successfully');
            } else {
                return redirect('admin/login');
            }
        

    }

    public function DeleteCategory($id)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $category = Category::find($id);

            if ($category) {
                $category->delete();
                return redirect()->back()->with('message', 'Category deleted successfully.');
            } else {
                return redirect()->back()->with('error', 'Category not found.');
            }
        } else {
            return redirect('admin/login');
        }
    }


    
    public function AddProduct(Request $request)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'discount_price' => 'nullable|numeric|min:0|lt:price',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ], [
                'image.required' => 'The product image is required.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'Only JPEG, PNG, JPG, GIF, SVG, and WEBP formats are allowed.',
                'image.max' => 'The image size must be less than 2MB.',
                'discount_price.lt' => 'Discount price must be less than regular price.'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            try {
                $product = new Product();
                $product->title = $request->title;
                $product->category = $request->category;
                $product->price = $request->price;
                $product->discount_price = $request->discount_price;

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    
                    $imageName = 'product_'.time().'.'.$image->getClientOriginalExtension();
                    
                    $path = $image->storeAs('products_images', $imageName, 'public');
                    
                    $product->image = $path;
                }

                $product->save();

                Alert::success('Success', 'Product added successfully!');
                return redirect()->route('admin.show_product');

            } catch (\Exception $e) {
                Alert::error('Error', 'There was a problem saving the product: '.$e->getMessage());
                return redirect()->back()->withInput();
            }
        }
        return redirect('admin/login');
    }
    
   
    public function addProductForm()
{
    $categories = Category::all(['id', 'category_name']);
    return view('admin.add_product', compact('categories'));
}


public function storeProduct(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'discount_price' => 'nullable|numeric|min:0|lt:price',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    ]);

    $product = new Product();
    $product->title = $request->title;
    $product->category_id = $request->category_id;
    $product->price = $request->price;
    $product->discount_price = $request->discount_price ?? 0;
    $product->stock = $request->stock;
    $product->low_stock_threshold = $request->low_stock_threshold;
    
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('products_images'), $imageName);
        $product->image = 'products_images/' . $imageName;
    }

    $product->save();

    return redirect()->route('admin.show_product')->with('message', 'Product added successfully!');
}
   
public function ShowProduct()
{
    $products = Product::with('category')->paginate(10);
    return view('admin.show_product', compact('products'));
}

public function SearchProduct(Request $request)
{
    $searchQuery = $request->input('search');
    
    $products = Product::with('category')
        ->where('title', 'like', '%' . $searchQuery . '%')
        ->orWhereHas('category', function($query) use ($searchQuery) {
            $query->where('category_name', 'like', '%' . $searchQuery . '%');
        })
        ->paginate(10)
        ->appends(['search' => $searchQuery]);
    
    return view('admin.show_product', compact('products'));
}

public function ViewProduct($id)
{
    $product = Product::findOrFail($id);
    return view('admin.view_product', compact('product'));
}


    public function DeleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.show_product')->with('message', 'Product Deleted Successfully');
    }

    public function EditProduct($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all(['id', 'category_name']);
    return view('admin.edit_product', compact('product', 'categories'));
}

public function UpdateProduct(Request $request, $id)
{
    $product = Product::findOrFail($id);
    
    $request->validate([
        'title' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'discount_price' => 'nullable|numeric|min:0|lt:price',
        'stock' => 'required|integer|min:0',
        'low_stock_threshold' => 'nullable|integer|min:0',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    ]);

    $product->title = $request->title;
    $product->category_id = $request->category_id;
    $product->price = $request->price;
    $product->discount_price = $request->discount_price ?? 0;
    $product->stock = $request->stock;
    $product->low_stock_threshold = $request->low_stock_threshold ?? 5;

    if ($request->hasFile('image')) {
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
        
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('products_images'), $imageName);
        $product->image = 'products_images/' . $imageName;
    }

    $product->save();

    return redirect()->route('admin.show_product')->with('message', 'Product updated successfully!');
}

    



    public function UserOrders()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $orders = Order::all();
            return view('admin.orders', compact('orders'));
        } else {
            return redirect('admin/login');
        }
    }

     public function UpdateOrder($user_id, $order_id, $delivery_status)
    {
        $order = Order::where('user_id', $user_id)->where('id', $order_id)->first();

        if ($order) {
            if ($delivery_status === 'cancel_order') {
                foreach ($order->products as $product) {
                    $product->quantity += $product->pivot->quantity;
                    $product->save();
                }
                $order->delete();
                return redirect()->back()->with('message', 'Order canceled and inventory updated.');
            } else {
                $order->delivery_status = $delivery_status;
                $order->save();
                return redirect()->back()->with('message', 'Order status updated successfully.');
            }
        }

        return redirect()->back()->with('error', 'Order not found.');
    }

    public function printBill($id)
{
    $order = Order::select([
        'id', 'tracking_id', 'name', 'email', 'phone', 'address', 'notes',
        'product_title', 'quantity', 'price', 'color', 'customization_data',
        'delivery_status', 'tracking_number', 'created_at'
    ])->findOrFail($id);

    $pdf = PDF::loadView('invoices.minimal', compact('order'))
        ->setPaper('a4', 'portrait')
        ->setOption('enable-javascript', false)
        ->setOption('enable-smart-shrinking', true)
        ->setOption('no-images', true)
        ->setOption('dpi', 72);

    return $pdf->download('invoice_'.$order->tracking_id.'.pdf');
}
    

    public function Customers()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {


                $users = User::where('userType','=',0)->get();
                return view('admin.customers',compact('users'));

            } else {
                return redirect('admin\login');
            }
       
    }

    public function DeleteUser($id)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
                User::where('id','=',$id)->delete();
                Cart::where('user_id','=',$id)->delete();
                Order::where('user_id','=',$id)->delete();

                return redirect()->back();

            } else {
                return redirect('admin/login');
            }
    }

    public function SearchUser(Request $request)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {


                $searchText = $request->search;
                $users  = User::where('name', 'LIKE', "%$searchText%")->orWhere('email', 'LIKE', "%$searchText%")->get();
                return view('admin.customers', compact('users'));
            } else {
                return redirect('admin\login');
            }

    }

public function showInventory()
{
    $products = Product::with('category')
        ->orderByRaw('stock <= low_stock_threshold DESC') 
        ->paginate(10);
        
    $lowStockProducts = Product::whereColumn('stock', '<=', 'low_stock_threshold')
        ->where('low_stock_threshold', '>', 0)
        ->get();
        
    $overstockProducts = collect();
    
    return view('admin.inventory', compact(
        'products', 
        'lowStockProducts',
        'overstockProducts'
    ));
}

public function updateStock(Request $request, $id)
{
    $request->validate([
        'adjustment' => 'required|integer|min:1',
        'movement_type' => 'required|in:addition,deduction,correction',
        'notes' => 'nullable|string|max:255'
    ]);

    $product = Product::findOrFail($id);
    
    try {
        $product->recordStockMovement(
            $request->adjustment,
            $request->movement_type,
            $request->notes
        );

        return redirect()->back()->with('success', 'Stock updated successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to update stock: ' . $e->getMessage());
    }
}

public function stockHistory($id)
{
    $product = Product::with(['stockMovements' => function($query) {
        $query->with('user')->latest();
    }])->findOrFail($id);

    return view('admin.stock_history', compact('product'));
}

public function manageTestimonials()
{
    try {
        $pending = Feedback::where('approved', false)
                          ->orderBy('created_at', 'desc')
                          ->get();

        $approved = Feedback::where('approved', true)
                           ->orderBy('created_at', 'desc')
                           ->get();

        return view('admin.testimonials', compact('pending', 'approved'));
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error loading testimonials: ' . $e->getMessage());
    }
}

public function approveTestimonial($id)
{
    try {
        $feedback = Feedback::findOrFail($id);
        $feedback->approved = true;
        $feedback->save();

        return redirect()->back()->with('success', 'Testimonial approved successfully');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error approving testimonial: ' . $e->getMessage());
    }
}

public function deleteTestimonial($id)
{
    $feedback = Feedback::findOrFail($id);
    $feedback->delete();

    return redirect()->back()->with('success', 'Testimonial deleted successfully');
}
    public function logout(Request $request)
{
    Auth::guard('web')->logout(); 
    
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    
    return redirect('/admin/login'); 
}

    
    
}
