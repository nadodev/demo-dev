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
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(to right, #3b82f6, #2563eb);
            color: white;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            text-decoration: none;
        }
        
        .btn-primary:hover {
            background: linear-gradient(to right, #2563eb, #1d4ed8);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transform: translateY(-2px);
        }
        
        /* Action Button Styles */
        .btn-action {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        
        .btn-view {
            background-color: #dbeafe;
            color: #1e40af;
        }
        
        .btn-view:hover {
            background-color: #bfdbfe;
            color: #1e3a8a;
            transform: translateY(-1px);
        }
        
        .btn-edit {
            background-color: #fef3c7;
            color: #92400e;
        }
        
        .btn-edit:hover {
            background-color: #fde68a;
            color: #78350f;
            transform: translateY(-1px);
        }
        
        .btn-delete {
            background-color: #fee2e2;
            color: #991b1b;
        }
        
        .btn-delete:hover {
            background-color: #fecaca;
            color: #7f1d1d;
            transform: translateY(-1px);
        }
        
        .btn-success {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(to right, #10b981, #059669);
            color: white;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        
        .btn-success:hover {
            background: linear-gradient(to right, #059669, #047857);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transform: translateY(-2px);
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
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            border: 2px solid #d1d5db;
            color: #374151;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            text-decoration: none;
            background: white;
            cursor: pointer;
        }
        
        .btn-outline:hover {
            background-color: #f9fafb;
            border-color: #9ca3af;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }
        
        /* Modern Card Styles */
        .card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            padding: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
            transform: translateY(-4px);
        }
        
        .card-header {
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #111827;
            display: flex;
            align-items: center;
        }
        
        /* Modern Table Styles */
        .table-modern {
            width: 100%;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
        }
        
        .table-modern thead {
            background: linear-gradient(to right, #f9fafb, #f3f4f6);
        }
        
        .table-modern th {
            padding: 1rem 1.5rem;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 600;
            color: #4b5563;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .table-modern td {
            padding: 1rem 1.5rem;
            white-space: nowrap;
            font-size: 0.875rem;
            color: #111827;
        }
        
        .table-modern tbody tr {
            border-bottom: 1px solid #e5e7eb;
            transition: background-color 0.2s ease;
        }
        
        .table-modern tbody tr:hover {
            background-color: #f9fafb;
        }
        
        .table-modern tbody tr:last-child {
            border-bottom: none;
        }
        
        /* Modern Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
        }
        
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            font-size: 0.875rem;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .form-input:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .form-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            font-size: 0.875rem;
            background-color: white;
        }
        
        .form-select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .form-select:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .form-textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            font-size: 0.875rem;
            resize: none;
        }
        
        .form-textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .form-textarea:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        /* Status Badges */
        .badge-success {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 500;
            background-color: #dcfce7;
            color: #166534;
            border-radius: 9999px;
        }
        
        .badge-warning {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 500;
            background-color: #fef3c7;
            color: #92400e;
            border-radius: 9999px;
        }
        
        .badge-danger {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 500;
            background-color: #fee2e2;
            color: #991b1b;
            border-radius: 9999px;
        }
        
        .badge-info {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 500;
            background-color: #dbeafe;
            color: #1e40af;
            border-radius: 9999px;
        }
        
        .badge-secondary {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 500;
            background-color: #f3f4f6;
            color: #374151;
            border-radius: 9999px;
        }
        
        /* Modern Pagination Styles */
        .pagination {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin: 0;
            padding: 0;
            list-style: none;
        }
        
        .pagination li {
            display: inline-block;
        }
        
        .pagination a,
        .pagination span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 2.5rem;
            height: 2.5rem;
            padding: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            border: 1px solid #e5e7eb;
            background: white;
            color: #374151;
        }
        
        .pagination a:hover {
            background-color: #f3f4f6;
            border-color: #d1d5db;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .pagination .active span {
            background: linear-gradient(to right, #3b82f6, #2563eb);
            color: white;
            border-color: #3b82f6;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
        }
        
        .pagination .disabled span {
            background-color: #f9fafb;
            color: #9ca3af;
            border-color: #e5e7eb;
            cursor: not-allowed;
        }
        
        .pagination .disabled span:hover {
            background-color: #f9fafb;
            transform: none;
            box-shadow: none;
        }
        
        /* Pagination Info */
        .pagination-info {
            font-size: 0.875rem;
            color: #6b7280;
            font-weight: 500;
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

    @stack('styles')
    
    <script>
        // Verificar se o Tailwind está carregado
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM carregado');
            if (typeof tailwind === 'undefined') {
                console.warn('Tailwind CSS não está carregado');
            } else {
                console.log('Tailwind CSS carregado com sucesso');
            }
        });
    </script>
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <div class="hidden lg:flex lg:flex-shrink-0" id="desktop-sidebar">
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
                        <h1 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 truncate">@yield('page-title', 'Dashboard')</h1>
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

    <div class="lg:hidden hidden" id="mobile-sidebar">
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

            // Garantir que a sidebar mobile comece fechada
            mobileSidebar.classList.add('hidden');

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
