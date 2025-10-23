@extends('layouts.admin')

@section('title', 'Clientes')
@section('page-title', 'Clientes')

@section('top-actions')
    <a href="{{ route('dashboard.clients.create') }}" class="btn-primary">
        <i class="fas fa-plus mr-2"></i>
        Novo Cliente
    </a>
@endsection

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Clients -->
        <div class="card animate-slide-up">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Total de Clientes</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $clients->total() }}</p>
                </div>
            </div>
        </div>

        <!-- Active Clients -->
        <div class="card animate-slide-up" style="animation-delay: 0.1s;">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-check-circle text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Clientes Ativos</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $clients->where('status', 'active')->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Inactive Clients -->
        <div class="card animate-slide-up" style="animation-delay: 0.2s;">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-times-circle text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Clientes Inativos</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $clients->where('status', 'inactive')->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Pending Clients -->
        <div class="card animate-slide-up" style="animation-delay: 0.3s;">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-clock text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Pendentes</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $clients->where('status', 'pending')->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-users text-blue-500 mr-3"></i>
                Lista de Clientes
            </h3>
        </div>

        @if($clients->count() > 0)
            <div class="overflow-x-auto">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Status</th>
                            <th>Criado em</th>
                            <th class="text-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                        <tr class="animate-fade-in">
                            <td>
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">{{ $client->name }}</div>
                                        @if($client->company)
                                            <div class="text-sm text-gray-500">{{ $client->company }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-sm text-gray-900">{{ $client->email }}</div>
                            </td>
                            <td>
                                <div class="text-sm text-gray-900">{{ $client->phone ?? 'N/A' }}</div>
                            </td>
                            <td>
                                @if($client->status === 'active')
                                    <span class="badge-success">Ativo</span>
                                @elseif($client->status === 'inactive')
                                    <span class="badge-danger">Inativo</span>
                                @else
                                    <span class="badge-warning">Pendente</span>
                                @endif
                            </td>
                            <td>
                                <div class="text-sm text-gray-900">{{ $client->created_at->format('d/m/Y') }}</div>
                            </td>
                            <td class="text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('dashboard.clients.show', $client) }}" 
                                       class="btn-action btn-view">
                                        <i class="fas fa-eye mr-1"></i>
                                        Ver
                                    </a>
                                    <a href="{{ route('dashboard.clients.edit', $client) }}" 
                                       class="btn-action btn-edit">
                                        <i class="fas fa-edit mr-1"></i>
                                        Editar
                                    </a>
                                    <form action="{{ route('dashboard.clients.destroy', $client) }}" method="POST" class="inline" 
                                          onsubmit="return confirm('Tem certeza que deseja excluir este cliente?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">
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
            @if($clients->hasPages())
                <div class="mt-6 flex items-center justify-between">
                    <div class="pagination-info">
                        Mostrando {{ $clients->firstItem() }} a {{ $clients->lastItem() }} de {{ $clients->total() }} resultados
                    </div>
                    <div class="flex space-x-2">
                        {{ $clients->links() }}
                    </div>
                </div>
            @endif
        @else
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Nenhum cliente encontrado</h3>
                <p class="text-gray-500 mb-6">Comece criando seu primeiro cliente.</p>
                <a href="{{ route('dashboard.clients.create') }}" class="btn-primary">
                    <i class="fas fa-plus mr-2"></i>
                    Criar Primeiro Cliente
                </a>
            </div>
        @endif
    </div>
@endsection