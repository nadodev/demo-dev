@extends('layouts.admin')

@section('title', 'Usuários')
@section('page-title', 'Gerenciar Usuários')

@section('top-actions')
    <a href="{{ route('dashboard.users.create') }}" class="btn-primary">
        <i class="fas fa-plus mr-2"></i>
        Novo Usuário
    </a>
@endsection

@section('content')
<div class="space-y-6">

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Users -->
        <div class="card animate-slide-up">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Total de Usuários</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $users->total() }}</p>
                </div>
            </div>
        </div>

        <!-- Admin Users -->
        <div class="card animate-slide-up" style="animation-delay: 0.1s;">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-user-shield text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Administradores</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $users->where('role', 'admin')->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Active Users -->
        <div class="card animate-slide-up" style="animation-delay: 0.2s;">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-user text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Usuários Ativos</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $users->where('is_active', true)->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Inactive Users -->
        <div class="card animate-slide-up" style="animation-delay: 0.3s;">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-user-times text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Usuários Inativos</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $users->where('is_active', false)->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-users text-purple-500 mr-3"></i>
                Lista de Usuários
            </h3>
        </div>

        @if($users->count() > 0)
            <div class="overflow-x-auto">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Função</th>
                            <th>Status</th>
                            <th>Criado em</th>
                            <th class="text-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="animate-fade-in">
                            <td>
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">{{ $user->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($user->role === 'admin')
                                    <span class="badge-danger">
                                        <i class="fas fa-user-shield mr-1"></i>
                                        Administrador
                                    </span>
                                @else
                                    <span class="badge-info">
                                        <i class="fas fa-user mr-1"></i>
                                        Usuário
                                    </span>
                                @endif
                            </td>
                            <td>
                                @if($user->is_active)
                                    <span class="badge-success">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Ativo
                                    </span>
                                @else
                                    <span class="badge-secondary">
                                        <i class="fas fa-times-circle mr-1"></i>
                                        Inativo
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="text-sm text-gray-900">{{ $user->created_at->format('d/m/Y H:i') }}</div>
                            </td>
                            <td class="text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('dashboard.users.show', $user) }}" 
                                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 hover:text-blue-700 transition-colors duration-200">
                                        <i class="fas fa-eye mr-1"></i>
                                        Ver
                                    </a>
                                    <a href="{{ route('dashboard.users.edit', $user) }}" 
                                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-yellow-600 hover:text-yellow-700 transition-colors duration-200">
                                        <i class="fas fa-edit mr-1"></i>
                                        Editar
                                    </a>
                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('dashboard.users.destroy', $user) }}" method="POST" class="inline" 
                                              onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-600 hover:text-red-700 transition-colors duration-200">
                                                <i class="fas fa-trash mr-1"></i>
                                                Excluir
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($users->hasPages())
                <div class="mt-6 flex items-center justify-between">
                    <div class="pagination-info">
                        Mostrando {{ $users->firstItem() }} a {{ $users->lastItem() }} de {{ $users->total() }} resultados
                    </div>
                    <div class="flex space-x-2">
                        {{ $users->links() }}
                    </div>
                </div>
            @endif
        @else
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Nenhum usuário encontrado</h3>
                <p class="text-gray-500 mb-6">Comece criando seu primeiro usuário.</p>
                <a href="{{ route('dashboard.users.create') }}" class="btn-primary">
                    <i class="fas fa-plus mr-2"></i>
                    Criar Primeiro Usuário
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
