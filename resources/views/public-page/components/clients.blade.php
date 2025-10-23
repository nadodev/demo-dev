<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="flex items-center justify-center mb-4">
                <i class="{{ $config['icon'] ?? 'fas fa-users' }} text-4xl text-blue-600 mr-3"></i>
            </div>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                {{ $config['title'] ?? 'Nossos Clientes' }}
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                {{ $config['description'] ?? 'Conheça algumas das empresas que confiam em nossos serviços.' }}
            </p>
        </div>

        <!-- Clients Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($clients as $client)
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold text-lg">{{ substr($client->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">{{ $client->name }}</h3>
                            @if($client->company)
                                <p class="text-sm text-gray-600">{{ $client->company }}</p>
                            @endif
                        </div>
                    </div>
                    @if($client->notes)
                        <p class="text-gray-600 text-sm italic">"{{ Str::limit($client->notes, 100) }}"</p>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Call to Action -->
        @if($config['show_cta'] ?? false)
            <div class="text-center mt-12">
                <a href="{{ $config['cta_url'] ?? '#' }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-300">
                    <i class="fas fa-arrow-right mr-2"></i>
                    {{ $config['cta_text'] ?? 'Torne-se nosso cliente' }}
                </a>
            </div>
        @endif
    </div>
</section>
