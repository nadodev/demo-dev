@extends('layouts.admin')

@section('title', 'Detalhes do Usuário')
@section('page-title', 'Detalhes do Usuário')

@section('top-actions')
<div class="flex space-x-3">
    <a href="{{ route('dashboard.users.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors duration-200">
        <i class="fas fa-arrow-left mr-2"></i>
        Voltar
    </a>
    <a href="{{ route('dashboard.users.edit', $user) }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-sm font-medium rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 transform hover:scale-105">
        <i class="fas fa-edit mr-2"></i>
        Editar
    </a>
</div>
@endsection

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- User Info -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="text-center">
                    <div class="w-24 h-24 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user text-white text-3xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    <div class="mt-4 space-y-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">
                            <i class="fas {{ $user->role === 'admin' ? 'fa-user-shield' : 'fa-user' }} mr-1"></i>
                            {{ ucfirst($user->role) }}
                        </span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $user->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            <i class="fas {{ $user->is_active ? 'fa-check-circle' : 'fa-times-circle' }} mr-1"></i>
                            {{ $user->is_active ? 'Ativo' : 'Inativo' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Details -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informações do Usuário</h3>
                    <p class="text-sm text-gray-500">Detalhes completos do usuário</p>
                </div>
                
                <div class="p-6 space-y-6">
                    <!-- Name -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user text-blue-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Nome Completo</p>
                            <p class="text-lg text-gray-900">{{ $user->name }}</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-envelope text-green-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">E-mail</p>
                            <p class="text-lg text-gray-900">{{ $user->email }}</p>
                        </div>
                    </div>

                    <!-- Role -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-tag text-purple-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Função</p>
                            <p class="text-lg text-gray-900">{{ ucfirst($user->role) }}</p>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-info-circle text-orange-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Status</p>
                            <p class="text-lg text-gray-900">{{ $user->is_active ? 'Ativo' : 'Inativo' }}</p>
                        </div>
                    </div>

                    <!-- Created At -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-calendar text-gray-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Criado em</p>
                            <p class="text-lg text-gray-900">{{ $user->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>

                    <!-- Updated At -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-clock text-gray-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Última atualização</p>
                            <p class="text-lg text-gray-900">{{ $user->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
