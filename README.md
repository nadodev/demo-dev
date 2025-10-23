# DevStarterKit - Sistema de Gestão Completo

## 📋 Sobre o Projeto

O **DevStarterKit** é um sistema de gestão completo desenvolvido em Laravel, oferecendo uma solução moderna e profissional para administração de empresas. O sistema inclui páginas públicas totalmente administráveis, painel administrativo completo e funcionalidades avançadas.

## ✨ Funcionalidades Principais

### 🌐 Página Pública
- **Design Moderno**: Interface responsiva com gradientes e animações
- **Navegação Inteligente**: Menu sticky com efeitos visuais
- **Seções Dinâmicas**: Hero, Clientes, Serviços, Produtos e Notícias
- **Administração Completa**: Todas as seções são configuráveis pelo admin
- **Páginas Individuais**: Seções dedicadas para cada categoria
- **Paginação Traduzida**: Interface em português

### 🎛️ Painel Administrativo
- **Dashboard Moderno**: Interface limpa e intuitiva
- **Gestão Completa**: Clientes, Produtos, Serviços e Notícias
- **Configuração da Página Pública**: Controle total sobre o conteúdo
- **Perfil do Usuário**: Edição de dados pessoais e senha
- **Sistema de Autenticação**: Login e registro seguros

### 🎨 Design e UX
- **Tailwind CSS**: Framework moderno para estilização
- **FontAwesome**: Ícones profissionais
- **Responsividade**: Adaptável a todos os dispositivos
- **Animações**: Transições suaves e efeitos visuais
- **Gradientes**: Cores modernas e atrativas

## 🚀 Instalação e Uso

### Pré-requisitos
- PHP 8.3 ou superior
- Composer
- Node.js e NPM
- Banco de dados (SQLite, MySQL ou PostgreSQL)

### Passos de Instalação
Baixar o arquivo do painel da kiwify

1. **Clone o repositório**
```bash
cd devstarterkit
```

2. **Instale as dependências do PHP**
```bash
composer install
```

3. **Instale as dependências do Node.js**
```bash
npm install
```

4. **Configure o ambiente**
```bash
php artisan key:generate
```

5. **Configure o banco de dados**
```bash
# Para MySQL/PostgreSQL, configure no arquivo .env
```

6. **Execute as migrações e popule o banco**
```bash
php artisan migrate --seed
```

7. **Compile os assets**
```bash
npm run build
```

8. **Inicie o servidor**
```bash
php artisan serve
```

### 👥 Usuários de Teste

O sistema vem com usuários pré-cadastrados para teste:

#### **Administrador**
- **E-mail**: admin@devstarterkit.com
- **Senha**: password
- **Acesso**: Painel administrativo completo

### 🌐 Acessos do Sistema

#### **Página Pública**
- **URL**: `http://localhost:8000`
- **Funcionalidades**: Navegação, seções dinâmicas, páginas individuais

#### **Painel Administrativo**
- **URL**: `http://localhost:8000/dashboard`
- **Login**: Use os usuários de teste acima
- **Funcionalidades**: Gestão completa do sistema

### 📊 Dados de Exemplo

O sistema vem com dados de exemplo incluindo:
- **Clientes**: Empresas fictícias com logos
- **Produtos**: Catálogo com preços e categorias
- **Serviços**: Lista de serviços oferecidos
- **Notícias**: Artigos de blog com conteúdo
- **Configurações**: Página pública pré-configurada

## 🎯 Como Usar o Sistema

### 1. **Acesso Inicial**
Após a instalação, acesse:
- **Página Pública**: `http://localhost:8000`
- **Admin**: `http://localhost:8000/dashboard`

### 2. **Login no Painel Administrativo**
Use um dos usuários de teste:
- **Admin**: admin@devstarterkit.com / password

### 3. **Configuração da Página Pública**
1. Acesse **Dashboard > Página Pública**
2. Configure cada seção (Hero, Clientes, Serviços, etc.)
3. Defina títulos, descrições e ícones
4. Ative/desative seções conforme necessário

### 4. **Gestão de Conteúdo**
- **Clientes**: Adicione, edite ou remova clientes
- **Produtos**: Gerencie catálogo com preços
- **Serviços**: Configure serviços oferecidos
- **Notícias**: Publique artigos no blog

### 5. **Personalização**
- **Perfil**: Edite seus dados em **Meu Perfil**
- **Senha**: Altere sua senha de acesso
- **Configurações**: Ajuste a página pública

### 6. **Visualização**
- **Página Pública**: Veja as mudanças em tempo real
- **Responsividade**: Teste em diferentes dispositivos
- **Navegação**: Explore todas as seções

## 📁 Estrutura do Projeto

