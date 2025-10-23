<?php

namespace App\Http\Controllers;

use App\Models\PublicPageConfig;
use Illuminate\Http\Request;

class PublicPageController extends Controller
{
    /**
     * Display the public page configuration dashboard.
     */
    public function index()
    {
        return view('system-base.public-page.index');
    }

    /**
     * Update all public page configurations.
     */
    public function update(Request $request)
    {
        $request->validate([
            'hero_show' => 'boolean',
            'hero_icon' => 'string|max:255',
            'hero_title' => 'string|max:255',
            'hero_description' => 'string|max:1000',
            'clients_show' => 'boolean',
            'clients_icon' => 'string|max:255',
            'clients_title' => 'string|max:255',
            'clients_description' => 'string|max:1000',
            'clients_count' => 'integer|min:1|max:20',
            'services_show' => 'boolean',
            'services_icon' => 'string|max:255',
            'services_title' => 'string|max:255',
            'services_description' => 'string|max:1000',
            'services_count' => 'integer|min:1|max:20',
            'products_show' => 'boolean',
            'products_icon' => 'string|max:255',
            'products_title' => 'string|max:255',
            'products_description' => 'string|max:1000',
            'products_count' => 'integer|min:1|max:20',
            'news_show' => 'boolean',
            'news_icon' => 'string|max:255',
            'news_title' => 'string|max:255',
            'news_description' => 'string|max:1000',
            'news_count' => 'integer|min:1|max:20',
        ]);

        try {
            // Hero Section
            PublicPageConfig::setConfig('hero', 'show', $request->has('hero_show'));
            PublicPageConfig::setConfig('hero', 'icon', $request->input('hero_icon', 'fas fa-rocket'));
            PublicPageConfig::setConfig('hero', 'title', $request->input('hero_title', 'Sistema de Gestão Completo'));
            PublicPageConfig::setConfig('hero', 'description', $request->input('hero_description', 'Transforme sua empresa com nossa solução completa'));

            // Clients Section
            PublicPageConfig::setConfig('clients', 'show', $request->has('clients_show'));
            PublicPageConfig::setConfig('clients', 'icon', $request->input('clients_icon', 'fas fa-users'));
            PublicPageConfig::setConfig('clients', 'title', $request->input('clients_title', 'Nossos Clientes'));
            PublicPageConfig::setConfig('clients', 'description', $request->input('clients_description', 'Conheça algumas das empresas que confiam em nossos serviços'));
            PublicPageConfig::setConfig('clients', 'count', $request->input('clients_count', 6));

            // Services Section
            PublicPageConfig::setConfig('services', 'show', $request->has('services_show'));
            PublicPageConfig::setConfig('services', 'icon', $request->input('services_icon', 'fas fa-cogs'));
            PublicPageConfig::setConfig('services', 'title', $request->input('services_title', 'Nossos Serviços'));
            PublicPageConfig::setConfig('services', 'description', $request->input('services_description', 'Oferecemos soluções completas para impulsionar seu negócio'));
            PublicPageConfig::setConfig('services', 'count', $request->input('services_count', 6));

            // Products Section
            PublicPageConfig::setConfig('products', 'show', $request->has('products_show'));
            PublicPageConfig::setConfig('products', 'icon', $request->input('products_icon', 'fas fa-box'));
            PublicPageConfig::setConfig('products', 'title', $request->input('products_title', 'Nossos Produtos'));
            PublicPageConfig::setConfig('products', 'description', $request->input('products_description', 'Descubra nossa linha completa de produtos de qualidade'));
            PublicPageConfig::setConfig('products', 'count', $request->input('products_count', 6));

            // News Section
            PublicPageConfig::setConfig('news', 'show', $request->has('news_show'));
            PublicPageConfig::setConfig('news', 'icon', $request->input('news_icon', 'fas fa-newspaper'));
            PublicPageConfig::setConfig('news', 'title', $request->input('news_title', 'Últimas Notícias'));
            PublicPageConfig::setConfig('news', 'description', $request->input('news_description', 'Fique por dentro das novidades e atualizações'));
            PublicPageConfig::setConfig('news', 'count', $request->input('news_count', 6));

            return redirect()->route('dashboard.public-page.index')
                ->with('success', 'Configurações da página pública atualizadas com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao salvar as configurações: ' . $e->getMessage());
        }
    }

