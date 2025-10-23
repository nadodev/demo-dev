<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PublicPageConfig;

class PublicPageConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hero Section
        PublicPageConfig::setConfig('hero', 'badge_text', 'Novo! Lançamento 2024');
        PublicPageConfig::setConfig('hero', 'badge_color', 'blue');
        PublicPageConfig::setConfig('hero', 'title', 'Transforme sua empresa com nossa solução');
        PublicPageConfig::setConfig('hero', 'title_color', 'gray-900');
        PublicPageConfig::setConfig('hero', 'subtitle', 'A solução completa para gerenciar seus clientes, produtos e vendas de forma eficiente e profissional.');
        PublicPageConfig::setConfig('hero', 'primary_button_text', 'Começar Agora');
        PublicPageConfig::setConfig('hero', 'primary_button_url', '/login');
        PublicPageConfig::setConfig('hero', 'secondary_button_text', 'Saiba Mais');
        PublicPageConfig::setConfig('hero', 'secondary_button_url', '/about');
        PublicPageConfig::setConfig('hero', 'stat1_number', '10,000+');
        PublicPageConfig::setConfig('hero', 'stat1_label', 'Clientes Ativos');
        PublicPageConfig::setConfig('hero', 'stat1_icon', 'fas fa-users');
        PublicPageConfig::setConfig('hero', 'stat2_number', '50,000+');
        PublicPageConfig::setConfig('hero', 'stat2_label', 'Projetos Criados');
        PublicPageConfig::setConfig('hero', 'stat2_icon', 'fas fa-project-diagram');
        PublicPageConfig::setConfig('hero', 'stat3_number', '99%');
        PublicPageConfig::setConfig('hero', 'stat3_label', 'Satisfação');
        PublicPageConfig::setConfig('hero', 'stat3_icon', 'fas fa-heart');

 

        // Navigation Section
        PublicPageConfig::setConfig('navigation', 'logo_text', 'Sistema de Gestão');
        PublicPageConfig::setConfig('navigation', 'logo_url', '/');
        PublicPageConfig::setConfig('navigation', 'nav_links', [
            ['text' => 'Início', 'url' => '#home'],
            ['text' => 'Clientes', 'url' => '#clients'],
            ['text' => 'Serviços', 'url' => '#services'],
            ['text' => 'Produtos', 'url' => '#products'],
            ['text' => 'Notícias', 'url' => '#news'],
            ['text' => 'Contato', 'url' => '#contact']
        ]);
        PublicPageConfig::setConfig('navigation', 'cta_text', 'Acessar Dashboard');
        PublicPageConfig::setConfig('navigation', 'cta_url', '/dashboard');
        PublicPageConfig::setConfig('navigation', 'show_home', true);
        PublicPageConfig::setConfig('navigation', 'show_clients', true);
        PublicPageConfig::setConfig('navigation', 'show_services', true);
        PublicPageConfig::setConfig('navigation', 'show_products', true);
        PublicPageConfig::setConfig('navigation', 'show_news', true);
        PublicPageConfig::setConfig('navigation', 'show_contact', true);

        // Footer Section
        PublicPageConfig::setConfig('footer', 'company_name', 'Sistema de Gestão');
        PublicPageConfig::setConfig('footer', 'description', 'Sistema de gestão completo para sua empresa.');
        PublicPageConfig::setConfig('footer', 'links_title', 'Links Rápidos');
        PublicPageConfig::setConfig('footer', 'copyright_text', 'Todos os direitos reservados.');
        PublicPageConfig::setConfig('footer', 'social_links', [
            'facebook' => 'https://facebook.com/suaempresa',
            'twitter' => 'https://twitter.com/suaempresa',
            'instagram' => 'https://instagram.com/suaempresa',
            'linkedin' => 'https://linkedin.com/company/suaempresa'
        ]);
        PublicPageConfig::setConfig('footer', 'quick_links', [
            ['text' => 'Recursos', 'url' => '#features'],
            ['text' => 'Sobre', 'url' => '#about'],
            ['text' => 'Contato', 'url' => '#contact']
        ]);
        PublicPageConfig::setConfig('footer', 'legal_links', [
            ['text' => 'Privacidade', 'url' => '#privacy'],
            ['text' => 'Termos', 'url' => '#terms'],
            ['text' => 'Cookies', 'url' => '#cookies']
        ]);

        // Clients Section
        PublicPageConfig::setConfig('clients', 'show', true);
        PublicPageConfig::setConfig('clients', 'title', 'Nossos Clientes');
        PublicPageConfig::setConfig('clients', 'description', 'Conheça algumas das empresas que confiam em nossos serviços.');
        PublicPageConfig::setConfig('clients', 'icon', 'fas fa-users');
        PublicPageConfig::setConfig('clients', 'count', 6);

        // Services Section
        PublicPageConfig::setConfig('services', 'title', 'Nossos Serviços');
        PublicPageConfig::setConfig('services', 'subtitle', 'Oferecemos soluções completas para impulsionar seu negócio.');
        PublicPageConfig::setConfig('services', 'icon', 'fas fa-cogs');
        PublicPageConfig::setConfig('services', 'show_section', true);
        PublicPageConfig::setConfig('services', 'show_cta', false);
        PublicPageConfig::setConfig('services', 'cta_text', 'Conheça nossos serviços');
        PublicPageConfig::setConfig('services', 'cta_url', '/servicos');
        PublicPageConfig::setConfig('services', 'service_url', '/servico');

        // Products Section
        PublicPageConfig::setConfig('products', 'title', 'Nossos Produtos');
        PublicPageConfig::setConfig('products', 'subtitle', 'Descubra nossa linha completa de produtos de qualidade.');
        PublicPageConfig::setConfig('products', 'icon', 'fas fa-box');
        PublicPageConfig::setConfig('products', 'show_section', true);
        PublicPageConfig::setConfig('products', 'show_cta', false);
        PublicPageConfig::setConfig('products', 'cta_text', 'Ver todos os produtos');
        PublicPageConfig::setConfig('products', 'cta_url', '/produtos');
        PublicPageConfig::setConfig('products', 'product_url', '/produto');

        // News Section
        PublicPageConfig::setConfig('news', 'title', 'Últimas Notícias');
        PublicPageConfig::setConfig('news', 'subtitle', 'Fique por dentro das novidades e atualizações.');
        PublicPageConfig::setConfig('news', 'icon', 'fas fa-newspaper');
        PublicPageConfig::setConfig('news', 'show_section', true);
        PublicPageConfig::setConfig('news', 'show_cta', false);
        PublicPageConfig::setConfig('news', 'cta_text', 'Ver todas as notícias');
        PublicPageConfig::setConfig('news', 'cta_url', '/noticias');
        PublicPageConfig::setConfig('news', 'news_url', '/noticia');
    }
}