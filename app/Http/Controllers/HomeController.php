<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Feedback;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Stripe;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



class HomeController extends Controller
{
    
    public function index()
{
    $products = Product::with(['category' => function($query) {
                    $query->select('id', 'category_name');
                }])
                ->latest()
                ->take(8)
                ->get();

    $categories = Category::all(['id', 'category_name']);
    $approvedTestimonials = Feedback::where('approved', true)
                                  ->orderBy('rating', 'desc')
                                  ->orderBy('created_at', 'desc')
                                  ->limit(6)
                                  ->get();
     $mostOrderedProducts = Product::with(['category' => function($query) {
                        $query->select('id', 'category_name');
                    }])
                    ->withCount(['orders as total_orders' => function($query) {
                        $query->where('delivery_status', '!=', 'passive_order');
                    }])
                    ->orderByDesc('total_orders')
                    ->take(3)
                    ->get();

    return view('user.index', compact('products', 'categories', 'approvedTestimonials',   'mostOrderedProducts'));
}

public function showProducts()
{
    $products = Product::with(['category' => function($query) {
                    $query->select('id', 'category_name');
                }])
                ->latest()
                ->paginate(12);

    $categories = Category::all(['id', 'category_name']);

    return view('user.products', compact('products', 'categories'));
}
    
    public function showCategoryProducts($id)
    {
        $category = Category::findOrFail($id, ['id', 'category_name']);
        
        $products = Product::where('category_id', $category->id)
                          ->paginate(12);
    
        return view('user.category_products', compact('category', 'products'));
    }

public function showProductDetails($id)
{
    try {
        $product = Product::with(['category' => function($query) {
                            $query->select('id', 'category_name');
                        }])
                        ->findOrFail($id);

        $relatedProducts = Product::where('category_id', $product->category_id)
                                ->where('id', '!=', $product->id)
                                ->limit(4)
                                ->get();

        return view('user.product_details', compact('product', 'relatedProducts'));
        
    } catch (\Exception $e) {
        return redirect()->route('user.products')->with('error', 'Product not found');
    }
}
    public function Home(){
        if (Auth::check()) {
            $user = Auth::user();
            $userType = $user->usertype;
    
            if ($userType == 'admin' || $user->is_admin) {
                $total_users = User::where('usertype', 0)->count();
                $products = Product::all();
                $total_product = 0;
                $revenue = 0;
                $sold_products = 0;
    
                foreach($products as $product){
                    $total_product += $product->quantity;
                }
    
                $total_orders  = Order::where('delivery_status','!=','passive_order')->count();
                $orders = Order::all();
                $delivered_orders = Order::where('delivery_status','=','delivered')->orWhere('delivery_status', '=', 'passive_order')->count();
                $processing_orders = Order::where('delivery_status', '!=', 'passive_order')->count();
    
                foreach($orders as $order){
                    $sold_products += $order->quantity;
                    if($order->payment_status == 'paid'){
                        $revenue += $order->price;
                    }
                }
    
                return view('admin.admin_blade', compact(
                    'total_users',
                    'total_product',
                    'total_orders',
                    'delivered_orders',
                    'processing_orders',
                    'revenue',
                    'sold_products'
                ));
                
            } else {
                return redirect('/');
            }
    
        } else {
            return redirect('login'); 
        }
    }
    


    public function showGifts()
    {
        $category = Category::where('category_name', 'Gifts')->firstOrFail();
        $products = Product::where('category_id', $category->id)->paginate(12);
        return view('user.categories.gifts', compact('products', 'category'));
    }

    public function showApparel()
    {
        $category = Category::where('category_name', 'Apparel')->firstOrFail();
        $products = Product::where('category_id', $category->id)->paginate(12);
        return view('user.categories.apparel', compact('products', 'category'));
    }

    public function showPhotos()
    {
        $category = Category::where('category_name', 'Photos')->firstOrFail();
        $products = Product::where('category_id', $category->id)->paginate(12);
        return view('user.categories.photos', compact('products', 'category'));
    }

    public function showAccessories()
    {
        $category = Category::where('category_name', 'Accessories')->firstOrFail();
        $products = Product::where('category_id', $category->id)->paginate(12);
        return view('user.categories.accessories', compact('products', 'category'));
    }

