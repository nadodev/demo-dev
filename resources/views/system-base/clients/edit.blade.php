@extends('layouts.admin')

@section('title', 'Editar Cliente')
@section('page-title', 'Editar Cliente')

@section('top-actions')
    <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
        <a href="{{ route('dashboard.clients.show', $client) }}" class="btn-outline">
            <i class="fas fa-eye mr-2"></i>
            <span class="hidden sm:inline">Visualizar</span>
        </a>
        <a href="{{ route('dashboard.clients.index') }}" class="btn-outline">
            <i class="fas fa-arrow-left mr-2"></i>
            <span class="hidden sm:inline">Voltar</span>
        </a>
    </div>
@endsection

@section('content')
    <!-- Form -->
    <div class="card animate-slide-up">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-user-edit text-blue-500 mr-3"></i>
                Editar Cliente: {{ $client->name }}
            </h3>
        </div>
        
        <form method="POST" action="{{ route('dashboard.clients.update', $client) }}" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                <!-- Name -->
                <div class="lg:col-span-2 form-group">
                    <label for="name" class="form-label">
                        <i class="fas fa-user text-blue-500 mr-2"></i>
                        Nome Completo *
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', $client->name) }}"
                           class="form-input @error('name') border-red-500 @enderror"
                           placeholder="Digite o nome completo"
                           required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope text-blue-500 mr-2"></i>
                        Email *
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email', $client->email) }}"
                           class="form-input @error('email') border-red-500 @enderror"
                           placeholder="Digite o email"
                           required>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="phone" class="form-label">
                        <i class="fas fa-phone text-blue-500 mr-2"></i>
                        Telefone
                    </label>
                    <input type="text" 
                           id="phone" 
                           name="phone" 
                           value="{{ old('phone', $client->phone) }}"
                           class="form-input @error('phone') border-red-500 @enderror"
                           placeholder="Digite o telefone">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Company -->
                <div class="form-group">
                    <label for="company" class="form-label">
                        <i class="fas fa-building text-blue-500 mr-2"></i>
                        Empresa
                    </label>
                    <input type="text" 
                           id="company" 
                           name="company" 
                           value="{{ old('company', $client->company) }}"
                           class="form-input @error('company') border-red-500 @enderror"
                           placeholder="Digite o nome da empresa">
                    @error('company')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label for="address" class="form-label">
                        <i class="fas fa-map-marker-alt text-blue-500 mr-2"></i>
                        Endereço
                    </label>
                    <input type="text" 
                           id="address" 
                           name="address" 
                           value="{{ old('address', $client->address) }}"
                           class="form-input @error('address') border-red-500 @enderror"
                           placeholder="Digite o endereço">
                    @error('address')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status" class="form-label">
                        <i class="fas fa-toggle-on text-blue-500 mr-2"></i>
                        Status
                    </label>
                    <select id="status" 
                            name="status"
                            class="form-select @error('status') border-red-500 @enderror">
                        <option value="active" {{ old('status', $client->status) == 'active' ? 'selected' : '' }}>Ativo</option>
                        <option value="inactive" {{ old('status', $client->status) == 'inactive' ? 'selected' : '' }}>Inativo</option>
                        <option value="pending" {{ old('status', $client->status) == 'pending' ? 'selected' : '' }}>Pendente</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div class="lg:col-span-2 form-group">
                    <label for="notes" class="form-label">
                        <i class="fas fa-sticky-note text-blue-500 mr-2"></i>
                        Observações
                    </label>
                    <textarea id="notes" 
                              name="notes" 
                              rows="4"
                              class="form-textarea @error('notes') border-red-500 @enderror"
                              placeholder="Digite observações sobre o cliente">{{ old('notes', $client->notes) }}</textarea>
                    @error('notes')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end space-y-2 sm:space-y-0 sm:space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('dashboard.clients.index') }}" class="btn-outline order-2 sm:order-1">
                    <i class="fas fa-times mr-2"></i>
                    Cancelar
                </a>
                <button type="submit" class="btn-primary order-1 sm:order-2">
                    <i class="fas fa-save mr-2"></i>
                    Salvar Alterações
                </button>
            </div>
        </form>
    </div>
@endsection