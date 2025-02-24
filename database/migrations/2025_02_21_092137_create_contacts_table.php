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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Contact name
            $table->string('phone'); // Contact phone number
            $table->string('email'); // Contact email
            $table->dateTime('date_of_appointment'); // Appointment date and time
            $table->text('message'); // Message from the contact
            $table->string('service')->nullable(); // Service (optional)
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
