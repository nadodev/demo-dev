<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="flex items-center justify-center mb-4">
                <i class="{{ $config['icon'] ?? 'fas fa-box' }} text-4xl text-blue-600 mr-3"></i>
            </div>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                {{ $config['title'] ?? 'Nossos Produtos' }}
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                {{ $config['description'] ?? 'Descubra nossa linha completa de produtos de qualidade.' }}
            </p>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($products as $product)
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 overflow-hidden">
                    @if($product->featured_image)
                        <div class="h-48 bg-gray-200 flex items-center justify-center">
                            <img src="{{ asset('storage/' . $product->featured_image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="h-48 bg-gradient-to-r from-blue-500 to-purple-500 flex items-center justify-center">
                            <i class="fas fa-box text-white text-4xl"></i>
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-semibold text-gray-900">{{ $product->name }}</h3>
                            <span class="px-2 py-1 text-xs font-medium rounded-full {{ $product->status_badge_class }}">
                                {{ ucfirst($product->status) }}
                            </span>
                        </div>
                        
                        <p class="text-gray-600 mb-4">{{ Str::limit($product->description, 100) }}</p>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-blue-600">{{ $product->formatted_price }}</span>
                            @if($product->category)
                                <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">{{ ucfirst($product->category) }}</span>
                            @endif
                        </div>
                        
                        <a href="{{ route('public.product.show', $product) }}" class="mt-4 inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                            Ver detalhes <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Call to Action -->
        @if($config['show_cta'] ?? false)
            <div class="text-center mt-12">
                <a href="{{ $config['cta_url'] ?? '#' }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-300">
                    <i class="fas fa-arrow-right mr-2"></i>
                    {{ $config['cta_text'] ?? 'Ver todos os produtos' }}
                </a>
            </div>
        @endif
    </div>
</section>
