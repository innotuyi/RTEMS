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
        Schema::create('bid_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bid_id')->constrained()->onDelete('cascade'); // Foreign key to bids
            $table->foreignId('company_id')->constrained()->onDelete('cascade'); // Foreign key to companies
            $table->string('proposal_file'); // Path to uploaded proposal
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Enum for application status
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bid_applications');
    }
};
