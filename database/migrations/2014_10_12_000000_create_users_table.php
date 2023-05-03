<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateUserTable
 * 
 * This migration creates the 'users' table in the database.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method is called when the migration is executed and is responsible for creating the 'users' table.
     * The table contains columns for user details such as name, email, password, and more.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method is called when the migration is rolled back and is responsible for dropping the 'users' table.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
