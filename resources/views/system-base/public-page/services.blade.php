@extends('layouts.admin')

@section('title', 'Configurar Seção Serviços')
@section('page-title', 'Configurar Seção Serviços')

@section('top-actions')
    <a href="{{ route('dashboard.public-page.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 transition-colors duration-300">
        <i class="fas fa-arrow-left mr-2"></i>
        Voltar
    </a>
@endsection

@section('content')
    <!-- Header -->
    <div class="mb-6 sm:mb-8 animate-fade-in">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="mb-4 sm:mb-0">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">
                    Configurar Seção Serviços
                </h2>
                <p class="mt-2 text-sm sm:text-base text-gray-600">
                    Configure a seção de serviços da sua página pública.
                </p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white shadow-lg rounded-xl animate-slide-up">
        <form method="POST" action="{{ route('dashboard.public-page.services.update') }}" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <!-- Show Section -->
                <div class="flex items-center space-x-4">
                    <input type="checkbox" 
                           id="show_section" 
                           name="show_section" 
                           value="1"
                           {{ \App\Models\PublicPageConfig::getConfig('services', 'show', true) ? 'checked' : '' }}
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="show_section" class="text-sm font-medium text-gray-700">
                        Mostrar seção Serviços na página pública
                    </label>
                </div>
                
                <!-- Icon -->
                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">
                        Ícone (FontAwesome)
                    </label>
                    <input type="text" 
                           id="icon" 
                           name="icon" 
                           value="{{ \App\Models\PublicPageConfig::getConfig('services', 'icon', 'fas fa-cogs') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                           placeholder="fas fa-cogs">
                    <p class="mt-1 text-sm text-gray-500">Use classes do FontAwesome (ex: fas fa-cogs, fas fa-tools)</p>
                </div>
                
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Título da Seção
                    </label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ \App\Models\PublicPageConfig::getConfig('services', 'title', 'Nossos Serviços') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                           placeholder="Nossos Serviços">
                </div>
                
                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Descrição da Seção
                    </label>
                    <textarea id="description" 
                              name="description" 
                              rows="3"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                              placeholder="Oferecemos soluções completas para impulsionar seu negócio">{{ \App\Models\PublicPageConfig::getConfig('services', 'description', 'Oferecemos soluções completas para impulsionar seu negócio') }}</textarea>
                </div>
                
                <!-- Count -->
                <div>
                    <label for="count" class="block text-sm font-medium text-gray-700 mb-2">
                        Quantidade de Serviços a Exibir
                    </label>
                    <input type="number" 
                           id="count" 
                           name="count" 
                           value="{{ \App\Models\PublicPageConfig::getConfig('services', 'count', 6) }}"
                           min="1"
                           max="20"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                           placeholder="6">
                    <p class="mt-1 text-sm text-gray-500">Número de serviços que aparecerão na página pública (1-20)</p>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex flex-col sm:flex-row gap-3 mt-8 pt-6 border-t border-gray-200">
                <button type="submit" 
                        class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-save mr-2"></i>
                    Salvar Configurações
                </button>
                <a href="{{ route('public-page.index') }}" target="_blank" 
                   class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-300">
                    <i class="fas fa-eye mr-2"></i>
                    Visualizar Página
                </a>
            </div>
        </form>
    </div>
@endsection