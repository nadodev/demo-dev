@extends('layouts.admin')

@section('title', 'Serviços')
@section('page-title', 'Serviços')

@section('top-actions')
    <a href="{{ route('dashboard.services.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-300">
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
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
        <!-- Total Services -->
        <div class="bg-white overflow-hidden shadow-lg rounded-xl hover:shadow-xl transition-shadow duration-300 animate-slide-up">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-cogs text-white text-lg sm:text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-3 sm:ml-4">
                        <p class="text-xs sm:text-sm font-medium text-gray-500">Total de Serviços</p>
                        <p class="text-xl sm:text-2xl font-semibold text-gray-900">{{ $services->total() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Services -->
        <div class="bg-white overflow-hidden shadow-lg rounded-xl hover:shadow-xl transition-shadow duration-300 animate-slide-up" style="animation-delay: 0.1s;">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-check-circle text-white text-lg sm:text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-3 sm:ml-4">
                        <p class="text-xs sm:text-sm font-medium text-gray-500">Ativos</p>
                        <p class="text-xl sm:text-2xl font-semibold text-gray-900">{{ $services->where('status', 'active')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inactive Services -->
        <div class="bg-white overflow-hidden shadow-lg rounded-xl hover:shadow-xl transition-shadow duration-300 animate-slide-up" style="animation-delay: 0.2s;">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-red-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-pause-circle text-white text-lg sm:text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-3 sm:ml-4">
                        <p class="text-xs sm:text-sm font-medium text-gray-500">Inativos</p>
                        <p class="text-xl sm:text-2xl font-semibold text-gray-900">{{ $services->where('status', 'inactive')->count() }}</p>
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
                        <p class="text-xs sm:text-sm font-medium text-gray-500">Novos Este Mês</p>
                        <p class="text-xl sm:text-2xl font-semibold text-gray-900">{{ $services->where('created_at', '>=', now()->startOfMonth())->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        @forelse($services as $service)
            <div class="bg-white shadow-lg rounded-xl hover:shadow-xl transition-all duration-300 transform hover:scale-105 animate-slide-up">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $service->name }}</h3>
                            <p class="text-sm text-gray-600 mb-3">{{ Str::limit($service->short_description ?? $service->description, 100) }}</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-medium rounded-full {{ $service->getStatusBadgeClassAttribute() }}">
                            {{ ucfirst($service->status) }}
                        </span>
                    </div>
                    
                    <div class="mb-4">
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-2">
                            <span>{{ $service->created_at->format('d/m/Y') }}</span>
                            <span class="font-semibold text-lg text-green-600">{{ $service->formatted_price }}</span>
                        </div>
                        @if($service->features && is_array($service->features) && count($service->features) > 0)
                            <div class="text-xs text-gray-500">
                                {{ count($service->features) }} características
                            </div>
                        @endif
                    </div>
                    
                    <div class="flex space-x-2">
                        <a href="{{ route('dashboard.services.show', $service) }}" class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-blue-50 text-blue-600 font-medium rounded-lg hover:bg-blue-100 transition-colors duration-300">
                            <i class="fas fa-eye mr-2"></i>
                            Ver
                        </a>
                        <a href="{{ route('dashboard.services.edit', $service) }}" class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-gray-50 text-gray-600 font-medium rounded-lg hover:bg-gray-100 transition-colors duration-300">
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
                        <i class="fas fa-cogs text-gray-400 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Nenhum serviço encontrado</h3>
                    <p class="text-gray-600 mb-6">Comece criando seu primeiro serviço.</p>
                    <a href="{{ route('dashboard.services.create') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-300">
                        <i class="fas fa-plus mr-2"></i>
                        Criar Serviço
                    </a>
                </div>
            </div>
        @endforelse
    </div>
    
    @if($services->hasPages())
        <div class="mt-8">
            {{ $services->links() }}
        </div>
    @endif
@endsection