<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="flex items-center justify-center mb-4">
                <i class="{{ $config['icon'] ?? 'fas fa-newspaper' }} text-4xl text-blue-600 mr-3"></i>
            </div>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                {{ $config['title'] ?? 'Últimas Notícias' }}
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                {{ $config['description'] ?? 'Fique por dentro das novidades e atualizações.' }}
            </p>
        </div>

        <!-- News Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($news as $article)
                <article class="bg-gray-50 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 overflow-hidden">
                    @if($article->featured_image)
                        <div class="h-48 bg-gray-200 flex items-center justify-center">
                            <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="h-48 bg-gradient-to-r from-blue-500 to-purple-500 flex items-center justify-center">
                            <i class="fas fa-newspaper text-white text-4xl"></i>
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm text-gray-500">{{ $article->published_at->format('d/m/Y') }}</span>
                            <span class="px-2 py-1 text-xs font-medium rounded-full {{ $article->status_badge_class }}">
                                {{ ucfirst($article->status) }}
                            </span>
                        </div>
                        
                        <h3 class="font-semibold text-gray-900 mb-2">{{ $article->title }}</h3>
                        
                        <p class="text-gray-600 mb-4">{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 120) }}</p>
                        
                        <a href="{{ route('public.news.show', $article) }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                            Ler mais <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Call to Action -->
        @if($config['show_cta'] ?? false)
            <div class="text-center mt-12">
                <a href="{{ $config['cta_url'] ?? '#' }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-300">
                    <i class="fas fa-arrow-right mr-2"></i>
                    {{ $config['cta_text'] ?? 'Ver todas as notícias' }}
                </a>
            </div>
        @endif
    </div>
</section>
