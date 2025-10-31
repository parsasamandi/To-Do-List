<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();  
            // Auto-incrementing primary key (unique task ID)

            $table->string('name');  
            // Task name or title (e.g., "Buy groceries")

            $table->string('tag')->nullable();  
            // Optional tag or category for grouping tasks (e.g., "Work", "Personal")

            $table->tinyInteger('priority')->default(1)
                ->comment('0 = Low, 1 = Medium, 2 = High');  
            // Priority level of the task, stored as a small integer

            $table->string('due_date')->nullable();  
            // Due date stored as a string — user can type anything (e.g., "Tomorrow", "Next week", "May 5")

            $table->tinyInteger('status')->default(0)
                ->comment('0 = Pending, 1 = In Progress, 2 = Completed');  
            // Current status of the task, represented numerically

            $table->timestamps();  
            // Automatically adds created_at and updated_at timestamps
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
