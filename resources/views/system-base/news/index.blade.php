@extends('layouts.admin')

@section('title', 'Notícias')
@section('page-title', 'Notícias')

@section('top-actions')
    <a href="{{ route('dashboard.news.create') }}" class="btn-primary">
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
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total News -->
        <div class="card animate-slide-up">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-newspaper text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Total de Notícias</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $news->total() }}</p>
                </div>
            </div>
        </div>

        <!-- Published News -->
        <div class="card animate-slide-up" style="animation-delay: 0.1s;">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-check-circle text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Publicadas</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $news->where('status', 'published')->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Draft News -->
        <div class="card animate-slide-up" style="animation-delay: 0.2s;">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-edit text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Rascunhos</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $news->where('status', 'draft')->count() }}</p>
                </div>
            </div>
        </div>

        <!-- New This Month -->
        <div class="card animate-slide-up" style="animation-delay: 0.3s;">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-plus text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Novas Este Mês</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $news->where('created_at', '>=', now()->startOfMonth())->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-newspaper text-blue-500 mr-3"></i>
                Lista de Notícias
            </h3>
        </div>

        @if($news->count() > 0)
            <div class="overflow-x-auto">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Categoria</th>
                            <th>Status</th>
                            <th>Data</th>
                            <th class="text-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $newsItem)
                        <tr class="animate-fade-in">
                            <td>
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-newspaper text-white"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">{{ $newsItem->title }}</div>
                                        <div class="text-sm text-gray-500">{{ Str::limit($newsItem->excerpt ?? $newsItem->content, 50) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-sm text-gray-900">{{ $newsItem->category ?? 'Sem categoria' }}</div>
                            </td>
                            <td>
                                @if($newsItem->status === 'published')
                                    <span class="badge-success">Publicada</span>
                                @elseif($newsItem->status === 'draft')
                                    <span class="badge-warning">Rascunho</span>
                                @else
                                    <span class="badge-secondary">Inativa</span>
                                @endif
                            </td>
                            <td>
                                <div class="text-sm text-gray-900">{{ $newsItem->created_at->format('d/m/Y') }}</div>
                            </td>
                            <td class="text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('dashboard.news.show', $newsItem) }}" 
                                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 hover:text-blue-700 transition-colors duration-200">
                                        <i class="fas fa-eye mr-1"></i>
                                        Ver
                                    </a>
                                    <a href="{{ route('dashboard.news.edit', $newsItem) }}" 
                                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-yellow-600 hover:text-yellow-700 transition-colors duration-200">
                                        <i class="fas fa-edit mr-1"></i>
                                        Editar
                                    </a>
                                    <form action="{{ route('dashboard.news.destroy', $newsItem) }}" method="POST" class="inline" 
                                          onsubmit="return confirm('Tem certeza que deseja excluir esta notícia?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-600 hover:text-red-700 transition-colors duration-200">
                                            <i class="fas fa-trash mr-1"></i>
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($news->hasPages())
                <div class="mt-6 flex items-center justify-between">
                    <div class="pagination-info">
                        Mostrando {{ $news->firstItem() }} a {{ $news->lastItem() }} de {{ $news->total() }} resultados
                    </div>
                    <div class="flex space-x-2">
                        {{ $news->links() }}
                    </div>
                </div>
            @endif
        @else
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-newspaper text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Nenhuma notícia encontrada</h3>
                <p class="text-gray-500 mb-6">Comece criando sua primeira notícia.</p>
                <a href="{{ route('dashboard.news.create') }}" class="btn-primary">
                    <i class="fas fa-plus mr-2"></i>
                    Criar Primeira Notícia
                </a>
            </div>
        @endif
    </div>
@endsection