@extends('layouts.public')

@section('title', 'Nossos Serviços')
@section('description', 'Oferecemos soluções completas para impulsionar seu negócio')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-orange-500 to-red-500 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <div class="inline-flex items-center px-4 py-2 bg-white/20 rounded-full text-sm font-medium mb-6">
                <i class="{{ $servicesConfig['icon'] ?? 'fas fa-cogs' }} mr-2"></i>
                {{ $servicesConfig['title'] ?? 'Nossos Serviços' }}
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                {{ $servicesConfig['title'] ?? 'Nossos Serviços' }}
            </h1>
            <p class="text-xl md:text-2xl text-orange-100 max-w-3xl mx-auto">
                {{ $servicesConfig['description'] ?? 'Oferecemos soluções completas para impulsionar seu negócio' }}
            </p>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        @if($services->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                        @if($service->image)
                            <div class="h-48 overflow-hidden">
                                <img src="{{ $service->image }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xl font-bold text-gray-900">{{ $service->name }}</h3>
                                <span class="text-2xl font-bold text-orange-600">{{ $service->formatted_price }}</span>
                            </div>
                            
                            <p class="text-gray-600 mb-4">{{ $service->description }}</p>
                            
                            @if($service->features && is_array($service->features) && count($service->features) > 0)
                                <ul class="space-y-2 mb-6">
                                    @foreach($service->features as $feature)
                                        <li class="flex items-center text-sm text-gray-600">
                                            <i class="fas fa-check text-green-500 mr-2"></i>
                                            {{ $feature }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-1 text-xs font-medium rounded-full {{ $service->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $service->status === 'active' ? 'Disponível' : 'Indisponível' }}
                                </span>
                                <a href="{{ route('public.service.show', $service) }}" 
                                   class="inline-flex items-center text-orange-600 hover:text-orange-800 font-medium">
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
                {{ $services->links() }}
            </div>
        @else
            <div class="text-center py-20">
                <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-cogs text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Nenhum serviço encontrado</h3>
                <p class="text-gray-600">Ainda não temos serviços cadastrados.</p>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-orange-500 to-red-500 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            Precisa de um serviço personalizado?
        </h2>
        <p class="text-xl text-orange-100 mb-8 max-w-2xl mx-auto">
            Entre em contato conosco e vamos criar a solução perfeita para seu negócio.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#contact" 
               class="inline-flex items-center px-8 py-4 bg-white text-orange-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors duration-300">
                <i class="fas fa-envelope mr-2"></i>
                Solicitar Orçamento
            </a>
            <a href="{{ route('login') }}" 
               class="inline-flex items-center px-8 py-4 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-orange-600 transition-colors duration-300">
                <i class="fas fa-user-plus mr-2"></i>
                Criar Conta
            </a>
        </div>
    </div>
</section>
@endsection
