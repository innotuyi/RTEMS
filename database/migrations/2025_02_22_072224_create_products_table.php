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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id'); // Foreign key (Company reference)
            $table->string('name'); // Product name
            $table->text('description'); // Detailed description
            $table->enum('category', ['software', 'hardware', 'consulting']); // Enum category
            $table->decimal('price', 15, 2)->nullable(); // Price (nullable)
            $table->string('image')->nullable(); // Image path (nullable)
            $table->enum('status', ['active', 'inactive'])->default('active'); // Enum status
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraint
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
