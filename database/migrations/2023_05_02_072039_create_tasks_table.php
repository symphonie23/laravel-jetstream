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
        /**
         * Create the 'tasks' table with columns for the task name,
         * description, task list ID, and timestamps. Also add a foreign
         * key constraint to link the 'task_list_id' column to the 'id'
         * column of the 'task_lists' table and cascade delete on
         * deletion of the parent record.
         */
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id'); // an auto-incrementing integer column that serves as the primary key.
            $table->integer('task_list_id')->unsigned(); // an integer column that holds the ID of the associated task list.
            $table->string('name'); // a string column that holds the name of the task.
            $table->string('desc'); // a string column that holds the description of the task.
            $table->timestamps(); // two timestamp columns that track the creation and modification times of the task.
            $table->foreign('task_list_id')
                  ->references('id')
                  ->on('task_lists')
                  ->onDelete('cascade'); // It also defines a foreign key constraint that links the "task_list_id" column to the "id" column of the "task_lists" table and specifies that if a task list is deleted, all tasks associated with it should also be deleted.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'tasks' table if it exists.
        Schema::dropIfExists('tasks');
    }
};
