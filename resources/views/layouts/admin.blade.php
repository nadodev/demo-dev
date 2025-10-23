<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') - {{ config('system.app.name') }}</title>

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
    @endif
    
    <!-- Modern Styles -->
    <style>
        /* Modern Button Styles */
        .btn-primary {
            @apply inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5;
        }
        
        .btn-success {
            @apply inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5;
        }
        
        .btn-warning {
            @apply inline-flex items-center px-6 py-3 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white font-semibold rounded-xl hover:from-yellow-600 hover:to-yellow-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5;
        }
        
        .btn-danger {
            @apply inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white font-semibold rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5;
        }
        
        .btn-secondary {
            @apply inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-500 to-gray-600 text-white font-semibold rounded-xl hover:from-gray-600 hover:to-gray-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5;
        }
        
        .btn-outline {
            @apply inline-flex items-center px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5;
        }
        
        /* Modern Card Styles */
        .card {
            @apply bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1;
        }
        
        .card-header {
            @apply border-b border-gray-200 pb-4 mb-6;
        }
        
        .card-title {
            @apply text-xl font-bold text-gray-900 flex items-center;
        }
        
        /* Modern Table Styles */
        .table-modern {
            @apply w-full bg-white rounded-2xl shadow-xl overflow-hidden;
        }
        
        .table-modern thead {
            @apply bg-gradient-to-r from-gray-50 to-gray-100;
        }
        
        .table-modern th {
            @apply px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider;
        }
        
        .table-modern td {
            @apply px-6 py-4 whitespace-nowrap text-sm text-gray-900;
        }
        
        .table-modern tbody tr {
            @apply border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200;
        }
        
        .table-modern tbody tr:last-child {
            @apply border-b-0;
        }
        
        /* Modern Form Styles */
        .form-group {
            @apply mb-6;
        }
        
        .form-label {
            @apply block text-sm font-semibold text-gray-700 mb-2;
        }
        
        .form-input {
            @apply w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 shadow-sm hover:shadow-md;
        }
        
        .form-select {
            @apply w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 shadow-sm hover:shadow-md;
        }
        
        .form-textarea {
            @apply w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 shadow-sm hover:shadow-md resize-none;
        }
        
        /* Status Badges */
        .badge-success {
            @apply px-3 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full;
        }
        
        .badge-warning {
            @apply px-3 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full;
        }
        
        .badge-danger {
            @apply px-3 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full;
        }
        
        .badge-info {
            @apply px-3 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full;
        }
        
        .badge-secondary {
            @apply px-3 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-full;
        }
        
        /* Animation Classes */
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        
        .animate-slide-up {
            animation: slideUp 0.6s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0; 
                transform: translateY(20px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        
        /* Glass Effect */
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
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

    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col h-0 flex-1 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
                    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                        <div class="flex items-center flex-shrink-0 px-4 mb-8">
                            <div class="flex items-center">
                                <img class="h-10 w-auto" src="{{ asset('images/logo.png') }}" alt="{{ config('system.app.name') }}">
                                <span class="ml-3 text-xl font-bold text-white">{{ config('system.app.name') }}</span>
                            </div>
                        </div>

                        <nav class="mt-5 flex-1 px-2 space-y-1">
                            <a href="{{ route('dashboard') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard') ? 'text-white bg-blue-600' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} transition-colors duration-300">
                                <i class="fas fa-home mr-3 text-lg"></i>
                                Dashboard
                            </a>

                            <a href="{{ route('dashboard.clients.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard.clients.*') ? 'text-white bg-blue-600' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} transition-colors duration-300">
                                <i class="fas fa-users mr-3 text-lg"></i>
                                Clientes
                            </a>

                            <a href="{{ route('dashboard.products.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard.products.*') ? 'text-white bg-blue-600' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} transition-colors duration-300">
                                <i class="fas fa-box mr-3 text-lg"></i>
                                Produtos
                            </a>

                            <a href="{{ route('dashboard.news.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard.news.*') ? 'text-white bg-blue-600' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} transition-colors duration-300">
                                <i class="fas fa-newspaper mr-3 text-lg"></i>
                                Notícias
                            </a>

                            <a href="{{ route('dashboard.services.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard.services.*') ? 'text-white bg-blue-600' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} transition-colors duration-300">
                                <i class="fas fa-cogs mr-3 text-lg"></i>
                                Serviços
                            </a>

                            <a href="{{ route('dashboard.users.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard.users.*') ? 'text-white bg-blue-600' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} transition-colors duration-300">
                                <i class="fas fa-users mr-3 text-lg"></i>
                                Usuários
                            </a>

                            <a href="{{ route('dashboard.public-page.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard.public-page.*') ? 'text-white bg-blue-600' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} transition-colors duration-300">
                                <i class="fas fa-globe mr-3 text-lg"></i>
                                Página Pública
                            </a>
                        </nav>

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

        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
                <button type="button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 lg:hidden" id="sidebar-toggle">
                    <i class="fas fa-bars text-lg"></i>
                </button>
                
                <div class="flex-1 px-4 flex justify-between">
                    <div class="flex-1 flex items-center">
                        <h1 class="text-xl sm:text-2xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                    </div>
                    
                    <div class="ml-4 flex items-center md:ml-6">
                        @yield('top-actions')
                        
                      

                        <div class="ml-3 relative">
                            <div>
                                <button class="cursor-pointer max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" id="user-menu-button">
                                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-white text-sm"></i>
                                    </div>
                                </button>
                            </div>
                            
                            <!-- Dropdown menu -->
                            <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" id="user-menu">
                                <a href="{{ route('dashboard.profile.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user mr-2"></i>Meu Perfil
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="cursor-pointer block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Sair
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <main class="flex-1 relative overflow-y-auto focus:outline-none">
                <div class="py-4 sm:py-6">
                    <div class="mx-auto px-3 sm:px-4 lg:px-6 xl:px-8">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>

    @include('components.toaster')

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
                        <a href="{{ route('dashboard') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md {{ request()->routeIs('dashboard') ? 'text-white bg-blue-600' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-home mr-3"></i>
                            Dashboard
                        </a>
                        <a href="{{ route('dashboard.clients.index') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md {{ request()->routeIs('dashboard.clients.*') ? 'text-white bg-blue-600' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-users mr-3"></i>
                            Clientes
                        </a>
                        <a href="{{ route('dashboard.products.index') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md {{ request()->routeIs('dashboard.products.*') ? 'text-white bg-blue-600' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-box mr-3"></i>
                            Produtos
                        </a>
                        <a href="{{ route('dashboard.news.index') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md {{ request()->routeIs('dashboard.news.*') ? 'text-white bg-blue-600' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-newspaper mr-3"></i>
                            Notícias
                        </a>
                        <a href="{{ route('dashboard.services.index') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md {{ request()->routeIs('dashboard.services.*') ? 'text-white bg-blue-600' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-cogs mr-3"></i>
                            Serviços
                        </a>
                        <a href="{{ route('dashboard.public-page.index') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md {{ request()->routeIs('dashboard.public-page.*') ? 'text-white bg-blue-600' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-globe mr-3"></i>
                            Página Pública
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

            const userMenuButton = document.getElementById('user-menu-button');
            const userMenu = document.getElementById('user-menu');

            userMenuButton.addEventListener('click', function() {
                userMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                    userMenu.classList.add('hidden');
                }
            });

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
        });
    </script>

    @stack('scripts')
</body>
</html>
