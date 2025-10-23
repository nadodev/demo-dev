<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Product;
use App\Models\News;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Estatísticas gerais
        $stats = [
            'total_clients' => Client::count(),
            'active_clients' => Client::where('status', 'active')->count(),
            'total_products' => Product::count(),
            'active_products' => Product::where('status', 'active')->count(),
            'total_news' => News::count(),
            'published_news' => News::where('status', 'published')->count(),
            'total_services' => Service::count(),
            'active_services' => Service::where('status', 'active')->count(),
        ];

        // Dados para gráficos
        $chartData = $this->getChartData();
        
        // Clientes recentes
        $recent_clients = Client::latest()->limit(5)->get();
        
        // Produtos recentes
        $recent_products = Product::latest()->limit(5)->get();
        
        // Notícias recentes
        $recent_news = News::latest()->limit(5)->get();
        
        // Serviços recentes
        $recent_services = Service::latest()->limit(5)->get();

        return view('system-base.dashboard', compact(
            'stats', 
            'chartData', 
            'recent_clients', 
            'recent_products', 
            'recent_news', 
            'recent_services'
        ));
    }

    private function getChartData()
    {
        // Dados dos últimos 7 dias para gráfico de atividades
        $last7Days = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $last7Days[] = [
                'date' => $date->format('d/m'),
                'clients' => Client::whereDate('created_at', $date)->count(),
                'products' => Product::whereDate('created_at', $date)->count(),
                'news' => News::whereDate('created_at', $date)->count(),
                'services' => Service::whereDate('created_at', $date)->count(),
            ];
        }

        // Dados para gráfico de status de clientes
        $clientStatusData = [
            'active' => Client::where('status', 'active')->count(),
            'inactive' => Client::where('status', 'inactive')->count(),
            'pending' => Client::where('status', 'pending')->count(),
        ];

        // Dados para gráfico de categorias de produtos
        $productCategories = Product::select('category', DB::raw('count(*) as total'))
            ->whereNotNull('category')
            ->groupBy('category')
            ->get()
            ->pluck('total', 'category')
            ->toArray();

        // Dados para gráfico de status de produtos
        $productStatusData = [
            'active' => Product::where('status', 'active')->count(),
            'inactive' => Product::where('status', 'inactive')->count(),
            'draft' => Product::where('status', 'draft')->count(),
        ];

        return [
            'last7Days' => $last7Days,
            'clientStatus' => $clientStatusData,
            'productCategories' => $productCategories,
            'productStatus' => $productStatusData,
        ];
    }
}
