<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Add deadline_at column to task_lists table migration.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('task_lists', function (Blueprint $table) {
            $table->timestamp('deadline_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('task_lists', function (Blueprint $table) {
            $table->dropColumn('deadline_at');
        });
    }
};
