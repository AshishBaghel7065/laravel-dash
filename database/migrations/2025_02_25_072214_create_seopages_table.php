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
        Schema::create('seopages', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('seopage')->unique(); // Unique identifier for SEO pages
            $table->string('title')->nullable(); // SEO page title
            $table->text('meta_description')->nullable(); // Meta description
            $table->text('meta_keywords')->nullable(); // Meta keywords
            $table->string('author')->nullable(); // Author name
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seopages');
    }
};
