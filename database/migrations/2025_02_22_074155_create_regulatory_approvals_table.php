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
        Schema::create('regulatory_approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade'); // Foreign key to companies
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('set null'); // Foreign key to products (nullable)
            $table->enum('status', ['pending', 'approved', 'rejected']); // Enum for approval status
            $table->text('comment')->nullable(); // Reason for approval/rejection (nullable)
            $table->foreignId('approved_by')->constrained('users')->where('role', 'export_regulator')->onDelete('cascade'); // Foreign key to users (export_regulators only)
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regulatory_approvals');
    }
};