    public function showHomeDecor()
    {
        $category = Category::where('category_name', 'Custom Home Decor')->firstOrFail();
        $products = Product::where('category_id', $category->id)->paginate(12);
        return view('user.categories.home_decor', compact('products', 'category'));
    }

    public function inspirations()
{
    
    
    return view('user.inspirations'); 
}

public function feedback()
{
    
    
    return view('user.feedback'); 
}
    
    
    public function showCart()
{
    $cartData = Cart::where('user_id', auth()->id())->get(); 
    $totalPrice = $cartData->sum('price'); 
    
    return view('your.cart.view', [
        'cartData' => $cartData,
        'totalPrice' => $totalPrice
    ]);
}
    

    public function UserAccount()
    {
        $user = Auth::user();
        return view('user.my-account', compact('user'));
    }

    public function UserLogout(Request $request): RedirectResponse
    {

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Cookie::queue(Cookie::forget('XSRF-TOKEN'));
        Cookie::queue(Cookie::forget('laravel_session'));
        return redirect('/');
    }

    

    

    public function ShopPage(Request $request)
    {
        $query = Product::query()->with('category');
        
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        
        
        if ($request->has('max_price')) {
            $query->where(function($q) use ($request) {
                $q->where('discount_price', '<=', $request->max_price)
                  ->orWhere(function($q2) use ($request) {
                      $q2->whereNull('discount_price')
                         ->where('price', '<=', $request->max_price);
                  });
            });
        }
        
        
        if ($request->has('search')) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }
        
        $sort = $request->get('sort', 'newest');
        switch($sort) {
            case 'price_asc':
                $query->orderByRaw('COALESCE(discount_price, price) ASC');
                break;
            case 'price_desc':
                $query->orderByRaw('COALESCE(discount_price, price) DESC');
                break;
            case 'newest':
            default:
                $query->latest();
                break;
        }
        
        $products = $query->paginate(12);
        $categories = Category::all();
        
        return view('user.shop', compact('products', 'categories'));
    }

    public function ContactPage()
    {
        return view('user.contact');
    }
  
    public function CartPage()
{
    if (Auth::check()) {
        $cartData = Cart::where('user_id', Auth::id())->get();
        return view('user.cart', compact('cartData'));
    } else {
        return redirect('login');
    }
}


private function getColorHex($colorName)
{
    $colors = [
        'Red' => '#FF0000',
        'Green' => '#00FF00',
        'Blue' => '#0000FF',
        'Yellow' => '#FFFF00',
        'Magenta' => '#FF00FF',
        'Cyan' => '#00FFFF',
        'Black' => '#000000',
        'White' => '#FFFFFF',
        'Orange' => '#FFA500',
        'Purple' => '#800080',
        'Brown' => '#A52A2A',
        'Pink' => '#FFC0CB',
        'Gray' => '#808080',
        'Dark Green' => '#008000',
        'Navy Blue' => '#000080',
        'Tomato' => '#FF6347',
        'Turquoise' => '#40E0D0',
        'Violet' => '#EE82EE',
        'Wheat' => '#F5DEB3',
        'Steel Blue' => '#4682B4'
    ];
    return $colors[$colorName] ?? '#FFFFFF';
}