```
devstarterkit/
├── app/
│   ├── Http/Controllers/     # Controllers da aplicação
│   ├── Models/              # Modelos Eloquent
│   └── Providers/           # Service Providers
├── database/
│   ├── migrations/          # Migrações do banco
│   └── seeders/            # Seeders para dados iniciais
├── resources/
│   ├── views/              # Views Blade
│   │   ├── layouts/        # Layouts base
│   │   ├── public-page/    # Páginas públicas
│   │   └── system-base/    # Páginas do admin
│   ├── css/               # Estilos CSS
│   └── js/                # JavaScript
├── routes/
│   └── web.php            # Rotas da aplicação
└── public/               # Arquivos públicos
```

## 🎯 Funcionalidades Detalhadas

### 🌐 Página Pública

#### **Navegação**
- **Menu Sticky**: Navegação que muda de cor ao fazer scroll
- **Design Responsivo**: Menu mobile com animações
- **Links Dinâmicos**: Navegação para todas as seções
- **Logo Profissional**: Com ícone e subtítulo

#### **Seções Administráveis**
- **Hero**: Título, subtítulo, CTAs e estatísticas
- **Clientes**: Lista de clientes com logos
- **Serviços**: Catálogo de serviços com preços
- **Produtos**: Catálogo de produtos com categorias
- **Notícias**: Blog com artigos e datas
- **Footer**: Informações da empresa e links

#### **Páginas Individuais**
- `/clientes` - Lista completa de clientes
- `/servicos` - Catálogo de serviços
- `/produtos` - Catálogo de produtos
- `/noticias` - Blog de notícias

### 🎛️ Painel Administrativo

#### **Dashboard**
- **Estatísticas**: Cards com métricas importantes
- **Navegação**: Sidebar com todas as funcionalidades
- **Design Moderno**: Interface limpa e profissional

#### **Gestão de Conteúdo**
- **Clientes**: CRUD completo com validações
- **Produtos**: Gestão com categorias e preços
- **Serviços**: Catálogo com features e preços
- **Notícias**: Blog com editor de conteúdo

#### **Configuração da Página Pública**
- **Hero**: Configuração de título, subtítulo e CTAs
- **Seções**: Controle de visibilidade e conteúdo
- **Footer**: Informações da empresa
- **Navegação**: Links e configurações

#### **Perfil do Usuário**
- **Dados Pessoais**: Nome e e-mail
- **Segurança**: Alteração de senha
- **Validações**: Campos obrigatórios e formatos

## 🎨 Design System

### **Cores**
- **Primária**: Azul (#0ea5e9)
- **Secundária**: Roxo (#a855f7)
- **Gradientes**: Azul para roxo
- **Neutras**: Cinzas para textos

### **Tipografia**
- **Fonte**: Inter (Google Fonts)
- **Tamanhos**: Responsivos e hierárquicos
- **Pesos**: 300 a 900

### **Componentes**
- **Botões**: Gradientes com hover effects
- **Cards**: Sombras e bordas arredondadas
- **Formulários**: Campos com validação visual
- **Navegação**: Sticky com transições

## 🔧 Configurações

### **Sistema**
- **Localização**: Português (pt)
- **Timezone**: UTC
- **Paginação**: Traduzida para português
- **Validações**: Mensagens em português

### **Banco de Dados**
- **Migrações**: Estrutura completa
- **Seeders**: Dados de exemplo
- **Relacionamentos**: Modelos relacionados

## 📱 Responsividade

### **Breakpoints**
- **Mobile**: < 768px
- **Tablet**: 768px - 1024px
- **Desktop**: > 1024px

### **Adaptações**
- **Menu Mobile**: Hamburger com animações
- **Grid Responsivo**: Colunas adaptáveis
- **Imagens**: Otimizadas para todos os dispositivos

## 🚀 Deploy

### **Produção**
1. Configure o arquivo `.env` para produção
2. Execute `php artisan config:cache`
3. Execute `php artisan route:cache`
4. Execute `php artisan view:cache`
5. Configure o servidor web (Apache/Nginx)


## 🛠️ Desenvolvimento

### **Comandos Úteis**
```bash
# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Recriar banco
php artisan migrate:fresh --seed

# Compilar assets
npm run dev
npm run build
```

### **Estrutura de Arquivos**
- **Controllers**: Lógica da aplicação
- **Models**: Relacionamentos com banco
- **Views**: Templates Blade
- **Routes**: Definição de rotas
- **Migrations**: Estrutura do banco

## 📊 Tecnologias Utilizadas

### **Backend**
- **Laravel 12**: Framework PHP
- **Eloquent ORM**: Mapeamento objeto-relacional
- **Blade**: Engine de templates
- **Validação**: Sistema de validação robusto

### **Frontend**
- **Tailwind CSS**: Framework CSS
- **JavaScript**: Interatividade
- **FontAwesome**: Ícones
- **Google Fonts**: Tipografia

### **Banco de Dados**
- **SQLite**: Desenvolvimento
- **MySQL/PostgreSQL**: Produção
- **Migrations**: Versionamento do banco

## 📞 Suporte

Para dúvidas ou suporte, entre em contato através dos canais oficiais.

---

**DevStarterKit** - Sistema de Gestão Completo desenvolvido com Laravel e Tailwind CSS.