    /**
     * Show the hero configuration form.
     */
    public function hero()
    {
        $heroConfig = [
            'badge_text' => PublicPageConfig::getConfig('hero', 'badge_text', 'Novo! Lançamento 2024'),
            'badge_color' => PublicPageConfig::getConfig('hero', 'badge_color', 'blue'),
            'title' => PublicPageConfig::getConfig('hero', 'title', 'Transforme sua empresa com nossa solução'),
            'title_color' => PublicPageConfig::getConfig('hero', 'title_color', 'gray-900'),
            'subtitle' => PublicPageConfig::getConfig('hero', 'subtitle', 'A solução completa para gerenciar seus clientes, produtos e vendas de forma eficiente e profissional.'),
            'primary_button_text' => PublicPageConfig::getConfig('hero', 'primary_button_text', 'Começar Agora'),
            'primary_button_url' => PublicPageConfig::getConfig('hero', 'primary_button_url', '/login'),
            'secondary_button_text' => PublicPageConfig::getConfig('hero', 'secondary_button_text', 'Saiba Mais'),
            'secondary_button_url' => PublicPageConfig::getConfig('hero', 'secondary_button_url', '/about'),
            'stat1_number' => PublicPageConfig::getConfig('hero', 'stat1_number', '10,000+'),
            'stat1_label' => PublicPageConfig::getConfig('hero', 'stat1_label', 'Clientes Ativos'),
            'stat1_icon' => PublicPageConfig::getConfig('hero', 'stat1_icon', 'fas fa-users'),
        ];

        return view('system-base.public-page.hero', compact('heroConfig'));
    }

    /**
     * Update the hero configuration.
     */
    public function updateHero(Request $request)
    {
        $request->validate([
            'badge_text' => 'nullable|string|max:255',
            'badge_color' => 'required|in:blue,green,purple,orange,red',
            'title' => 'required|string|max:255',
            'title_color' => 'required|in:gray-900,blue-600,purple-600,green-600',
            'subtitle' => 'required|string',
            'primary_button_text' => 'required|string|max:255',
            'primary_button_url' => 'required|string|max:255',
            'secondary_button_text' => 'nullable|string|max:255',
            'secondary_button_url' => 'nullable|string|max:255',
            'stat1_number' => 'nullable|string|max:255',
            'stat1_label' => 'nullable|string|max:255',
            'stat1_icon' => 'nullable|string|max:255',
        ]);

        foreach ($request->all() as $key => $value) {
            if ($key !== '_token' && $key !== '_method') {
                PublicPageConfig::setConfig('hero', $key, $value);
            }
        }

        return redirect()->route('dashboard.public-page.hero')
            ->with('success', 'Configurações do Hero atualizadas com sucesso!');
    }

    /**
     * Show the footer configuration form.
     */
    public function footer()
    {
        return view('system-base.public-page.footer');
    }

    /**
     * Update the footer configuration.
     */
    public function updateFooter(Request $request)
    {
        return redirect()->route('dashboard.public-page.footer')
            ->with('success', 'Configurações do Rodapé atualizadas com sucesso!');
    }


    /**
     * Show the clients section configuration form.
     */
    public function clients()
    {
        return view('system-base.public-page.clients');
    }

