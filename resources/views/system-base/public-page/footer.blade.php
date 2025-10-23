@extends('layouts.admin')

@section('title', 'Configurar Rodapé')
@section('page-title', 'Configurar Rodapé')

@section('top-actions')
    <a href="{{ route('dashboard.public-page.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 transition-colors duration-300">
        <i class="fas fa-arrow-left mr-2"></i>
        Voltar
    </a>
@endsection

@section('content')
    <!-- Form -->
    <div class="bg-white shadow-lg rounded-xl animate-slide-up">
        <form method="POST" action="{{ route('dashboard.public-page.footer.update') }}" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Company Name -->
                <div class="md:col-span-2">
                    <label for="company_name" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-building text-blue-500 mr-2"></i>
                        Nome da Empresa *
                    </label>
                    <input type="text" 
                           id="company_name" 
                           name="company_name" 
                           value="{{ \App\Models\PublicPageConfig::getConfig('footer', 'company_name', '') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('company_name') border-red-500 @enderror"
                           placeholder="Nome da sua empresa"
                           required>
                    @error('company_name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-align-left text-blue-500 mr-2"></i>
                        Descrição da Empresa *
                    </label>
                    <textarea id="description" 
                              name="description" 
                              rows="4"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('description') border-red-500 @enderror"
                              placeholder="Descreva sua empresa e seus serviços..."
                              required>{{ \App\Models\PublicPageConfig::getConfig('footer', 'description', '') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Links Title -->
                <div>
                    <label for="links_title" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-link text-blue-500 mr-2"></i>
                        Título dos Links
                    </label>
                    <input type="text" 
                           id="links_title" 
                           name="links_title" 
                           value="{{ \App\Models\PublicPageConfig::getConfig('footer', 'links_title', 'Links Rápidos') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('links_title') border-red-500 @enderror"
                           placeholder="Links Rápidos">
                    @error('links_title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Copyright Text -->
                <div>
                    <label for="copyright_text" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-copyright text-blue-500 mr-2"></i>
                        Texto de Copyright
                    </label>
                    <input type="text" 
                           id="copyright_text" 
                           name="copyright_text" 
                           value="{{ \App\Models\PublicPageConfig::getConfig('footer', 'copyright_text', 'Todos os direitos reservados.') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('copyright_text') border-red-500 @enderror"
                           placeholder="Todos os direitos reservados.">
                    @error('copyright_text')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Social Links -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-4">
                        <i class="fas fa-share-alt text-blue-500 mr-2"></i>
                        Links das Redes Sociais
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="facebook_url" class="block text-sm text-gray-600 mb-2">Facebook</label>
                            <input type="url" 
                                   id="facebook_url" 
                                   name="facebook_url" 
                                   value="{{ \App\Models\PublicPageConfig::getConfig('footer', 'facebook_url', '') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                   placeholder="https://facebook.com/suaempresa">
                        </div>
                        <div>
                            <label for="twitter_url" class="block text-sm text-gray-600 mb-2">Twitter</label>
                            <input type="url" 
                                   id="twitter_url" 
                                   name="twitter_url" 
                                   value="{{ \App\Models\PublicPageConfig::getConfig('footer', 'twitter_url', '') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                   placeholder="https://twitter.com/suaempresa">
                        </div>
                        <div>
                            <label for="instagram_url" class="block text-sm text-gray-600 mb-2">Instagram</label>
                            <input type="url" 
                                   id="instagram_url" 
                                   name="instagram_url" 
                                   value="{{ \App\Models\PublicPageConfig::getConfig('footer', 'instagram_url', '') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                   placeholder="https://instagram.com/suaempresa">
                        </div>
                        <div>
                            <label for="linkedin_url" class="block text-sm text-gray-600 mb-2">LinkedIn</label>
                            <input type="url" 
                                   id="linkedin_url" 
                                   name="linkedin_url" 
                                   value="{{ \App\Models\PublicPageConfig::getConfig('footer', 'linkedin_url', '') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                   placeholder="https://linkedin.com/company/suaempresa">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex flex-col sm:flex-row gap-3 mt-8 pt-6 border-t border-gray-200">
                <button type="submit" 
                        class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-save mr-2"></i>
                    Salvar Configurações
                </button>
                <a href="{{ route('dashboard.public-page.index') }}" 
                   class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-300">
                    <i class="fas fa-times mr-2"></i>
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
