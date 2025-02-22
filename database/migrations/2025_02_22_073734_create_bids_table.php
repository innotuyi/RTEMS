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
            $table->id();
            $table->string('title'); // Bid title
            $table->text('description'); // Bid requirements
            $table->enum('category', ['software', 'hardware', 'consulting']); // Category
            $table->date('deadline'); // Submission deadline
            $table->enum('status', ['open', 'closed', 'awarded'])->default('open'); // Status
            $table->unsignedBigInteger('winner_company_id')->nullable(); // Nullable foreign key
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraint
            $table->foreign('winner_company_id')->references('id')->on('companies')->onDelete('set null');
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