    /**
     * Update clients section configuration.
     */
    public function updateClients(Request $request)
    {
        $request->validate([
            'show_section' => 'boolean',
            'icon' => 'string|max:255',
            'title' => 'string|max:255',
            'description' => 'string|max:1000',
            'count' => 'integer|min:1|max:20',
        ]);

        try {
            PublicPageConfig::setConfig('clients', 'show', $request->has('show_section'));
            PublicPageConfig::setConfig('clients', 'icon', $request->input('icon', 'fas fa-users'));
            PublicPageConfig::setConfig('clients', 'title', $request->input('title', 'Nossos Clientes'));
            PublicPageConfig::setConfig('clients', 'description', $request->input('description', 'Conheça algumas das empresas que confiam em nossos serviços'));
            PublicPageConfig::setConfig('clients', 'count', $request->input('count', 6));

            return redirect()->route('dashboard.public-page.clients')
                ->with('success', 'Configurações da seção Clientes atualizadas com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao salvar as configurações: ' . $e->getMessage());
        }
    }

    /**
     * Show the services section configuration form.
     */
    public function services()
    {
        return view('system-base.public-page.services');
    }

    /**
     * Update services section configuration.
     */
    public function updateServices(Request $request)
    {
        $request->validate([
            'show_section' => 'boolean',
            'icon' => 'string|max:255',
            'title' => 'string|max:255',
            'description' => 'string|max:1000',
            'count' => 'integer|min:1|max:20',
        ]);

        try {
            PublicPageConfig::setConfig('services', 'show', $request->has('show_section'));
            PublicPageConfig::setConfig('services', 'icon', $request->input('icon', 'fas fa-cogs'));
            PublicPageConfig::setConfig('services', 'title', $request->input('title', 'Nossos Serviços'));
            PublicPageConfig::setConfig('services', 'description', $request->input('description', 'Oferecemos soluções completas para impulsionar seu negócio'));
            PublicPageConfig::setConfig('services', 'count', $request->input('count', 6));

            return redirect()->route('dashboard.public-page.services')
                ->with('success', 'Configurações da seção Serviços atualizadas com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao salvar as configurações: ' . $e->getMessage());
        }
    }

    /**
     * Show the products section configuration form.
     */
    public function products()
    {
        return view('system-base.public-page.products');
    }

    /**
     * Update products section configuration.
     */
    public function updateProducts(Request $request)
    {
        $request->validate([
            'show_section' => 'boolean',
            'icon' => 'string|max:255',
            'title' => 'string|max:255',
            'description' => 'string|max:1000',
            'count' => 'integer|min:1|max:20',
        ]);

        try {
            PublicPageConfig::setConfig('products', 'show', $request->has('show_section'));
            PublicPageConfig::setConfig('products', 'icon', $request->input('icon', 'fas fa-box'));
            PublicPageConfig::setConfig('products', 'title', $request->input('title', 'Nossos Produtos'));
            PublicPageConfig::setConfig('products', 'description', $request->input('description', 'Descubra nossa linha completa de produtos de qualidade'));
            PublicPageConfig::setConfig('products', 'count', $request->input('count', 6));

            return redirect()->route('dashboard.public-page.products')
                ->with('success', 'Configurações da seção Produtos atualizadas com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao salvar as configurações: ' . $e->getMessage());
        }
    }

    /**
     * Show the news section configuration form.
     */
    public function news()
    {
        return view('system-base.public-page.news');
    }

    /**
     * Update news section configuration.
     */
    public function updateNews(Request $request)
    {
        $request->validate([
            'show_section' => 'boolean',
            'icon' => 'string|max:255',
            'title' => 'string|max:255',
            'description' => 'string|max:1000',
            'count' => 'integer|min:1|max:20',
        ]);

        try {
            PublicPageConfig::setConfig('news', 'show', $request->has('show_section'));
            PublicPageConfig::setConfig('news', 'icon', $request->input('icon', 'fas fa-newspaper'));
            PublicPageConfig::setConfig('news', 'title', $request->input('title', 'Últimas Notícias'));
            PublicPageConfig::setConfig('news', 'description', $request->input('description', 'Fique por dentro das novidades e atualizações'));
            PublicPageConfig::setConfig('news', 'count', $request->input('count', 6));

            return redirect()->route('dashboard.public-page.news')
                ->with('success', 'Configurações da seção Notícias atualizadas com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao salvar as configurações: ' . $e->getMessage());
        }
    }
}