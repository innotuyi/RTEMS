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
            $table->string('reason')->nullable(); // Reason if rejected
            $table->text('address'); // Company location
            $table->string('registration_certificate')->nullable(); // File path (Nullable)
            $table->unsignedBigInteger('user_id'); // Foreign key (owner of the company)
        
            // New fields
            $table->text('mission')->nullable(); // Company mission
            $table->text('target')->nullable(); // Company target
            $table->text('achievements')->nullable(); // Company achievements
            $table->integer('number_of_employees')->nullable(); // Number of employees
            $table->text('education_level')->nullable(); // NAMA degree or educational qualifications
            $table->text('company_experience')->nullable(); // Experience of the company
            $table->text('partners')->nullable(); // List of partners (Nullable)
        
            $table->timestamps();
        
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
