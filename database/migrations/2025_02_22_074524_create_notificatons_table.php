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
        Schema::create('notificatons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users
            $table->text('message'); // Notification message
            $table->enum('type', ['bid_update', 'approval_status', 'general_alert']); // Enum for notification type
            $table->timestamp('read_at')->nullable(); // Timestamp for when the notification is read (nullable)
            $table->timestamps(); // Timestamps for created_at and updated_at
            

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificatons');
    }
};
