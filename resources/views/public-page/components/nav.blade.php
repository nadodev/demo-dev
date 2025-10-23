<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 shadow-2xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-105">
                        <i class="fas fa-rocket text-white text-lg"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl font-bold text-white group-hover:text-blue-300 transition-colors duration-300">{{ config('system.app.name') }}</span>
                        <span class="text-xs text-blue-200 font-medium">Sistema de Gestão</span>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-1">
                <a href="/" class="relative flex items-center px-3 py-2 text-white/90 hover:text-white transition-all duration-300 font-medium rounded-lg hover:bg-white/10 group">
                    <i class="fas fa-home mr-1.5 text-sm"></i>Início
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-400 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ route('public.clients') }}" class="relative flex items-center px-3 py-2 text-white/90 hover:text-white transition-all duration-300 font-medium rounded-lg hover:bg-white/10 group">
                    <i class="fas fa-users mr-1.5 text-sm"></i>Clientes
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-400 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ route('public.services') }}" class="relative flex items-center px-3 py-2 text-white/90 hover:text-white transition-all duration-300 font-medium rounded-lg hover:bg-white/10 group">
                    <i class="fas fa-cogs mr-1.5 text-sm"></i>Serviços
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-400 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ route('public.products') }}" class="relative flex items-center px-3 py-2 text-white/90 hover:text-white transition-all duration-300 font-medium rounded-lg hover:bg-white/10 group">
                    <i class="fas fa-box mr-1.5 text-sm"></i>Produtos
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-400 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ route('public.news') }}" class="relative flex items-center px-3 py-2 text-white/90 hover:text-white transition-all duration-300 font-medium rounded-lg hover:bg-white/10 group">
                    <i class="fas fa-newspaper mr-1.5 text-sm"></i>Notícias
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-400 group-hover:w-full transition-all duration-300"></span>
                </a>
               
            </div>

            <!-- Auth Buttons -->
            <div class="hidden lg:flex items-center space-x-3">
                <a href="{{ route('login') }}" class="px-4 py-2 text-white/90 hover:text-white transition-all duration-300 font-medium rounded-lg hover:bg-white/10 border border-white/20 hover:border-white/40">
                    <i class="fas fa-sign-in-alt mr-1.5 text-sm"></i>Entrar
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="lg:hidden">
                <button id="mobile-menu-button" class="text-white hover:text-blue-300 focus:outline-none focus:text-blue-300 transition-colors duration-300 p-2 rounded-lg hover:bg-white/10">
                    <i id="menu-icon" class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden lg:hidden absolute top-20 left-0 right-0 bg-gradient-to-b from-slate-900 to-blue-900 shadow-2xl border-t border-white/10 z-50">
            <div class="px-6 py-6 space-y-2">
                <a href="/" class="flex items-center px-4 py-3 text-white/90 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-300 group">
                    <i class="fas fa-home mr-3 text-blue-400 text-sm"></i>
                    <span class="font-medium">Início</span>
                </a>
                <a href="{{ route('public.clients') }}" class="flex items-center px-4 py-3 text-white/90 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-300 group">
                    <i class="fas fa-users mr-3 text-blue-400 text-sm"></i>
                    <span class="font-medium">Clientes</span>
                </a>
                <a href="{{ route('public.services') }}" class="flex items-center px-4 py-3 text-white/90 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-300 group">
                    <i class="fas fa-cogs mr-3 text-blue-400 text-sm"></i>
                    <span class="font-medium">Serviços</span>
                </a>
                <a href="{{ route('public.products') }}" class="flex items-center px-4 py-3 text-white/90 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-300 group">
                    <i class="fas fa-box mr-3 text-blue-400 text-sm"></i>
                    <span class="font-medium">Produtos</span>
                </a>
                <a href="{{ route('public.news') }}" class="flex items-center px-4 py-3 text-white/90 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-300 group">
                    <i class="fas fa-newspaper mr-3 text-blue-400 text-sm"></i>
                    <span class="font-medium">Notícias</span>
                </a>
                
                
                <div class="border-t border-white/10 pt-4 mt-4">
                    <a href="{{ route('login') }}" class="flex items-center px-4 py-3 text-white/90 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-300 group">
                        <i class="fas fa-sign-in-alt mr-3 text-green-400 text-sm"></i>
                        <span class="font-medium">Entrar</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>