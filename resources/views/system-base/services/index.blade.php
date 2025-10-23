@extends('layouts.admin')

@section('title', 'Serviços')
@section('page-title', 'Serviços')

@section('top-actions')
    <a href="{{ route('dashboard.services.create') }}" class="btn-primary">
        <i class="fas fa-plus mr-2"></i>
        Novo Serviço
    </a>
@endsection

@section('content')
    <!-- Header Actions -->
    <div class="mb-6 sm:mb-8 animate-fade-in">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="mb-4 sm:mb-0">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">
                    Gerenciar Serviços
                </h2>
                <p class="mt-2 text-sm sm:text-base text-gray-600">
                    Gerencie todos os seus serviços e ofertas.
                </p>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Services -->
        <div class="card animate-slide-up">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-cogs text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Total de Serviços</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $services->total() }}</p>
                </div>
            </div>
        </div>

        <!-- Active Services -->
        <div class="card animate-slide-up" style="animation-delay: 0.1s;">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-check-circle text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Ativos</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $services->where('status', 'active')->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Inactive Services -->
        <div class="card animate-slide-up" style="animation-delay: 0.2s;">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-pause-circle text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Inativos</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $services->where('status', 'inactive')->count() }}</p>
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
                    <p class="text-sm font-medium text-gray-500">Novos Este Mês</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $services->where('created_at', '>=', now()->startOfMonth())->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-cogs text-green-500 mr-3"></i>
                Lista de Serviços
            </h3>
        </div>

        @if($services->count() > 0)
            <div class="overflow-x-auto">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th>Serviço</th>
                            <th>Preço</th>
                            <th>Categoria</th>
                            <th>Status</th>
                            <th>Criado em</th>
                            <th class="text-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        <tr class="animate-fade-in">
                            <td>
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center mr-3">
                                        <i class="fas fa-cogs text-white"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">{{ $service->name }}</div>
                                        <div class="text-sm text-gray-500">{{ Str::limit($service->description, 50) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-sm font-semibold text-gray-900">{{ $service->formatted_price }}</div>
                            </td>
                            <td>
                                <div class="text-sm text-gray-900">{{ $service->category ?? 'Sem categoria' }}</div>
                            </td>
                            <td>
                                @if($service->status === 'active')
                                    <span class="badge-success">Ativo</span>
                                @elseif($service->status === 'inactive')
                                    <span class="badge-danger">Inativo</span>
                                @else
                                    <span class="badge-warning">Rascunho</span>
                                @endif
                            </td>
                            <td>
                                <div class="text-sm text-gray-900">{{ $service->created_at->format('d/m/Y') }}</div>
                            </td>
                            <td class="text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('dashboard.services.show', $service) }}" 
                                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 hover:text-blue-700 transition-colors duration-200">
                                        <i class="fas fa-eye mr-1"></i>
                                        Ver
                                    </a>
                                    <a href="{{ route('dashboard.services.edit', $service) }}" 
                                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-yellow-600 hover:text-yellow-700 transition-colors duration-200">
                                        <i class="fas fa-edit mr-1"></i>
                                        Editar
                                    </a>
                                    <form action="{{ route('dashboard.services.destroy', $service) }}" method="POST" class="inline" 
                                          onsubmit="return confirm('Tem certeza que deseja excluir este serviço?')">
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
            @if($services->hasPages())
                <div class="mt-6 flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Mostrando {{ $services->firstItem() }} a {{ $services->lastItem() }} de {{ $services->total() }} resultados
                    </div>
                    <div class="flex space-x-2">
                        {{ $services->links() }}
                    </div>
                </div>
            @endif
        @else
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-cogs text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Nenhum serviço encontrado</h3>
                <p class="text-gray-500 mb-6">Comece criando seu primeiro serviço.</p>
                <a href="{{ route('dashboard.services.create') }}" class="btn-primary">
                    <i class="fas fa-plus mr-2"></i>
                    Criar Primeiro Serviço
                </a>
            </div>
        @endif
    </div>
@endsection