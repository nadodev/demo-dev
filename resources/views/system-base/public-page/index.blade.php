@extends('layouts.admin')

@section('title', 'Página Pública')
@section('page-title', 'Página Pública')

@section('top-actions')
    <a href="{{ route('public-page.index') }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition-colors duration-300">
        <i class="fas fa-eye mr-2"></i>
        Visualizar
    </a>
@endsection

@section('content')
    <!-- Header -->
    <div class="mb-6 sm:mb-8 animate-fade-in">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="mb-4 sm:mb-0">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">
                    Configurações da Página Pública
                </h2>
                <p class="mt-2 text-sm sm:text-base text-gray-600">
                    Configure cada seção da sua página pública de forma organizada.
                </p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <div class="bg-white shadow-lg rounded-xl mb-8 animate-slide-up">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Seções da Página Pública</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <!-- Hero Section -->
                <a href="{{ route('dashboard.public-page.hero') }}" 
                   class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors duration-200 group">
                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-200">
                        <i class="fas fa-rocket text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900">Hero</h4>
                        <p class="text-sm text-gray-600">Título principal</p>
                    </div>
                </a>


                <!-- Footer Section -->
                <a href="{{ route('dashboard.public-page.footer') }}" 
                   class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200 group">
                    <div class="w-10 h-10 bg-gray-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-200">
                        <i class="fas fa-sitemap text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900">Rodapé</h4>
                        <p class="text-sm text-gray-600">Links e informações</p>
                    </div>
                </a>

                <!-- Clients Section -->
                <a href="{{ route('dashboard.public-page.clients') }}" 
                   class="flex items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors duration-200 group">
                    <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-200">
                        <i class="fas fa-users text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900">Clientes</h4>
                        <p class="text-sm text-gray-600">Lista de clientes</p>
                    </div>
                </a>

                <!-- Services Section -->
                <a href="{{ route('dashboard.public-page.services') }}" 
                   class="flex items-center p-4 bg-orange-50 rounded-lg hover:bg-orange-100 transition-colors duration-200 group">
                    <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-200">
                        <i class="fas fa-cogs text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900">Serviços</h4>
                        <p class="text-sm text-gray-600">Lista de serviços</p>
                    </div>
                </a>

                <!-- Products Section -->
                <a href="{{ route('dashboard.public-page.products') }}" 
                   class="flex items-center p-4 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-colors duration-200 group">
                    <div class="w-10 h-10 bg-indigo-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-200">
                        <i class="fas fa-box text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900">Produtos</h4>
                        <p class="text-sm text-gray-600">Lista de produtos</p>
                    </div>
                </a>

                <!-- News Section -->
                <a href="{{ route('dashboard.public-page.news') }}" 
                   class="flex items-center p-4 bg-red-50 rounded-lg hover:bg-red-100 transition-colors duration-200 group">
                    <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-200">
                        <i class="fas fa-newspaper text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900">Notícias</h4>
                        <p class="text-sm text-gray-600">Lista de notícias</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection