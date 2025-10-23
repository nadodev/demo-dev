# Instruções para Executar as Migrations

## Problemas Identificados
1. O campo `category` não existe na tabela `news`
2. Os campos `category` e `duration` não existem na tabela `services`

## Solução: Executar Migrations
```bash
# No terminal, dentro da pasta do projeto:
php artisan migrate
```

## Migrations Criadas
- `database/migrations/2025_01_27_000000_add_category_to_news_table.php` - Adiciona campo `category` à tabela `news`
- `database/migrations/2025_01_27_000001_add_category_and_duration_to_services_table.php` - Adiciona campos `category` e `duration` à tabela `services`

## Após Executar as Migrations
1. Remova as linhas temporárias dos controllers (linhas que fazem `unset($data['category'])` e `unset($data['duration'])`)
2. Descomente os campos nos formulários
3. Os campos `category` e `duration` funcionarão normalmente

## Arquivos Modificados
- `app/Models/News.php` - Campo `category` adicionado ao `$fillable`
- `app/Models/Service.php` - Campos `category` e `duration` adicionados ao `$fillable`
- `app/Http/Controllers/NewsController.php` - Validação do campo `category` adicionada
- `app/Http/Controllers/ServiceController.php` - Validação dos campos `category` e `duration` adicionada
- `resources/views/system-base/services/create.blade.php` - Campo `category` comentado temporariamente
- `resources/views/system-base/services/edit.blade.php` - Campo `category` comentado temporariamente
