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
        Schema::create('activity_updates', function (Blueprint $table) {
            $table->id();
            // Links this update to a specific activity
            $table->foreignId('activity_id')->constrained()->onDelete('cascade');
            // Links this update to the user who performed it
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Status must be either 'done' or 'pending'
            $table->enum('status', ['done', 'pending']);
            // The remark field for extra details
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_updates');
    }
};