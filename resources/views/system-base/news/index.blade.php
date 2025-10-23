@extends('layouts.admin')

@section('title', 'Notícias')
@section('page-title', 'Notícias')

@section('top-actions')
    <a href="{{ route('dashboard.news.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-300">
        <i class="fas fa-plus mr-2"></i>
        Nova Notícia
    </a>
@endsection

@section('content')
    <!-- Header Actions -->
    <div class="mb-6 sm:mb-8 animate-fade-in">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="mb-4 sm:mb-0">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">
                    Gerenciar Notícias
                </h2>
                <p class="mt-2 text-sm sm:text-base text-gray-600">
                    Gerencie todas as suas notícias e artigos.
                </p>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
        <!-- Total News -->
        <div class="bg-white overflow-hidden shadow-lg rounded-xl hover:shadow-xl transition-shadow duration-300 animate-slide-up">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-newspaper text-white text-lg sm:text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-3 sm:ml-4">
                        <p class="text-xs sm:text-sm font-medium text-gray-500">Total de Notícias</p>
                        <p class="text-xl sm:text-2xl font-semibold text-gray-900">{{ $news->total() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Published News -->
        <div class="bg-white overflow-hidden shadow-lg rounded-xl hover:shadow-xl transition-shadow duration-300 animate-slide-up" style="animation-delay: 0.1s;">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-check-circle text-white text-lg sm:text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-3 sm:ml-4">
                        <p class="text-xs sm:text-sm font-medium text-gray-500">Publicadas</p>
                        <p class="text-xl sm:text-2xl font-semibold text-gray-900">{{ $news->where('status', 'published')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Draft News -->
        <div class="bg-white overflow-hidden shadow-lg rounded-xl hover:shadow-xl transition-shadow duration-300 animate-slide-up" style="animation-delay: 0.2s;">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-yellow-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-edit text-white text-lg sm:text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-3 sm:ml-4">
                        <p class="text-xs sm:text-sm font-medium text-gray-500">Rascunhos</p>
                        <p class="text-xl sm:text-2xl font-semibold text-gray-900">{{ $news->where('status', 'draft')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- New This Month -->
        <div class="bg-white overflow-hidden shadow-lg rounded-xl hover:shadow-xl transition-shadow duration-300 animate-slide-up" style="animation-delay: 0.3s;">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-plus text-white text-lg sm:text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-3 sm:ml-4">
                        <p class="text-xs sm:text-sm font-medium text-gray-500">Novas Este Mês</p>
                        <p class="text-xl sm:text-2xl font-semibold text-gray-900">{{ $news->where('created_at', '>=', now()->startOfMonth())->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- News Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        @forelse($news as $newsItem)
            <div class="bg-white shadow-lg rounded-xl hover:shadow-xl transition-all duration-300 transform hover:scale-105 animate-slide-up">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $newsItem->title }}</h3>
                            <p class="text-sm text-gray-600 mb-3">{{ Str::limit($newsItem->excerpt ?? $newsItem->content, 100) }}</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-medium rounded-full {{ $newsItem->getStatusBadgeClassAttribute() }}">
                            {{ ucfirst($newsItem->status) }}
                        </span>
                    </div>
                    
                    <div class="mb-4">
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <span>{{ $newsItem->created_at->format('d/m/Y') }}</span>
                            @if($newsItem->published_at)
                                <span>Publicado: {{ $newsItem->published_at->format('d/m/Y') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="flex space-x-2">
                        <a href="{{ route('dashboard.news.show', $newsItem) }}" class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-blue-50 text-blue-600 font-medium rounded-lg hover:bg-blue-100 transition-colors duration-300">
                            <i class="fas fa-eye mr-2"></i>
                            Ver
                        </a>
                        <a href="{{ route('dashboard.news.edit', $newsItem) }}" class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-gray-50 text-gray-600 font-medium rounded-lg hover:bg-gray-100 transition-colors duration-300">
                            <i class="fas fa-edit mr-2"></i>
                            Editar
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-newspaper text-gray-400 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Nenhuma notícia encontrada</h3>
                    <p class="text-gray-600 mb-6">Comece criando sua primeira notícia.</p>
                    <a href="{{ route('dashboard.news.create') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-300">
                        <i class="fas fa-plus mr-2"></i>
                        Criar Notícia
                    </a>
                </div>
            </div>
        @endforelse
    </div>
    
    @if($news->hasPages())
        <div class="mt-8">
            {{ $news->links() }}
        </div>
    @endif
@endsection