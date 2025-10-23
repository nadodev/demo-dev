@extends('layouts.admin')

@section('title', 'Produtos')
@section('page-title', 'Produtos')

@section('top-actions')
    <a href="{{ route('dashboard.products.create') }}" class="btn-primary">
        <i class="fas fa-plus mr-2"></i>
        Novo Produto
    </a>
@endsection

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Products -->
        <div class="card animate-slide-up">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-box text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Total de Produtos</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $products->total() }}</p>
                </div>
            </div>
        </div>

        <!-- Active Products -->
        <div class="card animate-slide-up" style="animation-delay: 0.1s;">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-check-circle text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Produtos Ativos</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $products->where('status', 'active')->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Inactive Products -->
        <div class="card animate-slide-up" style="animation-delay: 0.2s;">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-times-circle text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Produtos Inativos</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $products->where('status', 'inactive')->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Draft Products -->
        <div class="card animate-slide-up" style="animation-delay: 0.3s;">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-edit text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Rascunhos</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $products->where('status', 'draft')->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-box text-green-500 mr-3"></i>
                Lista de Produtos
            </h3>
        </div>

        @if($products->count() > 0)
            <div class="overflow-x-auto">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Categoria</th>
                            <th>Status</th>
                            <th>Criado em</th>
                            <th class="text-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr class="animate-fade-in">
                            <td>
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center mr-3">
                                        <i class="fas fa-box text-white"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">{{ $product->name }}</div>
                                        <div class="text-sm text-gray-500">{{ Str::limit($product->description, 50) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-sm font-semibold text-gray-900">R$ {{ number_format($product->price, 2, ',', '.') }}</div>
                            </td>
                            <td>
                                <div class="text-sm text-gray-900">{{ $product->category ?? 'Sem categoria' }}</div>
                            </td>
                            <td>
                                @if($product->status === 'active')
                                    <span class="badge-success">Ativo</span>
                                @elseif($product->status === 'inactive')
                                    <span class="badge-danger">Inativo</span>
                                @else
                                    <span class="badge-warning">Rascunho</span>
                                @endif
                            </td>
                            <td>
                                <div class="text-sm text-gray-900">{{ $product->created_at->format('d/m/Y') }}</div>
                            </td>
                            <td class="text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('dashboard.products.show', $product) }}" 
                                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 hover:text-blue-700 transition-colors duration-200">
                                        <i class="fas fa-eye mr-1"></i>
                                        Ver
                                    </a>
                                    <a href="{{ route('dashboard.products.edit', $product) }}" 
                                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-yellow-600 hover:text-yellow-700 transition-colors duration-200">
                                        <i class="fas fa-edit mr-1"></i>
                                        Editar
                                    </a>
                                    <form action="{{ route('dashboard.products.destroy', $product) }}" method="POST" class="inline" 
                                          onsubmit="return confirm('Tem certeza que deseja excluir este produto?')">
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
            @if($products->hasPages())
                <div class="mt-6 flex items-center justify-between">
                    <div class="pagination-info">
                        Mostrando {{ $products->firstItem() }} a {{ $products->lastItem() }} de {{ $products->total() }} resultados
                    </div>
                    <div class="flex space-x-2">
                        {{ $products->links() }}
                    </div>
                </div>
            @endif
        @else
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-box text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Nenhum produto encontrado</h3>
                <p class="text-gray-500 mb-6">Comece criando seu primeiro produto.</p>
                <a href="{{ route('dashboard.products.create') }}" class="btn-primary">
                    <i class="fas fa-plus mr-2"></i>
                    Criar Primeiro Produto
                </a>
            </div>
        @endif
    </div>
@endsection