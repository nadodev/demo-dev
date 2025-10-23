{{-- Footer Component --}}
<footer class="bg-gray-800 text-white">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center">
                    <img class="h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="{{ config('system.app.name') }}">
                    <span class="ml-2 text-xl font-bold">{{ config('system.app.name') }}</span>
                </div>
                <p class="mt-4 text-gray-300">
                    {{ config('system.app.description') }}
                </p>
                <p class="mt-2 text-sm text-gray-400">
                    Versão {{ config('system.app.version') }}
                </p>
            </div>
            
            <div>
                <h3 class="text-sm font-semibold text-gray-300 uppercase tracking-wider">Sistema</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-white">Dashboard</a></li>
                    <li><a href="{{ route('dashboard.products.index') }}" class="text-gray-300 hover:text-white">Produtos</a></li>
                    <li><a href="{{ route('dashboard.clients.index') }}" class="text-gray-300 hover:text-white">Clientes</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-sm font-semibold text-gray-300 uppercase tracking-wider">Suporte</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-white">Documentação</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">FAQ</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Contato</a></li>
                </ul>
            </div>
        </div>
        
        <div class="mt-8 border-t border-gray-700 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} {{ config('system.app.name') }}. Todos os direitos reservados.
                </p>
                <div class="mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white text-sm mr-4">Política de Privacidade</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Termos de Uso</a>
                </div>
            </div>
        </div>
    </div>
</footer>
