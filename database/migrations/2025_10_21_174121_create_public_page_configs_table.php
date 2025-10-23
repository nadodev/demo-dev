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
        Schema::create('public_page_configs', function (Blueprint $table) {
            $table->id();
            $table->string('section'); // hero, features, pricing, cta, footer, navigation
            $table->string('key'); // specific configuration key
            $table->text('value')->nullable(); // configuration value
            $table->json('data')->nullable(); // complex data as JSON
            $table->timestamps();
            
            $table->unique(['section', 'key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_page_configs');
    }
};