public function AddToCart(Request $request, $id)
{
    $this->validate($request, [
        'customization_data' => 'required|json',
        'quantity' => 'required|integer|min:1|max:100'
    ]);

    try {
        $product = Product::findOrFail($id);
        $user = Auth::user();
        $customization = json_decode($request->customization_data, true);

        $color = $customization['color'] ?? 'White';

        $previewPath = null;
        if ($request->has('preview_image')) {
            $imageData = $request->preview_image;
            if (strpos($imageData, 'data:image') === 0) {
                $directory = public_path('customized_images');
                if (!File::exists($directory)) {
                    File::makeDirectory($directory, 0755, true);
                }

                $imageData = explode(',', $imageData)[1];
                $filename = 'custom_'.time().'_'.$product->id.'.png';
                $path = 'customized_images/'.$filename;
                
                file_put_contents(public_path($path), base64_decode($imageData));
                
                $previewPath = $path;
            }
        }


        $cartItem = Cart::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'product_title' => $product->title,
            'unit_price' => $product->discount_price ?: $product->price,
            'price' => ($product->discount_price ?: $product->price) * $request->quantity,
            'image' => $product->image,
            'customization_data' => $request->customization_data,
            'color' => $color,
            'preview_image' => $previewPath,
            'quantity' => $request->quantity
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully',
            'redirect' => route('user.cart')
        ]);

    } catch (\Exception $e) {
        \Log::error('Add to cart error: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Failed to add product to cart: ' . $e->getMessage()
        ], 500);
    }
}
private function storePreviewImage($base64Image, $productId, $userId)
{
    try {
        if (strpos($base64Image, 'data:image/png;base64,') === 0) {
            $imageData = base64_decode(substr($base64Image, 22));
            
         
            $filename = 'custom_preview_' . $productId . '_' . $userId . '_' . time() . '.png';
            $path = 'customized_images/' . $filename;
            
            $fullPath = public_path($path);
            File::ensureDirectoryExists(dirname($fullPath));
            file_put_contents($fullPath, $imageData);
            
            return $path;
        }
        return null;
    } catch (\Exception $e) {
        \Log::error('Preview image save error: ' . $e->getMessage());
        return null;
    }
}
    
    private function generateQuickPreview($product, $customization)
    {
        try {
            $canvas = imagecreatetruecolor(400, 400);
            $white = imagecolorallocate($canvas, 255, 255, 255);
            imagefill($canvas, 0, 0, $white);
    
            $productImage = imagecreatefromstring(file_get_contents($product->image_url));
            imagecopyresampled($canvas, $productImage, 0, 0, 0, 0, 400, 400, imagesx($productImage), imagesy($productImage));
    
            if (isset($customization['color']) && $customization['color'] !== 'White') {
                $color = $this->hex2rgb($this->getColorHex($customization['color']));
                imagefilter($canvas, IMG_FILTER_COLORIZE, $color['r'], $color['g'], $color['b']);
            }
    
            ob_start();
            imagejpeg($canvas, null, 80); 
            $imageData = ob_get_clean();
            
            return 'data:image/jpeg;base64,' . base64_encode($imageData);
    
        } catch (\Exception $e) {
            \Log::error("Quick preview generation error: " . $e->getMessage());
            return null;
        }
    }

    private function generateExactPreviewImage($product, $customization)
    {
        try {
           
            $canvas = imagecreatetruecolor(800, 800);
            $white = imagecolorallocate($canvas, 255, 255, 255);
            imagefill($canvas, 0, 0, $white);
    
           
            $productImage = imagecreatefromstring(file_get_contents($product->image_url));
            
       
            if (isset($customization['color'])) {
                $color = $this->hex2rgb($this->getColorHex($customization['color']));
                imagefilter($productImage, IMG_FILTER_COLORIZE, $color['r'], $color['g'], $color['b']);
            }
    
          
            imagecopyresampled($canvas, $productImage, 0, 0, 0, 0, 800, 800, imagesx($productImage), imagesy($productImage));
    
            if (isset($customization['customImage'])) {
                $customImgData = explode(',', $customization['customImage'])[1];
                $customImg = imagecreatefromstring(base64_decode($customImgData));
                
                $imgWidth = $customization['imagePosition']['size'] ?? 100;
                $imgHeight = $customization['imagePosition']['size'] ?? 100;
                $imgX = ($customization['imagePosition']['x'] / 100) * 800 - ($imgWidth / 2);
                $imgY = ($customization['imagePosition']['y'] / 100) * 800 - ($imgHeight / 2);
                
                imagecopyresampled($canvas, $customImg, $imgX, $imgY, 0, 0, $imgWidth, $imgHeight, imagesx($customImg), imagesy($customImg));
            }
    
            if (isset($customization['customText'])) {
                $textColor = $this->getTextColor($customization['textColor'] ?? 'Black');
                $fontSize = $customization['textPosition']['size'] ?? 16;
                $fontPath = $this->getFontPath($customization['textFont'] ?? 'Arial');
                
                $textX = ($customization['textPosition']['x'] / 100) * 800;
                $textY = ($customization['textPosition']['y'] / 100) * 800;
                
                imagettftext($canvas, $fontSize, 0, $textX, $textY, $textColor, $fontPath, $customization['customText']);
            }
    
            ob_start();
            imagepng($canvas);
            $imageData = ob_get_clean();
            
            return 'data:image/png;base64,' . base64_encode($imageData);
    
        } catch (\Exception $e) {
            \Log::error("Preview generation error: " . $e->getMessage());
            return null;
        }
    }
    
    
    
    private function hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);
        
        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
        }
        
        return ['r' => $r, 'g' => $g, 'b' => $b];
    }
    
    
    
    private function getTextColor($colorName) {
        $colors = [
            'Black' => imagecolorallocate($canvas, 0, 0, 0),
            'White' => imagecolorallocate($canvas, 255, 255, 255),
        ];
        return $colors[$colorName] ?? imagecolorallocate($canvas, 0, 0, 0);
    }
  
    private function getFontPath($fontName)
    {
        $fonts = [
            'Modern' => public_path('fonts/Modern.ttf'),
            'Elegant' => public_path('fonts/Elegant.ttf'),
            'Typewriter' => public_path('fonts/Typewriter.ttf'),
            'Handwritten' => public_path('fonts/Handwritten.ttf')
        ];
        
        return $fonts[$fontName] ?? public_path('fonts/Modern.ttf');
    }
    public function ClearCart()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
    
        try {
            $cartItems = Cart::where('user_id', Auth::id())->get();
    
            foreach ($cartItems as $item) {
                if ($item->preview_image) {
                    $imagePath = public_path($item->preview_image);
                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }
                }
                $item->delete();
            }
    
            return redirect()->back()->with('success', 'Cart cleared successfully!');
    
        } catch (\Exception $e) {
            \Log::error("Clear cart error: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to clear cart. Please try again.');
        }
    }

    
    public function CashOrder(Request $request)
{
    \Log::info('CashOrder method called'); 
    
    if (!Auth::check()) {
        \Log::warning('CashOrder: User not authenticated'); 
        return response()->json([
            'success' => false,
            'message' => 'Please login to place an order',
            'redirect' => route('login')
        ], 401);
    }
    
    $user = Auth::user();
    $cartData = Cart::with('product')->where('user_id', $user->id)->get();
    
    if ($cartData->isEmpty()) {
        \Log::warning('CashOrder: Empty cart for user ' . $user->id);
        return response()->json([
            'success' => false,
            'message' => 'Your cart is empty',
            'redirect' => route('user.cart')
        ], 400);
    }
    
    try {
        \Log::info('Starting transaction for user ' . $user->id); 
        DB::beginTransaction();

        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'notes' => 'nullable|string|max:1000'
        ]);

        $outOfStockItems = [];
        foreach ($cartData as $item) {
            $product = Product::find($item->product_id);
            if ($product->stock < $item->quantity) {
                $outOfStockItems[] = [
                    'product' => $product->title,
                    'requested' => $item->quantity,
                    'available' => $product->stock
                ];
            }
        }

        if (!empty($outOfStockItems)) {
            $message = 'Some items in your cart are out of stock or have insufficient quantity: ';
            foreach ($outOfStockItems as $item) {
                $message .= "{$item['product']} (Available: {$item['available']}, Requested: {$item['requested']}), ";
            }
            $message = rtrim($message, ', ');

            return response()->json([
                'success' => false,
                'message' => $message,
                'redirect' => route('user.cart')
            ], 400);
        }

        $trackingId = 'ORD-' . Str::upper(Str::random(10));
        $orderDate = now();
        $totalPrice = $cartData->sum(function($item) {
            return ($item->product->discount_price ?? $item->product->price) * $item->quantity;
        });

        $orderItems = [];
        
        foreach ($cartData as $item) {
            $product = Product::find($item->product_id);
             $unitPrice = $item->product->discount_price ?? $item->product->price;
            $itemTotal = $unitPrice * $item->quantity;
            \Log::info('Creating order for product ' . $item->product_id); 
           $order = new Order([
    'user_id' => $user->id,
    'name' => $validatedData['name'],
    'email' => $validatedData['email'],
    'phone' => $validatedData['phone'],
    'address' => $validatedData['address'],
    'notes' => $validatedData['notes'] ?? null,
    'product_id' => $item->product_id,
    'product_title' => $item->product->title,
    'quantity' => $item->quantity,
    'unit_price' => $item->unit_price,
    'price' => $item->price,
    'total_price' => $item->price,
    'image' => $item->product->image,
    'preview_image' => $item->preview_image,
    'customization_data' => $item->customization_data,
    'color' => $item->color,
    'tracking_id' => $trackingId,
    'delivery_status' => 'pending',
    'payment_status' => 'cash_on_delivery',
    'order_date' => $orderDate,
    'original_stock' => $product->stock 
]);

            if (!$order->save()) {
                \Log::error('Failed to save order for product: ' . $item->product->title); 
                throw new \Exception("Failed to save order for product: {$item->product->title}");
            }

            $product->stock -= $item->quantity;
            $product->save();

            if ($product->low_stock_threshold > 0 && $product->stock <= $product->low_stock_threshold) {
                \Log::warning("Low stock alert for product: {$product->title} (ID: {$product->id})");
            }
            
            $orderItems[] = $order;
        }

        Cart::where('user_id', $user->id)->delete();
        \Log::info('Cart cleared for user ' . $user->id); 

        DB::commit();
        \Log::info('Transaction committed successfully'); 

        Mail::to($user->email)->send(new OrderConfirmation($orderItems[0], $orderItems));
        \Log::info('Confirmation email sent to ' . $user->email); 

        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully!',
            'redirect' => route('user.orders') 
        ]);

    } catch (\Exception $e) {
        DB::rollBack();
        \Log::error('Order processing error: '.$e->getMessage());
        \Log::error('Stack trace: '.$e->getTraceAsString()); 
        
        return response()->json([
            'success' => false,
            'message' => 'Failed to process order: '.$e->getMessage(),
            'redirect' => route('user.cart')
        ], 500);
    }
}

