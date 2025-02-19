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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('username'); // Reviewer's username
            $table->date('posted_date'); // Date when the review was posted
            $table->text('review'); // Review content
            $table->integer('stars'); // Rating in numbers
            $table->string('user_image')->nullable(); // User's image (nullable in case no image is provided)
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
