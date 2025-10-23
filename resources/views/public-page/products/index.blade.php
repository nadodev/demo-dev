@extends('layouts.public')

@section('title', 'Nossos Produtos')
@section('description', 'Descubra nossa linha completa de produtos de qualidade')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <div class="inline-flex items-center px-4 py-2 bg-white/20 rounded-full text-sm font-medium mb-6">
                <i class="{{ $productsConfig['icon'] ?? 'fas fa-box' }} mr-2"></i>
                {{ $productsConfig['title'] ?? 'Nossos Produtos' }}
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                {{ $productsConfig['title'] ?? 'Nossos Produtos' }}
            </h1>
            <p class="text-xl md:text-2xl text-indigo-100 max-w-3xl mx-auto">
                {{ $productsConfig['description'] ?? 'Descubra nossa linha completa de produtos de qualidade' }}
            </p>
        </div>
    </div>
</section>

<!-- Products Grid -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        @if($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                        @if($product->image)
                            <div class="h-48 overflow-hidden">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xl font-bold text-gray-900">{{ $product->name }}</h3>
                                <span class="text-2xl font-bold text-indigo-600">{{ $product->formatted_price }}</span>
                            </div>
                            
                            <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                            
                            @if($product->category)
                                <div class="mb-4">
                                    <span class="inline-block px-3 py-1 text-xs font-medium bg-indigo-100 text-indigo-800 rounded-full">
                                        {{ $product->category }}
                                    </span>
                                </div>
                            @endif
                            
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-1 text-xs font-medium rounded-full {{ $product->status_badge_class }}">
                                    {{ $product->status === 'active' ? 'Disponível' : 'Indisponível' }}
                                </span>
                                <a href="{{ route('public.product.show', $product) }}" 
                                   class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium">
                                    Ver Detalhes
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $products->links() }}
            </div>
        @else
            <div class="text-center py-20">
                <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-box text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Nenhum produto encontrado</h3>
                <p class="text-gray-600">Ainda não temos produtos cadastrados.</p>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-indigo-500 to-purple-500 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            Interessado em nossos produtos?
        </h2>
        <p class="text-xl text-indigo-100 mb-8 max-w-2xl mx-auto">
            Entre em contato conosco para mais informações sobre nossos produtos.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#contact" 
               class="inline-flex items-center px-8 py-4 bg-white text-indigo-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors duration-300">
                <i class="fas fa-envelope mr-2"></i>
                Solicitar Informações
            </a>
            <a href="{{ route('login') }}" 
               class="inline-flex items-center px-8 py-4 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-indigo-600 transition-colors duration-300">
                <i class="fas fa-user-plus mr-2"></i>
                Criar Conta
            </a>
        </div>
    </div>
</section>
@endsection
