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
        // Create the 'sessions' table with the specified columns
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Primary key column to store the session ID
            $table->foreignId('user_id')->nullable()->index(); // Foreign key column to reference the users table
            $table->string('ip_address', 45)->nullable(); // Column to store the IP address of the session
            $table->text('user_agent')->nullable(); // Column to store the user agent of the session
            $table->longText('payload'); // Column to store the session payload
            $table->integer('last_activity')->index(); // Column to store the timestamp of the session's last activity
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'sessions' table
        Schema::dropIfExists('sessions');
    }
};
