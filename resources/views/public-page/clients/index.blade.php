@extends('layouts.public')

@section('title', 'Nossos Clientes')
@section('description', 'Conheça algumas das empresas que confiam em nossos serviços')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <div class="inline-flex items-center px-4 py-2 bg-white/20 rounded-full text-sm font-medium mb-6">
                <i class="{{ $clientsConfig['icon'] ?? 'fas fa-users' }} mr-2"></i>
                {{ $clientsConfig['title'] ?? 'Nossos Clientes' }}
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                {{ $clientsConfig['title'] ?? 'Nossos Clientes' }}
            </h1>
            <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto">
                {{ $clientsConfig['description'] ?? 'Conheça algumas das empresas que confiam em nossos serviços' }}
            </p>
        </div>
    </div>
</section>

<!-- Clients Grid -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        @if($clients->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($clients as $client)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 p-6">
                        <div class="text-center">
                            @if($client->logo)
                                <div class="w-20 h-20 mx-auto mb-4 rounded-full overflow-hidden">
                                    <img src="{{ $client->logo }}" alt="{{ $client->name }}" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="w-20 h-20 mx-auto mb-4 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-building text-white text-2xl"></i>
                                </div>
                            @endif
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $client->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ $client->description }}</p>
                            
                            @if($client->website)
                                <a href="{{ $client->website }}" target="_blank" 
                                   class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                                    <i class="fas fa-external-link-alt mr-2"></i>
                                    Visitar Site
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $clients->links() }}
            </div>
        @else
            <div class="text-center py-20">
                <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-users text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Nenhum cliente encontrado</h3>
                <p class="text-gray-600">Ainda não temos clientes cadastrados.</p>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            Quer se tornar nosso cliente?
        </h2>
        <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
            Junte-se a centenas de empresas que já confiam em nossos serviços.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('login') }}" 
               class="inline-flex items-center px-8 py-4 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors duration-300">
                <i class="fas fa-user-plus mr-2"></i>
                Criar Conta
            </a>
            <a href="#contact" 
               class="inline-flex items-center px-8 py-4 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-blue-600 transition-colors duration-300">
                <i class="fas fa-envelope mr-2"></i>
                Entrar em Contato
            </a>
        </div>
    </div>
</section>
@endsection
