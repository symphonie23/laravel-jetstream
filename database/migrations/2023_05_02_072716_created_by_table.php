<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Add a foreign key column named "created_by" to both the task_lists and tasks tables
     * to reference the "id" column in the "users" table with the "set null" on delete action.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('task_lists', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * Remove the "created_by" foreign key column from both the task_lists and tasks tables.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('task_lists', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');
        });
    }
};
