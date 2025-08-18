<!-- resources/views/user/featured-products.blade.php -->
<section class="shopiko-products-section py-12 bg-white">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 md:mb-0">Our Products</h2>
            <a href="{{ route('user.shop') }}" class="inline-flex items-center text-primary-600 hover:text-primary-800 font-medium transition-colors">
                View All
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
            <div class="product-card group rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                <!-- Product Image -->
                <div class="relative h-64 bg-gray-50 flex items-center justify-center p-4">
                    <a href="{{ url('product_details', $product->id) }}" class="block h-full w-full">
                        <img src="{{ $product->image_url }}" alt="{{ $product->title }}" 
                             class="h-full w-full object-contain transition-transform duration-300 group-hover:scale-105"
                             onerror="this.onerror=null;this.src='{{ asset('images/default-product.png') }}'">
                    </a>
                    @if($product->discount_price > 0)
                    <span class="absolute top-3 right-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                        {{ round(100 - ($product->discount_price/$product->price)*100) }}% OFF
                    </span>
                    @endif
                </div>
                
                <!-- Product Info -->
                <div class="p-4 border-t border-gray-100">
                    <a href="{{ url('product_details', $product->id) }}" class="block text-gray-800 font-semibold hover:text-primary-600 mb-2 truncate">{{ $product->title }}</a>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <span class="text-primary-600 font-bold text-lg">${{ $product->discount_price ?? $product->price }}</span>
                            @if($product->discount_price)
                            <span class="text-gray-500 text-sm line-through ml-2">${{ $product->price }}</span>
                            @endif
                        </div>
                        <button class="text-gray-400 hover:text-primary-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>