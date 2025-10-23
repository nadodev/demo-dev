<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if products table exists
        if (Schema::hasTable('products')) {
            // Check if slug column already exists
            if (!Schema::hasColumn('products', 'slug')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->string('slug')->unique()->after('name');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
