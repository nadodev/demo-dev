@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@push('styles')
<style>
    .chart-container {
        position: relative;
        height: 300px;
    }
    .stat-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    .stat-card-green {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }
    .stat-card-blue {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }
    .stat-card-purple {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    }
    .stat-card-orange {
        background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
    }
    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
</style>
@endpush

@section('content')
    <!-- Welcome Header -->
    <div class="mb-8 animate-fade-in">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
            <div class="mb-6 lg:mb-0">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">
                    Bem-vindo, {{ Auth::user()->name }}! 👋
                </h2>
                <p class="text-gray-600 text-lg">
                    Aqui está um resumo completo do seu sistema
                </p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('dashboard.clients.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                    <i class="fas fa-plus mr-2"></i>
                    Novo Cliente
                </a>
                <a href="{{ route('dashboard.products.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                    <i class="fas fa-plus mr-2"></i>
                    Novo Produto
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Clients -->
        <div class="stat-card rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-medium">Total de Clientes</p>
                    <p class="text-3xl font-bold text-white">{{ $stats['total_clients'] }}</p>
                    <p class="text-white/70 text-sm">{{ $stats['active_clients'] }} ativos</p>
                </div>
                <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Products -->
        <div class="stat-card-green rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-medium">Total de Produtos</p>
                    <p class="text-3xl font-bold text-white">{{ $stats['total_products'] }}</p>
                    <p class="text-white/70 text-sm">{{ $stats['active_products'] }} ativos</p>
                </div>
                <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-box text-white text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Total News -->
        <div class="stat-card-blue rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-medium">Total de Notícias</p>
                    <p class="text-3xl font-bold text-white">{{ $stats['total_news'] }}</p>
                    <p class="text-white/70 text-sm">{{ $stats['published_news'] }} publicadas</p>
                </div>
                <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-newspaper text-white text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Services -->
        <div class="stat-card-purple rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-medium">Total de Serviços</p>
                    <p class="text-3xl font-bold text-white">{{ $stats['total_services'] }}</p>
                    <p class="text-white/70 text-sm">{{ $stats['active_services'] }} ativos</p>
                </div>
                <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-cogs text-white text-2xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Activity Chart -->
        <div class="bg-white rounded-2xl shadow-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 flex items-center">
                    <i class="fas fa-chart-line text-blue-500 mr-3"></i>
                    Atividade dos Últimos 7 Dias
                </h3>
            </div>
            <div class="chart-container">
                <canvas id="activityChart"></canvas>
            </div>
        </div>

        <!-- Client Status Chart -->
        <div class="bg-white rounded-2xl shadow-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 flex items-center">
                    <i class="fas fa-users text-green-500 mr-3"></i>
                    Status dos Clientes
                </h3>
            </div>
            <div class="chart-container">
                <canvas id="clientStatusChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Additional Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Product Categories -->
        <div class="bg-white rounded-2xl shadow-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 flex items-center">
                    <i class="fas fa-tags text-purple-500 mr-3"></i>
                    Categorias de Produtos
                </h3>
            </div>
            <div class="chart-container">
                <canvas id="productCategoriesChart"></canvas>
            </div>
        </div>

        <!-- Product Status -->
        <div class="bg-white rounded-2xl shadow-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 flex items-center">
                    <i class="fas fa-box text-orange-500 mr-3"></i>
                    Status dos Produtos
                </h3>
            </div>
            <div class="chart-container">
                <canvas id="productStatusChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Recent Clients -->
        <div class="bg-white rounded-2xl shadow-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 flex items-center">
                    <i class="fas fa-users text-blue-500 mr-3"></i>
                    Clientes Recentes
                </h3>
                <a href="{{ route('dashboard.clients.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">
                    Ver todos
                </a>
            </div>
            <div class="space-y-4">
                @forelse($recent_clients as $client)
                <div class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-300">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900">{{ $client->name }}</p>
                        <p class="text-sm text-gray-600">{{ $client->email }}</p>
                    </div>
                    <span class="px-3 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                        {{ ucfirst($client->status) }}
                    </span>
                </div>
                @empty
                <p class="text-gray-500 text-center py-4">Nenhum cliente encontrado</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Products -->
        <div class="bg-white rounded-2xl shadow-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 flex items-center">
                    <i class="fas fa-box text-green-500 mr-3"></i>
                    Produtos Recentes
                </h3>
                <a href="{{ route('dashboard.products.index') }}" class="text-green-600 hover:text-green-700 font-medium">
                    Ver todos
                </a>
            </div>
            <div class="space-y-4">
                @forelse($recent_products as $product)
                <div class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-300">
                    <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-box text-white"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900">{{ $product->name }}</p>
                        <p class="text-sm text-gray-600">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                    </div>
                    <span class="px-3 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                        {{ ucfirst($product->status) }}
                    </span>
                </div>
                @empty
                <p class="text-gray-500 text-center py-4">Nenhum produto encontrado</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Recent News and Services -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent News -->
        <div class="bg-white rounded-2xl shadow-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 flex items-center">
                    <i class="fas fa-newspaper text-purple-500 mr-3"></i>
                    Notícias Recentes
                </h3>
                <a href="{{ route('dashboard.news.index') }}" class="text-purple-600 hover:text-purple-700 font-medium">
                    Ver todas
                </a>
            </div>
            <div class="space-y-4">
                @forelse($recent_news as $news)
                <div class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-300">
                    <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-newspaper text-white"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900">{{ Str::limit($news->title, 30) }}</p>
                        <p class="text-sm text-gray-600">{{ $news->category ?? 'Sem categoria' }}</p>
                    </div>
                    <span class="px-3 py-1 text-xs font-medium bg-purple-100 text-purple-800 rounded-full">
                        {{ ucfirst($news->status) }}
                    </span>
                </div>
                @empty
                <p class="text-gray-500 text-center py-4">Nenhuma notícia encontrada</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Services -->
        <div class="bg-white rounded-2xl shadow-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 flex items-center">
                    <i class="fas fa-cogs text-orange-500 mr-3"></i>
                    Serviços Recentes
                </h3>
                <a href="{{ route('dashboard.services.index') }}" class="text-orange-600 hover:text-orange-700 font-medium">
                    Ver todos
                </a>
            </div>
            <div class="space-y-4">
                @forelse($recent_services as $service)
                <div class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-300">
                    <div class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-cogs text-white"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900">{{ Str::limit($service->name, 30) }}</p>
                        <p class="text-sm text-gray-600">{{ $service->category ?? 'Sem categoria' }}</p>
                    </div>
                    <span class="px-3 py-1 text-xs font-medium bg-orange-100 text-orange-800 rounded-full">
                        {{ ucfirst($service->status) }}
                    </span>
                </div>
                @empty
                <p class="text-gray-500 text-center py-4">Nenhum serviço encontrado</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Dados dos gráficos
    const chartData = @json($chartData);
    
    // Gráfico de Atividade
    const activityCtx = document.getElementById('activityChart').getContext('2d');
    new Chart(activityCtx, {
        type: 'line',
        data: {
            labels: chartData.last7Days.map(day => day.date),
            datasets: [
                {
                    label: 'Clientes',
                    data: chartData.last7Days.map(day => day.clients),
                    borderColor: '#3B82F6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4
                },
                {
                    label: 'Produtos',
                    data: chartData.last7Days.map(day => day.products),
                    borderColor: '#10B981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    tension: 0.4
                },
                {
                    label: 'Notícias',
                    data: chartData.last7Days.map(day => day.news),
                    borderColor: '#8B5CF6',
                    backgroundColor: 'rgba(139, 92, 246, 0.1)',
                    tension: 0.4
                },
                {
                    label: 'Serviços',
                    data: chartData.last7Days.map(day => day.services),
                    borderColor: '#F59E0B',
                    backgroundColor: 'rgba(245, 158, 11, 0.1)',
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Gráfico de Status dos Clientes
    const clientStatusCtx = document.getElementById('clientStatusChart').getContext('2d');
    new Chart(clientStatusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Ativos', 'Inativos', 'Pendentes'],
            datasets: [{
                data: [
                    chartData.clientStatus.active,
                    chartData.clientStatus.inactive,
                    chartData.clientStatus.pending
                ],
                backgroundColor: ['#10B981', '#EF4444', '#F59E0B'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });

    // Gráfico de Categorias de Produtos
    const productCategoriesCtx = document.getElementById('productCategoriesChart').getContext('2d');
    const categoryLabels = Object.keys(chartData.productCategories);
    const categoryData = Object.values(chartData.productCategories);
    
    new Chart(productCategoriesCtx, {
        type: 'bar',
        data: {
            labels: categoryLabels,
            datasets: [{
                label: 'Produtos por Categoria',
                data: categoryData,
                backgroundColor: [
                    '#3B82F6', '#10B981', '#8B5CF6', '#F59E0B', '#EF4444'
                ],
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Gráfico de Status dos Produtos
    const productStatusCtx = document.getElementById('productStatusChart').getContext('2d');
    new Chart(productStatusCtx, {
        type: 'pie',
        data: {
            labels: ['Ativos', 'Inativos', 'Rascunho'],
            datasets: [{
                data: [
                    chartData.productStatus.active,
                    chartData.productStatus.inactive,
                    chartData.productStatus.draft
                ],
                backgroundColor: ['#10B981', '#EF4444', '#6B7280'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });
});
</script>
@endpush