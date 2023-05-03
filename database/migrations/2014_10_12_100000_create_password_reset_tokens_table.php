<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

   /**
 * Class PasswordResetTokensTable
 *
 * This migration creates a 'password_reset_tokens' table in the database, which will be used to store
 * password reset tokens for users who request to reset their password.
 *
 * @package     App\Database\Migrations
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Creates a 'password_reset_tokens' table with columns for email, token, and created_at timestamp.
     */
    public function up(): void
    {
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * Drops the 'password_reset_tokens' table if it exists.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};