@extends('layouts.admin')

@section('title', 'Detalhes do Serviço')
@section('page-title', 'Detalhes do Serviço')

@section('top-actions')
    <div class="flex flex-col sm:flex-row gap-3">
        <a href="{{ route('dashboard.services.edit', $service) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-300">
            <i class="fas fa-edit mr-2"></i>
            Editar
        </a>
        <a href="{{ route('dashboard.services.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 transition-colors duration-300">
            <i class="fas fa-arrow-left mr-2"></i>
            Voltar
        </a>
    </div>
@endsection

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Informações Principais -->
        <div class="lg:col-span-2">
            <div class="bg-white shadow-lg rounded-xl">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Informações do Serviço</h3>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                            @if($service->status == 'active') bg-green-100 text-green-800
                            @elseif($service->status == 'inactive') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800
                            @endif">
                            @if($service->status == 'active') Ativo
                            @elseif($service->status == 'inactive') Inativo
                            @else Rascunho
                            @endif
                        </span>
                    </div>
                </div>

                <div class="p-6 space-y-6">
                    <!-- Nome -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nome do Serviço</label>
                        <p class="text-lg font-semibold text-gray-900">{{ $service->name }}</p>
                    </div>

                    <!-- Descrição -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Descrição</label>
                        <p class="text-gray-900 whitespace-pre-line">{{ $service->description }}</p>
                    </div>

                    <!-- Preço e Categoria -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Preço</label>
                            <p class="text-2xl font-bold text-green-600">R$ {{ number_format($service->price, 2, ',', '.') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Categoria</label>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                {{ ucfirst($service->category) }}
                            </span>
                        </div>
                    </div>

                    <!-- Duração -->
                    @if($service->duration)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Duração Estimada</label>
                        <p class="text-gray-900">{{ $service->duration }}</p>
                    </div>
                    @endif

                    <!-- Datas -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-200">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Criado em</label>
                            <p class="text-gray-900">{{ $service->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Última atualização</label>
                            <p class="text-gray-900">{{ $service->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Imagem do Serviço -->
            <div class="bg-white shadow-lg rounded-xl">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Imagem do Serviço</h3>
                </div>
                <div class="p-6">
                    @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" 
                             alt="{{ $service->name }}" 
                             class="w-full h-48 object-cover rounded-lg">
                    @else
                        <div class="w-full h-48 bg-gray-100 rounded-lg flex items-center justify-center">
                            <div class="text-center">
                                <i class="fas fa-image text-gray-400 text-4xl mb-2"></i>
                                <p class="text-gray-500">Nenhuma imagem</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Ações Rápidas -->
            <div class="bg-white shadow-lg rounded-xl">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Ações Rápidas</h3>
                </div>
                <div class="p-6 space-y-3">
                    <a href="{{ route('dashboard.services.edit', $service) }}" 
                       class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        <i class="fas fa-edit mr-2"></i>
                        Editar Serviço
                    </a>
                    
                    <form action="{{ route('dashboard.services.destroy', $service) }}" method="POST" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Tem certeza que deseja excluir este serviço? Esta ação não pode ser desfeita.')"
                                class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors duration-200">
                            <i class="fas fa-trash mr-2"></i>
                            Excluir Serviço
                        </button>
                    </form>
                </div>
            </div>

            <!-- Estatísticas -->
            <div class="bg-white shadow-lg rounded-xl">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Estatísticas</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-600">Visualizações</span>
                        <span class="text-sm font-semibold text-gray-900">0</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-600">Contratos</span>
                        <span class="text-sm font-semibold text-gray-900">0</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-600">Avaliações</span>
                        <span class="text-sm font-semibold text-gray-900">0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
