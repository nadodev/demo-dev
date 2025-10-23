<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Configurar Hero - {{ config('system.app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900" rel="stylesheet" />
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: {
                                50: '#f0f9ff',
                                100: '#e0f2fe',
                                200: '#bae6fd',
                                300: '#7dd3fc',
                                400: '#38bdf8',
                                500: '#0ea5e9',
                                600: '#0284c7',
                                700: '#0369a1',
                                800: '#075985',
                                900: '#0c4a6e',
                            },
                            secondary: {
                                50: '#faf5ff',
                                100: '#f3e8ff',
                                200: '#e9d5ff',
                                300: '#d8b4fe',
                                400: '#c084fc',
                                500: '#a855f7',
                                600: '#9333ea',
                                700: '#7c3aed',
                                800: '#6b21a8',
                                900: '#581c87',
                            }
                        },
                        fontFamily: {
                            'sans': ['Inter', 'system-ui', 'sans-serif'],
                        },
                        animation: {
                            'fade-in': 'fadeIn 0.6s ease-in-out',
                            'slide-up': 'slideUp 0.6s ease-out',
                            'slide-left': 'slideLeft 0.3s ease-out',
                            'float': 'float 6s ease-in-out infinite',
                            'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        },
                        keyframes: {
                            fadeIn: {
                                '0%': { opacity: '0' },
                                '100%': { opacity: '1' },
                            },
                            slideUp: {
                                '0%': { transform: 'translateY(30px)', opacity: '0' },
                                '100%': { transform: 'translateY(0)', opacity: '1' },
                            },
                            slideLeft: {
                                '0%': { transform: 'translateX(-20px)', opacity: '0' },
                                '100%': { transform: 'translateX(0)', opacity: '1' },
                            },
                            float: {
                                '0%, 100%': { transform: 'translateY(0px)' },
                                '50%': { transform: 'translateY(-10px)' },
                            }
                        }
                    }
                }
            }
        </script>
    @endif
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64">
                <!-- Sidebar Header -->
                <div class="flex flex-col h-0 flex-1 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
                    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                        <!-- Logo -->
                        <div class="flex items-center flex-shrink-0 px-4 mb-8">
                            <div class="flex items-center">
                                <img class="h-10 w-auto" src="{{ asset('images/logo.png') }}" alt="{{ config('system.app.name') }}">
                                <span class="ml-3 text-xl font-bold text-white">{{ config('system.app.name') }}</span>
                            </div>
                        </div>

                        <!-- Navigation -->
                        <nav class="mt-5 flex-1 px-2 space-y-1">
                            <!-- Dashboard -->
                            <a href="{{ route('dashboard') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-300">
                                <i class="fas fa-home mr-3 text-lg"></i>
                                Dashboard
                            </a>

                            <!-- Clients -->
                            <a href="{{ route('dashboard.clients.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-300">
                                <i class="fas fa-users mr-3 text-lg"></i>
                                Clientes
                            </a>

                            <!-- Products -->
                            <a href="{{ route('dashboard.products.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-300">
                                <i class="fas fa-box mr-3 text-lg"></i>
                                Produtos
                            </a>

                            <!-- News -->
                            <a href="{{ route('dashboard.news.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-300">
                                <i class="fas fa-newspaper mr-3 text-lg"></i>
                                Notícias
                            </a>

                            <!-- Services -->
                            <a href="{{ route('dashboard.services.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-300">
                                <i class="fas fa-cogs mr-3 text-lg"></i>
                                Serviços
                            </a>

                            <!-- Public Page Settings -->
                            <a href="{{ route('dashboard.public-page.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors duration-300">
                                <i class="fas fa-globe mr-3 text-lg"></i>
                                Página Pública
                            </a>

                            <!-- Reports -->
                            <a href="#" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-300">
                                <i class="fas fa-chart-line mr-3 text-lg"></i>
                                Relatórios
                            </a>

                            <!-- Settings -->
                            <a href="#" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-300">
                                <i class="fas fa-cog mr-3 text-lg"></i>
                                Configurações
                            </a>
                        </nav>

                        <!-- User Profile -->
                        <div class="flex-shrink-0 flex border-t border-gray-700 p-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-400">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <!-- Top Navigation -->
            <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
                <button type="button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 lg:hidden" id="sidebar-toggle">
                    <i class="fas fa-bars text-lg"></i>
                </button>
                
                <div class="flex-1 px-4 flex justify-between">
                    <div class="flex-1 flex items-center">
                        <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Configurar Hero</h1>
                    </div>
                    
                    <div class="ml-4 flex items-center md:ml-6">
                        <!-- Preview Button -->
                        <a href="{{ route('public-page.index') }}" target="_blank" class="mr-4 inline-flex items-center px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition-colors duration-300">
                            <i class="fas fa-eye mr-2"></i>
                            Visualizar
                        </a>

                        <!-- Notifications -->
                        <button class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="fas fa-bell text-lg"></i>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <div>
                                <button class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" id="user-menu-button">
                                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-white text-sm"></i>
                                    </div>
                                </button>
                            </div>
                            
                            <!-- Dropdown menu -->
                            <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" id="user-menu">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Seu perfil</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Configurações</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Sair
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="flex-1 relative overflow-y-auto focus:outline-none">
                <div class="py-4 sm:py-6">
                    <div class="max-w-4xl mx-auto px-3 sm:px-4 lg:px-6 xl:px-8">
                        <!-- Header -->
                        <div class="mb-6 sm:mb-8 animate-fade-in">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                <div class="mb-4 sm:mb-0">
                                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">
                                        Configurar Seção Hero
                                    </h2>
                                    <p class="mt-2 text-sm sm:text-base text-gray-600">
                                        Personalize o título, subtítulo e botões da seção principal da sua página.
                                    </p>
                                </div>
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <a href="{{ route('dashboard.public-page.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 transition-colors duration-300">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Voltar
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Form -->
                        <form method="POST" action="{{ route('dashboard.public-page.hero.update') }}" class="space-y-6">
                            @csrf
                            @method('PUT')
                            
                            <!-- Badge -->
                            <div class="bg-white shadow-lg rounded-xl p-6 animate-slide-up">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-tag text-blue-500 mr-2"></i>
                                    Badge Principal
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="badge_text" class="block text-sm font-medium text-gray-700 mb-2">
                                            Texto do Badge
                                        </label>
                                        <input type="text" 
                                               id="badge_text" 
                                               name="badge_text" 
                                               value="{{ old('badge_text', $heroConfig['badge_text'] ?? '') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                               placeholder="Ex: Novo! Lançamento 2024">
                                    </div>
                                    <div>
                                        <label for="badge_color" class="block text-sm font-medium text-gray-700 mb-2">
                                            Cor do Badge
                                        </label>
                                        <select id="badge_color" 
                                                name="badge_color" 
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                            <option value="blue" {{ old('badge_color', $heroConfig['badge_color'] ?? '') == 'blue' ? 'selected' : '' }}>Azul</option>
                                            <option value="green" {{ old('badge_color', $heroConfig['badge_color'] ?? '') == 'green' ? 'selected' : '' }}>Verde</option>
                                            <option value="purple" {{ old('badge_color', $heroConfig['badge_color'] ?? '') == 'purple' ? 'selected' : '' }}>Roxo</option>
                                            <option value="orange" {{ old('badge_color', $heroConfig['badge_color'] ?? '') == 'orange' ? 'selected' : '' }}>Laranja</option>
                                            <option value="red" {{ old('badge_color', $heroConfig['badge_color'] ?? '') == 'red' ? 'selected' : '' }}>Vermelho</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Título Principal -->
                            <div class="bg-white shadow-lg rounded-xl p-6 animate-slide-up" style="animation-delay: 0.1s;">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-heading text-blue-500 mr-2"></i>
                                    Título Principal
                                </h3>
                                <div class="space-y-4">
                                    <div>
                                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                            Título
                                        </label>
                                        <input type="text" 
                                               id="title" 
                                               name="title" 
                                               value="{{ old('title', $heroConfig['title'] ?? '') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                               placeholder="Ex: Transforme sua empresa com nossa solução">
                                    </div>
                                    <div>
                                        <label for="title_color" class="block text-sm font-medium text-gray-700 mb-2">
                                            Cor do Título
                                        </label>
                                        <select id="title_color" 
                                                name="title_color" 
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                            <option value="gray-900" {{ old('title_color', $heroConfig['title_color'] ?? '') == 'gray-900' ? 'selected' : '' }}>Preto</option>
                                            <option value="blue-600" {{ old('title_color', $heroConfig['title_color'] ?? '') == 'blue-600' ? 'selected' : '' }}>Azul</option>
                                            <option value="purple-600" {{ old('title_color', $heroConfig['title_color'] ?? '') == 'purple-600' ? 'selected' : '' }}>Roxo</option>
                                            <option value="green-600" {{ old('title_color', $heroConfig['title_color'] ?? '') == 'green-600' ? 'selected' : '' }}>Verde</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Subtítulo -->
                            <div class="bg-white shadow-lg rounded-xl p-6 animate-slide-up" style="animation-delay: 0.2s;">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-paragraph text-blue-500 mr-2"></i>
                                    Subtítulo
                                </h3>
                                <div>
                                    <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-2">
                                        Descrição
                                    </label>
                                    <textarea id="subtitle" 
                                              name="subtitle" 
                                              rows="3"
                                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                              placeholder="Ex: A solução completa para gerenciar seus clientes, produtos e vendas de forma eficiente e profissional.">{{ old('subtitle', $heroConfig['subtitle'] ?? '') }}</textarea>
                                </div>
                            </div>

                            <!-- Botões de Ação -->
                            <div class="bg-white shadow-lg rounded-xl p-6 animate-slide-up" style="animation-delay: 0.3s;">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-mouse-pointer text-blue-500 mr-2"></i>
                                    Botões de Ação
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Botão Primário -->
                                    <div class="space-y-4">
                                        <h4 class="font-medium text-gray-900">Botão Primário</h4>
                                        <div>
                                            <label for="primary_button_text" class="block text-sm font-medium text-gray-700 mb-2">
                                                Texto do Botão
                                            </label>
                                            <input type="text" 
                                                   id="primary_button_text" 
                                                   name="primary_button_text" 
                                                   value="{{ old('primary_button_text', $heroConfig['primary_button_text'] ?? '') }}"
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                                   placeholder="Ex: Começar Agora">
                                        </div>
                                        <div>
                                            <label for="primary_button_url" class="block text-sm font-medium text-gray-700 mb-2">
                                                URL do Botão
                                            </label>
                                            <input type="url" 
                                                   id="primary_button_url" 
                                                   name="primary_button_url" 
                                                   value="{{ old('primary_button_url', $heroConfig['primary_button_url'] ?? '') }}"
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                                   placeholder="Ex: /register">
                                        </div>
                                    </div>

                                    <!-- Botão Secundário -->
                                    <div class="space-y-4">
                                        <h4 class="font-medium text-gray-900">Botão Secundário</h4>
                                        <div>
                                            <label for="secondary_button_text" class="block text-sm font-medium text-gray-700 mb-2">
                                                Texto do Botão
                                            </label>
                                            <input type="text" 
                                                   id="secondary_button_text" 
                                                   name="secondary_button_text" 
                                                   value="{{ old('secondary_button_text', $heroConfig['secondary_button_text'] ?? '') }}"
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                                   placeholder="Ex: Saiba Mais">
                                        </div>
                                        <div>
                                            <label for="secondary_button_url" class="block text-sm font-medium text-gray-700 mb-2">
                                                URL do Botão
                                            </label>
                                            <input type="url" 
                                                   id="secondary_button_url" 
                                                   name="secondary_button_url" 
                                                   value="{{ old('secondary_button_url', $heroConfig['secondary_button_url'] ?? '') }}"
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                                   placeholder="Ex: /about">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Estatísticas -->
                            <div class="bg-white shadow-lg rounded-xl p-6 animate-slide-up" style="animation-delay: 0.4s;">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-chart-bar text-blue-500 mr-2"></i>
                                    Estatísticas
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label for="stat1_number" class="block text-sm font-medium text-gray-700 mb-2">
                                            Número da Estatística 1
                                        </label>
                                        <input type="text" 
                                               id="stat1_number" 
                                               name="stat1_number" 
                                               value="{{ old('stat1_number', $heroConfig['stat1_number'] ?? '') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                               placeholder="Ex: 10,000+">
                                    </div>
                                    <div>
                                        <label for="stat1_label" class="block text-sm font-medium text-gray-700 mb-2">
                                            Label da Estatística 1
                                        </label>
                                        <input type="text" 
                                               id="stat1_label" 
                                               name="stat1_label" 
                                               value="{{ old('stat1_label', $heroConfig['stat1_label'] ?? '') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                               placeholder="Ex: Clientes Ativos">
                                    </div>
                                    <div>
                                        <label for="stat1_icon" class="block text-sm font-medium text-gray-700 mb-2">
                                            Ícone da Estatística 1
                                        </label>
                                        <select id="stat1_icon" 
                                                name="stat1_icon" 
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                            <option value="fas fa-users" {{ old('stat1_icon', $heroConfig['stat1_icon'] ?? '') == 'fas fa-users' ? 'selected' : '' }}>Usuários</option>
                                            <option value="fas fa-star" {{ old('stat1_icon', $heroConfig['stat1_icon'] ?? '') == 'fas fa-star' ? 'selected' : '' }}>Estrela</option>
                                            <option value="fas fa-trophy" {{ old('stat1_icon', $heroConfig['stat1_icon'] ?? '') == 'fas fa-trophy' ? 'selected' : '' }}>Troféu</option>
                                            <option value="fas fa-heart" {{ old('stat1_icon', $heroConfig['stat1_icon'] ?? '') == 'fas fa-heart' ? 'selected' : '' }}>Coração</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex flex-col sm:flex-row gap-3 pt-6">
                                <button type="submit" 
                                        class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 transform hover:scale-105">
                                    <i class="fas fa-save mr-2"></i>
                                    Salvar Configurações
                                </button>
                                <a href="{{ route('dashboard.public-page.index') }}" 
                                   class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-300">
                                    <i class="fas fa-times mr-2"></i>
                                    Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Mobile Sidebar -->
    <div class="lg:hidden" id="mobile-sidebar">
        <div class="fixed inset-0 flex z-40">
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" id="sidebar-backdrop"></div>
            <div class="relative flex-1 flex flex-col max-w-xs w-full bg-gray-900">
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                    <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" id="mobile-sidebar-close">
                        <i class="fas fa-times text-white"></i>
                    </button>
                </div>
                <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                    <div class="flex-shrink-0 flex items-center px-4">
                        <img class="h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="{{ config('system.app.name') }}">
                        <span class="ml-2 text-lg font-bold text-white">{{ config('system.app.name') }}</span>
                    </div>
                    <nav class="mt-5 px-2 space-y-1">
                        <a href="{{ route('dashboard') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                            <i class="fas fa-home mr-3"></i>
                            Dashboard
                        </a>
                        <a href="{{ route('dashboard.public-page.index') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-white bg-blue-600">
                            <i class="fas fa-globe mr-3"></i>
                            Página Pública
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile sidebar toggle
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const mobileSidebar = document.getElementById('mobile-sidebar');
            const sidebarBackdrop = document.getElementById('sidebar-backdrop');
            const mobileSidebarClose = document.getElementById('mobile-sidebar-close');

            sidebarToggle.addEventListener('click', function() {
                mobileSidebar.classList.remove('hidden');
            });

            sidebarBackdrop.addEventListener('click', function() {
                mobileSidebar.classList.add('hidden');
            });

            mobileSidebarClose.addEventListener('click', function() {
                mobileSidebar.classList.add('hidden');
            });

            // User menu dropdown
            const userMenuButton = document.getElementById('user-menu-button');
            const userMenu = document.getElementById('user-menu');

            userMenuButton.addEventListener('click', function() {
                userMenu.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                    userMenu.classList.add('hidden');
                }
            });

            // Animate elements on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-slide-up');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.animate-slide-up').forEach(el => {
                observer.observe(el);
            });

            // Form validation
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const requiredFields = form.querySelectorAll('[required]');
                    let isValid = true;
                    
                    requiredFields.forEach(field => {
                        if (!field.value.trim()) {
                            field.classList.add('border-red-500');
                            isValid = false;
                        } else {
                            field.classList.remove('border-red-500');
                        }
                    });
                    
                    if (!isValid) {
                        e.preventDefault();
                        alert('Por favor, preencha todos os campos obrigatórios.');
                    }
                });
            }
        });
    </script>
</body>
</html>
