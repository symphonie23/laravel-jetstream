<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create a new table for storing failed jobs.
 *
 * This migration creates a table named "failed_jobs" with columns for storing information about failed jobs.
 * The table has an auto-incrementing "id" column as the primary key, a "uuid" column for a unique identifier,
 * "connection" and "queue" columns for specifying the connection and queue name, a "payload" column for storing
 * the job payload, an "exception" column for storing the exception message, and a "failed_at" timestamp column
 * for the time the job failed.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('failed_jobs');
    }
};
