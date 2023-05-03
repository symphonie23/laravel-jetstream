<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Add soft delete columns to task_lists and tasks tables
     *
     * @return void
     */
    public function up()
    {
        // Add soft delete columns to task_lists table
        Schema::table('task_lists', function (Blueprint $table) {
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');
        });

        // Add soft delete columns to tasks table
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * Remove soft delete columns from task_lists and tasks tables
     *
     * @return void
     */
    public function down()
    {
        // Remove soft delete columns from tasks table
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['deleted_by']);
            $table->dropColumn(['deleted_by', 'deleted_at']);
        });

        // Remove soft delete columns from task_lists table
        Schema::table('task_lists', function (Blueprint $table) {
            $table->dropForeign(['deleted_by']);
            $table->dropColumn(['deleted_by', 'deleted_at']);
        });
    }
};
