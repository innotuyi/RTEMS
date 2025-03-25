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
        Schema::create('bids', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Bid title
            $table->text('description'); // Bid description/requirements
            $table->enum('category', ['software', 'hardware', 'consulting', 'construction', 'services']); // Bid category
            $table->date('deadline'); // Submission deadline
            $table->enum('status', ['open', 'closed', 'awarded'])->default('open'); // Bid status
            
            // Financial and Evaluation Details
            $table->decimal('budget', 15, 2)->nullable(); // Budget (nullable in case no fixed budget)
            $table->string('currency', 10)->default('RWF'); // Currency (default to RWF)
            $table->text('evaluation_criteria')->nullable(); // How bids will be evaluated
            $table->integer('minimum_experience')->nullable(); // Minimum years of experience required

            // Bid Submission Details
            $table->enum('submission_method', ['online', 'physical', 'email'])->default('online'); // Submission method
            $table->dateTime('bid_opening_date')->nullable(); // When bids will be opened
            $table->string('bid_document')->nullable(); // URL for bid specifications (optional)

            // Location & Contact Information
            $table->string('location')->nullable(); // Project location
            $table->string('contact_person')->nullable(); // Name of responsible contact person
            $table->string('contact_email')->nullable(); // Email for inquiries

            // Attachments & Additional Info
            $table->json('requirements')->nullable(); // JSON field for detailed technical requirements
            $table->json('attachments')->nullable(); // JSON field for multiple files (e.g., terms, conditions)

            // Winner & Foreign Key Constraints
            $table->unsignedBigInteger('winner_company_id')->nullable(); // Winning company (nullable)
            $table->foreign('winner_company_id')->references('id')->on('companies')->onDelete('set null');

            $table->timestamps(); // created_at and updated_at



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bids');
    }
};