public function showOrderConfirmation($id)
{
    $order = Order::where('user_id', Auth::id())
                ->where('id', $id)
                ->firstOrFail();
    
    return view('user.order_confirmation', compact('order'));
}
    public function StripePost(Request $request, $totalPrice)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to complete your purchase');
        }

        try {
            $user = Auth::user();
            $cartData = Cart::where('user_id', $user->id)->get();

            if ($cartData->isEmpty()) {
                return redirect()->back()->with('error', 'Your cart is empty');
            }

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $charge = Stripe\Charge::create([
                "amount" => $totalPrice * 100, 
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment for order from " . $user->email,
                "metadata" => [
                    "customer_name" => $user->name,
                    "customer_email" => $user->email
                ]
            ]);

            if ($charge->status === 'succeeded') {
                $trackingId = 'ORD-' . Str::upper(Str::random(10));
                $orderDate = now();

                foreach ($cartData as $item) {
                    $order = new Order();
                    
                    $order->user_id = $user->id;
                    $order->name = $user->name;
                    $order->email = $user->email;
                    $order->phone = $user->phone;
                    $order->address = $user->address;
                    
                    $order->product_id = $item->product_id;
                    $order->product_title = $item->product_title;
                    $order->quantity = $item->quantity;
                    $order->price = $item->price;
                    $order->unit_price = $item->unit_price;
                    $order->image = $item->image;
                    
                    $order->preview_image = $item->preview_image;
                    $order->customization_data = $item->customization_data;
                    $order->color = $item->color;
                    
                    $order->tracking_id = $trackingId;
                    $order->delivery_status = 'pending';
                    $order->payment_status = 'paid';
                    $order->payment_method = 'stripe';
                    $order->payment_id = $charge->id;
                    $order->total_price = $totalPrice;
                    $order->order_date = $orderDate;
                    
                    $order->save();
                }

                Cart::where('user_id', $user->id)->delete();

                Alert::success('Payment Successful!', 'Your order has been placed successfully.');
                return redirect()->route('user.orders');
            } else {
                throw new \Exception('Payment failed: ' . $charge->failure_message);
            }

        } catch (\Stripe\Exception\CardException $e) {
            $error = $e->getError()->message;
            \Log::error('Stripe card error: ' . $error);
            return redirect()->back()->with('error', 'Payment failed: ' . $error);

        } catch (\Stripe\Exception\RateLimitException $e) {
            \Log::error('Stripe rate limit error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Payment processing is busy. Please try again.');

        } catch (\Stripe\Exception\InvalidRequestException $e) {
            \Log::error('Stripe invalid request: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Invalid payment request. Please check your details.');

        } catch (\Stripe\Exception\AuthenticationException $e) {
            \Log::error('Stripe auth error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Payment authentication failed. Please try again.');

        } catch (\Stripe\Exception\ApiConnectionException $e) {
            \Log::error('Stripe API connection error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Network error processing payment. Please try again.');

        } catch (\Stripe\Exception\ApiErrorException $e) {
            \Log::error('Stripe API error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Payment processing error. Please try again.');

        } catch (\Exception $e) {
            \Log::error('Order processing error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to process your order. Please try again.');
        }
    }

    public function updateCartItem(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);
    
        try {
            $cartItem = Cart::where('user_id', Auth::id())
                           ->where('id', $id)
                           ->firstOrFail();
    
            $cartItem->quantity = $request->quantity;
            $cartItem->price = $cartItem->unit_price * $request->quantity;
            $cartItem->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Quantity updated successfully'
            ]);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update quantity: ' . $e->getMessage()
            ], 500);
        }
    }

    public function UserOrders()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $cartData = Cart::where('user_id', '=', $user_id)->get();
            $orderData = Order::where('user_id', '=', $user_id)
                            ->where('delivery_status', '<>', 'passive_order')
                            ->orderBy('created_at', 'desc')
                            ->get();
            $past_orders = Order::where('user_id', '=', $user_id)
                              ->where('delivery_status', '=', 'passive_order')
                              ->orderBy('created_at', 'desc')
                              ->get();
            return view('user.orders', compact('orderData', 'cartData','past_orders'));
        } else {
            return redirect('login');
        }
    }

  
    public function OrderReceived($id)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $order = Order::where('id', $id)->where('user_id', $user_id)->first();

            if ($order) {
                $order->delivery_status = 'passive_order';
                $order->save();

                return redirect()->back()->with('success', 'Order marked as received');
            } else {
                return redirect()->back()->with('error', 'Order not found.');
            }
        } else {
            return redirect('login');
        }
    }

    public function CancelOrder($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $order = Order::where('id', $id)->where('user_id', $user->id)->first();

            if ($order) {
                $cartItem = new Cart();
                $cartItem->user_id = $user->id;
                $cartItem->product_id = $order->product_id;
                $cartItem->quantity = $order->quantity;
                $cartItem->price = $order->price / $order->quantity; 
                $cartItem->product_title = $order->product_title;
                $cartItem->image = $order->image;
                $cartItem->customization_data = $order->customization_data;
                $cartItem->preview_image = $order->preview_image;
                $cartItem->save();

               
                $order->delete();
                
                Alert::success('Order Cancelled!', 'The Order Has Been Successfully Cancelled');
                return redirect()->back();
            }
            
            return redirect()->back()->with('error', 'Order not found.');
        } else {
            return redirect('login');
        }
    }

    public function Stripe($totalPrice)
    {
        if(Auth::check()){
            return view('user.stripe', compact('totalPrice'));
        }else{
            return redirect('login');
        }
    }

    
    

    public function SearchProduct(Request $request)
    {
        $searchText = $request->search;
        $products  = Product::where('title', 'LIKE', "%$searchText%")->orWhere('ram', 'LIKE', "%$searchText%")->orWhere('category', 'LIKE', "%$searchText%")->get();
        $categories = Category::all();
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $cartData = Cart::where('user_id', '=', $user_id)->get();
            return view('user.shop', compact('products', 'categories', 'cartData'));
        } else {
            return view('user.shop', compact('products', 'categories'));
        }
    }

    public function UpdatePassword()
    {
        if(Auth::check()){
            return view('profile.update-profile-information-form');
        }else{
            return redirect('login');
        }
    }

    
    public function RemoveProductFromCart($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        try {
            $cartItem = Cart::where('user_id', Auth::id())
                          ->where('id', $id)
                          ->first();
    
            if (!$cartItem) {
                return redirect()->back()->with('error', 'Product not found in your cart!');
            }
    
            if ($cartItem->preview_image) {
                Storage::disk('public')->delete($cartItem->preview_image);
            }
    
            $cartItem->delete();
    
            return redirect()->back()->with('success', 'Product removed from cart!');
    
        } catch (\Exception $e) {
            \Log::error("Remove from cart error: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to remove product. Please try again.');
        }
    }

    public function Checkout()
{
    if (!Auth::check()) {
        return redirect('login');
    }

    $cartData = Cart::where('user_id', Auth::id())->get();
    
    return view('user.checkout', compact('cartData'));
}

}
