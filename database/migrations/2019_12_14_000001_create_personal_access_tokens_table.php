<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration to create the 'personal_access_tokens' table for storing personal access tokens.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Creates the 'personal_access_tokens' table with columns for the token ID, the type and ID of the associated
     * model, a name for the token, a unique token value, the abilities granted by the token, the last time the token
     * was used, and the expiration time of the token.
     */
    public function up(): void
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * Drops the 'personal_access_tokens' table if it exists.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
