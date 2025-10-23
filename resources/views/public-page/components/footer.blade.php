<footer class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Company Info -->
            <div class="md:col-span-2">
                <div class="flex items-center mb-4">
                    <img class="h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="{{ config('system.app.name') }}">
                    <span class="ml-2 text-xl font-bold">{{ $config['company_name'] ?? config('system.app.name') }}</span>
                </div>
                <p class="text-gray-300 mb-6 max-w-md">
                    {{ $config['description'] ?? 'Sistema de gestão completo para sua empresa.' }}
                </p>
                
                <!-- Social Links -->
                @if(isset($config['social_links']) && is_array($config['social_links']))
                    <div class="flex space-x-4">
                        @foreach($config['social_links'] as $platform => $url)
                            <a href="{{ $url }}" class="text-gray-400 hover:text-white transition-colors duration-300">
                                <i class="fab fa-{{ $platform }} text-xl"></i>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
            
            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">{{ $config['links_title'] ?? 'Links Rápidos' }}</h3>
                <ul class="space-y-2">
                
                        <li><a href="{{ route('public.clients') }}" class="text-gray-300 hover:text-white transition-colors duration-300">Clientes</a></li>
                        <li><a href="{{ route('public.services') }}" class="text-gray-300 hover:text-white transition-colors duration-300">Serviços</a></li>
                        <li><a href="{{ route('public.products') }}" class="text-gray-300 hover:text-white transition-colors duration-300">Produtos</a></li>
                        <li><a href="{{ route('public.news') }}" class="text-gray-300 hover:text-white transition-colors duration-300">Notícias</a></li>
                </ul>
            </div>
        </div>
        
        <!-- Bottom Bar -->
        <div class="mt-8 pt-6 border-t border-gray-700">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} {{ $config['company_name'] ?? config('system.app.name') }}. {{ $config['copyright_text'] ?? 'Todos os direitos reservados.' }}
                </p>
               
            </div>
        </div>
    </div>
</footer>
