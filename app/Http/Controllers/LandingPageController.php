<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicPageConfig;
use App\Models\Client;
use App\Models\Service;
use App\Models\Product;
use App\Models\News;

class LandingPageController extends Controller
{
    public function index()
    {
        // Buscar configurações da página pública
        $heroConfig = PublicPageConfig::getSectionConfigs('hero');
        $footerConfig = PublicPageConfig::getSectionConfigs('footer');
        $navigationConfig = PublicPageConfig::getSectionConfigs('navigation');
        
        // Seções dinâmicas
        $clientsConfig = PublicPageConfig::getSectionConfigs('clients');
        $servicesConfig = PublicPageConfig::getSectionConfigs('services');
        $productsConfig = PublicPageConfig::getSectionConfigs('products');
        $newsConfig = PublicPageConfig::getSectionConfigs('news');
        
        // Buscar dados das seções dinâmicas (sempre visíveis)
        $clientsCount = $clientsConfig['count'] ?? 6;
        $clients = Client::where('status', 'active')->limit($clientsCount)->get();
        
        $servicesCount = $servicesConfig['count'] ?? 6;
        $services = Service::where('status', 'active')->limit($servicesCount)->get();
        
        $productsCount = $productsConfig['count'] ?? 6;
        $products = Product::where('status', 'active')->limit($productsCount)->get();
        
        $newsCount = $newsConfig['count'] ?? 6;
        $news = News::where('status', 'published')->latest()->limit($newsCount)->get();

        return view('public-page.index', compact(
            'heroConfig',
            'footerConfig',
            'navigationConfig',
            'clientsConfig',
            'servicesConfig', 
            'productsConfig',
            'newsConfig',
            'clients',
            'services',
            'products',
            'news'
        ));
    }

    public function showNews(News $news)
    {
        // Buscar configurações da página pública
        $footerConfig = PublicPageConfig::getSectionConfigs('footer');
        $navigationConfig = PublicPageConfig::getSectionConfigs('navigation');
        
        // Buscar notícias relacionadas
        $relatedNews = News::where('status', 'published')
            ->where('id', '!=', $news->id)
            ->latest()
            ->limit(3)
            ->get();

        return view('public-page.news.show', compact('news', 'relatedNews', 'footerConfig', 'navigationConfig'));
    }

    public function showService(Service $service)
    {
        // Buscar configurações da página pública
        $footerConfig = PublicPageConfig::getSectionConfigs('footer');
        $navigationConfig = PublicPageConfig::getSectionConfigs('navigation');
        
        // Buscar serviços relacionados
        $relatedServices = Service::where('status', 'active')
            ->where('id', '!=', $service->id)
            ->latest()
            ->limit(3)
            ->get();

        return view('public-page.services.show', compact('service', 'relatedServices', 'footerConfig', 'navigationConfig'));
    }

    public function showProduct(Product $product)
    {
        // Buscar configurações da página pública
        $footerConfig = PublicPageConfig::getSectionConfigs('footer');
        $navigationConfig = PublicPageConfig::getSectionConfigs('navigation');
        
        // Buscar produtos relacionados
        $relatedProducts = Product::where('status', 'active')
            ->where('id', '!=', $product->id)
            ->latest()
            ->limit(3)
            ->get();

        return view('public-page.products.show', compact('product', 'relatedProducts', 'footerConfig', 'navigationConfig'));
    }

    /**
     * Display all clients page.
     */
    public function clients()
    {
        // Buscar configurações da página pública
        $footerConfig = PublicPageConfig::getSectionConfigs('footer');
        $navigationConfig = PublicPageConfig::getSectionConfigs('navigation');
        $clientsConfig = PublicPageConfig::getSectionConfigs('clients');
        
        // Buscar todos os clientes ativos
        $clients = Client::where('status', 'active')
            ->latest()
            ->paginate(12);

        return view('public-page.clients.index', compact('clients', 'footerConfig', 'navigationConfig', 'clientsConfig'));
    }

    /**
     * Display all services page.
     */
    public function services()
    {
        // Buscar configurações da página pública
        $footerConfig = PublicPageConfig::getSectionConfigs('footer');
        $navigationConfig = PublicPageConfig::getSectionConfigs('navigation');
        $servicesConfig = PublicPageConfig::getSectionConfigs('services');
        
        // Buscar todos os serviços ativos
        $services = Service::where('status', 'active')
            ->latest()
            ->paginate(12);

        return view('public-page.services.index', compact('services', 'footerConfig', 'navigationConfig', 'servicesConfig'));
    }

    /**
     * Display all products page.
     */
    public function products()
    {
        // Buscar configurações da página pública
        $footerConfig = PublicPageConfig::getSectionConfigs('footer');
        $navigationConfig = PublicPageConfig::getSectionConfigs('navigation');
        $productsConfig = PublicPageConfig::getSectionConfigs('products');
        
        // Buscar todos os produtos ativos
        $products = Product::where('status', 'active')
            ->latest()
            ->paginate(12);

        return view('public-page.products.index', compact('products', 'footerConfig', 'navigationConfig', 'productsConfig'));
    }

    /**
     * Display all news page.
     */
    public function news()
    {
        // Buscar configurações da página pública
        $footerConfig = PublicPageConfig::getSectionConfigs('footer');
        $navigationConfig = PublicPageConfig::getSectionConfigs('navigation');
        $newsConfig = PublicPageConfig::getSectionConfigs('news');
        
        // Buscar todas as notícias ativas
        $news = News::where('status', 'published')
            ->latest()
            ->paginate(12);

        return view('public-page.news.index', compact('news', 'footerConfig', 'navigationConfig', 'newsConfig'));
    }
}