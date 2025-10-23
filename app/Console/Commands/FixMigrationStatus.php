<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FixMigrationStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:fix-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix migration status for existing tables';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔧 Fixing migration status...');

        // Check if migrations table exists, if not create it
        if (!Schema::hasTable('migrations')) {
            $this->info('📋 Creating migrations table...');
            $this->call('migrate:install');
        }

        // List of migrations that might already be executed
        $migrations = [
            '0001_01_01_000000_create_users_table',
            '0001_01_01_000001_create_cache_table',
            '0001_01_01_000002_create_jobs_table',
        ];

        $batch = 1;
        $added = 0;

        foreach ($migrations as $migration) {
            // Check if migration is already recorded
            $exists = DB::table('migrations')
                ->where('migration', $migration)
                ->exists();

            if (!$exists) {
                // Check if the corresponding table exists
                $tableName = $this->getTableNameFromMigration($migration);
                
                if ($tableName && Schema::hasTable($tableName)) {
                    // Mark migration as run
                    DB::table('migrations')->insert([
                        'migration' => $migration,
                        'batch' => $batch,
                    ]);
                    
                    $this->info("✅ Marked {$migration} as executed (table {$tableName} exists)");
                    $added++;
                } else {
                    $this->warn("⚠️  Migration {$migration} not marked (table {$tableName} doesn't exist)");
                }
            } else {
                $this->info("ℹ️  Migration {$migration} already recorded");
            }
        }

        if ($added > 0) {
            $this->info("🎉 Fixed {$added} migration(s) status");
            $this->info("🚀 You can now run: php artisan migrate --seed");
        } else {
            $this->info("ℹ️  No migrations needed to be fixed");
        }
    }

    /**
     * Get table name from migration name
     */
    private function getTableNameFromMigration($migration)
    {
        $mapping = [
            '0001_01_01_000000_create_users_table' => 'users',
            '0001_01_01_000001_create_cache_table' => 'cache',
            '0001_01_01_000002_create_jobs_table' => 'jobs',
        ];

        return $mapping[$migration] ?? null;
    }
}
