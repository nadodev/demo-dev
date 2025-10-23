@extends('layouts.public')

@section('title', 'Últimas Notícias')
@section('description', 'Fique por dentro das novidades e atualizações')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-red-500 to-pink-500 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <div class="inline-flex items-center px-4 py-2 bg-white/20 rounded-full text-sm font-medium mb-6">
                <i class="{{ $newsConfig['icon'] ?? 'fas fa-newspaper' }} mr-2"></i>
                {{ $newsConfig['title'] ?? 'Últimas Notícias' }}
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                {{ $newsConfig['title'] ?? 'Últimas Notícias' }}
            </h1>
            <p class="text-xl md:text-2xl text-red-100 max-w-3xl mx-auto">
                {{ $newsConfig['description'] ?? 'Fique por dentro das novidades e atualizações' }}
            </p>
        </div>
    </div>
</section>

<!-- News Grid -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        @if($news->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($news as $article)
                    <article class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                        @if($article->image)
                            <div class="h-48 overflow-hidden">
                                <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-sm text-gray-500">{{ $article->published_at->format('d/m/Y') }}</span>
                                <span class="px-3 py-1 text-xs font-medium rounded-full {{ $article->status_badge_class }}">
                                    {{ $article->status === 'active' ? 'Publicado' : 'Rascunho' }}
                                </span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">{{ $article->title }}</h3>
                            
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ $article->excerpt ?? Str::limit($article->content, 150) }}</p>
                            
                            <a href="{{ route('public.news.show', $article) }}" 
                               class="inline-flex items-center text-red-600 hover:text-red-800 font-medium">
                                Ler Mais
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $news->links() }}
            </div>
        @else
            <div class="text-center py-20">
                <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-newspaper text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Nenhuma notícia encontrada</h3>
                <p class="text-gray-600">Ainda não temos notícias publicadas.</p>
            </div>
        @endif
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-20 bg-gradient-to-r from-red-500 to-pink-500 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            Receba nossas notícias por email
        </h2>
        <p class="text-xl text-red-100 mb-8 max-w-2xl mx-auto">
            Cadastre-se para receber as últimas notícias e atualizações diretamente em sua caixa de entrada.
        </p>
        <div class="max-w-md mx-auto">
            <form class="flex flex-col sm:flex-row gap-4">
                <input type="email" 
                       placeholder="Seu email" 
                       class="flex-1 px-4 py-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-white">
                <button type="submit" 
                        class="px-8 py-3 bg-white text-red-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors duration-300">
                    <i class="fas fa-envelope mr-2"></i>
                    Inscrever-se
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
