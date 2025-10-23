<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="flex items-center justify-center mb-4">
                <i class="{{ $config['icon'] ?? 'fas fa-cogs' }} text-4xl text-blue-600 mr-3"></i>
            </div>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                {{ $config['title'] ?? 'Nossos Serviços' }}
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                {{ $config['description'] ?? 'Oferecemos soluções completas para impulsionar seu negócio.' }}
            </p>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="bg-gray-50 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-cog text-white text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900">{{ $service->name }}</h3>
                            <p class="text-2xl font-bold text-blue-600">{{ $service->formatted_price }}</p>
                        </div>
                    </div>
                    
                    <p class="text-gray-600 mb-4">{{ $service->short_description ?? Str::limit($service->description, 120) }}</p>
                    
                    @if($service->features && is_array($service->features) && count($service->features) > 0)
                        <ul class="space-y-2 mb-4">
                            @foreach(array_slice($service->features, 0, 3) as $feature)
                                <li class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <a href="{{ route('public.service.show', $service) }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                        Saiba mais <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Call to Action -->
        @if($config['show_cta'] ?? false)
            <div class="text-center mt-12">
                <a href="{{ $config['cta_url'] ?? '#' }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-300">
                    <i class="fas fa-arrow-right mr-2"></i>
                    {{ $config['cta_text'] ?? 'Conheça nossos serviços' }}
                </a>
            </div>
        @endif
    </div>
</section>
