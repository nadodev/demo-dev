-- Script para corrigir o status das migrations
-- Execute este SQL no seu banco de dados MySQL

-- Verificar se a tabela migrations existe
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserir registros das migrations que já foram executadas
INSERT IGNORE INTO `migrations` (`migration`, `batch`) VALUES
('0001_01_01_000000_create_users_table', 1),
('0001_01_01_000001_create_cache_table', 1),
('0001_01_01_000002_create_jobs_table', 1);

-- Verificar se as tabelas existem e marcar as migrations correspondentes
-- Se a tabela users existe, marcar a migration como executada
INSERT IGNORE INTO `migrations` (`migration`, `batch`) 
SELECT '0001_01_01_000000_create_users_table', 1 
WHERE EXISTS (SELECT 1 FROM information_schema.tables WHERE table_name = 'users');

-- Se a tabela cache existe, marcar a migration como executada  
INSERT IGNORE INTO `migrations` (`migration`, `batch`) 
SELECT '0001_01_01_000001_create_cache_table', 1 
WHERE EXISTS (SELECT 1 FROM information_schema.tables WHERE table_name = 'cache');

-- Se a tabela jobs existe, marcar a migration como executada
INSERT IGNORE INTO `migrations` (`migration`, `batch`) 
SELECT '0001_01_01_000002_create_jobs_table', 1 
WHERE EXISTS (SELECT 1 FROM information_schema.tables WHERE table_name = 'jobs');
