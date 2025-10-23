@extends('layouts.admin')

@section('title', 'Novo Produto')
@section('page-title', 'Novo Produto')

@section('top-actions')
    <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
        <a href="{{ route('dashboard.products.index') }}" class="btn-outline">
            <i class="fas fa-arrow-left mr-2"></i>
            <span class="hidden sm:inline">Voltar</span>
        </a>
    </div>
@endsection

@section('content')
    <div class="card animate-slide-up">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-plus text-green-500 mr-3"></i>
                Criar Novo Produto
            </h3>
        </div>

        <form action="{{ route('dashboard.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                <!-- Nome do Produto -->
                <div class="lg:col-span-2 form-group">
                    <label for="name" class="form-label">
                        <i class="fas fa-box text-green-500 mr-2"></i>
                        Nome do Produto *
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name') }}"
                           class="form-input @error('name') border-red-500 @enderror"
                           placeholder="Digite o nome do produto"
                           required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Preço -->
                <div class="form-group">
                    <label for="price" class="form-label">
                        <i class="fas fa-dollar-sign text-green-500 mr-2"></i>
                        Preço *
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">R$</span>
                        <input type="number" 
                               id="price" 
                               name="price" 
                               value="{{ old('price') }}"
                               step="0.01"
                               min="0"
                               class="form-input pl-12 @error('price') border-red-500 @enderror"
                               placeholder="0,00"
                               required>
                    </div>
                    @error('price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Categoria -->
                <div class="form-group">
                    <label for="category" class="form-label">
                        <i class="fas fa-tags text-green-500 mr-2"></i>
                        Categoria
                    </label>
                    <select id="category" 
                            name="category"
                            class="form-select @error('category') border-red-500 @enderror">
                        <option value="">Selecione uma categoria</option>
                        <option value="eletronicos" {{ old('category') == 'eletronicos' ? 'selected' : '' }}>Eletrônicos</option>
                        <option value="roupas" {{ old('category') == 'roupas' ? 'selected' : '' }}>Roupas</option>
                        <option value="casa" {{ old('category') == 'casa' ? 'selected' : '' }}>Casa e Jardim</option>
                        <option value="esportes" {{ old('category') == 'esportes' ? 'selected' : '' }}>Esportes</option>
                        <option value="livros" {{ old('category') == 'livros' ? 'selected' : '' }}>Livros</option>
                        <option value="outros" {{ old('category') == 'outros' ? 'selected' : '' }}>Outros</option>
                    </select>
                    @error('category')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status" class="form-label">
                        <i class="fas fa-toggle-on text-green-500 mr-2"></i>
                        Status
                    </label>
                    <select id="status" 
                            name="status"
                            class="form-select @error('status') border-red-500 @enderror">
                        <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Ativo</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inativo</option>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Rascunho</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Estoque -->
                <div class="form-group">
                    <label for="stock" class="form-label">
                        <i class="fas fa-warehouse text-green-500 mr-2"></i>
                        Estoque
                    </label>
                    <input type="number" 
                           id="stock" 
                           name="stock" 
                           value="{{ old('stock', 0) }}"
                           min="0"
                           class="form-input @error('stock') border-red-500 @enderror"
                           placeholder="Quantidade em estoque">
                    @error('stock')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Descrição -->
                <div class="lg:col-span-2 form-group">
                    <label for="description" class="form-label">
                        <i class="fas fa-align-left text-green-500 mr-2"></i>
                        Descrição *
                    </label>
                    <textarea id="description" 
                              name="description" 
                              rows="4"
                              class="form-textarea @error('description') border-red-500 @enderror"
                              placeholder="Descreva o produto"
                              required>{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Imagem -->
                <div class="lg:col-span-2 form-group">
                    <label for="image" class="form-label">
                        <i class="fas fa-image text-green-500 mr-2"></i>
                        Imagem do Produto
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-gray-400 transition-colors duration-200">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span>Upload de arquivo</span>
                                    <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                                </label>
                                <p class="pl-1">ou arraste e solte</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF até 10MB</p>
                        </div>
                    </div>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end space-y-2 sm:space-y-0 sm:space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('dashboard.products.index') }}" class="btn-outline order-2 sm:order-1">
                    <i class="fas fa-times mr-2"></i>
                    Cancelar
                </a>
                <button type="submit" class="btn-success order-1 sm:order-2">
                    <i class="fas fa-save mr-2"></i>
                    Salvar Produto
                </button>
            </div>
        </form>
    </div>
@endsection