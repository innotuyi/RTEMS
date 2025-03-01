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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Company name
            $table->string('email')->unique(); // Company email
            $table->string('phone')->nullable(); // Contact number
            $table->string('website')->nullable(); // URL (Nullable)
            $table->string('industry'); // Industry sector
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Enum status
            $table->text('address'); // Company location
            $table->string('registration_certificate')->nullable(); // File path (Nullable)
            $table->unsignedBigInteger('user_id'); // Foreign key (owner of the company)
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
