<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class to add a new column 'deadline_at' to the 'tasks' table.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     * Adds a nullable 'deadline_at' timestamp column to the 'tasks' table.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->timestamp('deadline_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     * Removes the 'deadline_at' column from the 'tasks' table.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('deadline_at');
        });
    }
};
