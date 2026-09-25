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
        Schema::table('users', function (Blueprint $table) {
            // Remove the old full_name column if it exists
            if (Schema::hasColumn('users', 'full_name')) {
                $table->dropColumn('full_name');
            }
            
            // Add the new detailed fields
            $table->string('username')->unique()->after('id');
            $table->string('first_name')->after('name');
            $table->string('last_name')->after('first_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'first_name', 'last_name']);
            $table->string('full_name')->nullable();
        });
    }
};
