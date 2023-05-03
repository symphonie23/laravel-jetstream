<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations to create the "task_lists" table.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('task_lists', function (Blueprint $table) {
            $table->increments('id'); // Adds an auto-incrementing primary key column named 'id'
            $table->string('name'); // Adds a string column named 'name'
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns to track record timestamps
        });
    }

    /**
     * Reverse the migrations to drop the "task_lists" table.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('task_lists'); // Drops the 'task_lists' table if it exists
    }
};