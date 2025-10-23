@extends('layouts.admin')

@section('title', 'Visualizar Cliente')
@section('page-title', 'Visualizar Cliente')

@section('top-actions')
    <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
        <a href="{{ route('dashboard.clients.edit', $client) }}" class="btn-primary">
            <i class="fas fa-edit mr-2"></i>
            <span class="hidden sm:inline">Editar</span>
        </a>
        <a href="{{ route('dashboard.clients.index') }}" class="btn-outline">
            <i class="fas fa-arrow-left mr-2"></i>
            <span class="hidden sm:inline">Voltar</span>
        </a>
    </div>
@endsection

@section('content')
    <!-- Client Details -->
    <div class="card animate-slide-up">
        <!-- Header -->
        <div class="card-header">
            <div class="flex items-center">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center mr-4">
                    <span class="text-white font-bold text-xl">{{ substr($client->name, 0, 1) }}</span>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ $client->name }}</h1>
                    <p class="text-gray-600">{{ $client->email }}</p>
                    @if($client->company)
                        <p class="text-sm text-gray-500">{{ $client->company }}</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Client Information -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Basic Information -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                    <i class="fas fa-user text-blue-500 mr-2"></i>
                    Informações Básicas
                </h3>
                
                <div class="space-y-3">
                    <div class="flex items-center p-3 bg-gray-50 rounded-xl">
                        <i class="fas fa-envelope text-gray-400 mr-3"></i>
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-medium text-gray-900">{{ $client->email }}</p>
                        </div>
                    </div>
                    
                    @if($client->phone)
                    <div class="flex items-center p-3 bg-gray-50 rounded-xl">
                        <i class="fas fa-phone text-gray-400 mr-3"></i>
                        <div>
                            <p class="text-sm text-gray-500">Telefone</p>
                            <p class="font-medium text-gray-900">{{ $client->phone }}</p>
                        </div>
                    </div>
                    @endif
                    
                    @if($client->company)
                    <div class="flex items-center p-3 bg-gray-50 rounded-xl">
                        <i class="fas fa-building text-gray-400 mr-3"></i>
                        <div>
                            <p class="text-sm text-gray-500">Empresa</p>
                            <p class="font-medium text-gray-900">{{ $client->company }}</p>
                        </div>
                    </div>
                    @endif
                    
                    @if($client->address)
                    <div class="flex items-center p-3 bg-gray-50 rounded-xl">
                        <i class="fas fa-map-marker-alt text-gray-400 mr-3"></i>
                        <div>
                            <p class="text-sm text-gray-500">Endereço</p>
                            <p class="font-medium text-gray-900">{{ $client->address }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Status and Dates -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                    <i class="fas fa-info-circle text-green-500 mr-2"></i>
                    Status e Datas
                </h3>
                
                <div class="space-y-3">
                    <div class="flex items-center p-3 bg-gray-50 rounded-xl">
                        <i class="fas fa-toggle-on text-gray-400 mr-3"></i>
                        <div>
                            <p class="text-sm text-gray-500">Status</p>
                            <div class="mt-1">
                                @if($client->status === 'active')
                                    <span class="badge-success">Ativo</span>
                                @elseif($client->status === 'inactive')
                                    <span class="badge-danger">Inativo</span>
                                @else
                                    <span class="badge-warning">Pendente</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center p-3 bg-gray-50 rounded-xl">
                        <i class="fas fa-calendar-plus text-gray-400 mr-3"></i>
                        <div>
                            <p class="text-sm text-gray-500">Criado em</p>
                            <p class="font-medium text-gray-900">{{ $client->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center p-3 bg-gray-50 rounded-xl">
                        <i class="fas fa-calendar-edit text-gray-400 mr-3"></i>
                        <div>
                            <p class="text-sm text-gray-500">Última atualização</p>
                            <p class="font-medium text-gray-900">{{ $client->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notes -->
        @if($client->notes)
        <div class="mt-6">
            <h3 class="text-lg font-semibold text-gray-900 flex items-center mb-3">
                <i class="fas fa-sticky-note text-yellow-500 mr-2"></i>
                Observações
            </h3>
            <div class="p-4 bg-yellow-50 rounded-xl border-l-4 border-yellow-400">
                <p class="text-gray-700">{{ $client->notes }}</p>
            </div>
        </div>
        @endif

        <!-- Actions -->
        <div class="flex items-center justify-between pt-6 border-t border-gray-200 mt-6">
            <div class="flex space-x-3">
                <a href="{{ route('dashboard.clients.edit', $client) }}" class="btn-primary">
                    <i class="fas fa-edit mr-2"></i>
                    Editar Cliente
                </a>
                <form action="{{ route('dashboard.clients.destroy', $client) }}" method="POST" class="inline" 
                      onsubmit="return confirm('Tem certeza que deseja excluir este cliente?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger">
                        <i class="fas fa-trash mr-2"></i>
                        Excluir Cliente
                    </button>
                </form>
            </div>
            <a href="{{ route('dashboard.clients.index') }}" class="btn-outline">
                <i class="fas fa-arrow-left mr-2"></i>
                Voltar para Lista
            </a>
        </div>
    </div>
@endsection