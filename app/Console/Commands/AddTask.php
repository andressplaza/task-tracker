<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class AddTask extends Command
{

    protected $signature = 'app:add-task {task-description}';
    protected $description = 'Add a new task';


    public function handle()
    {
        $descripcion = $this->argument('task-description');
        $task = Task::create(['description' => $descripcion]);
        $this->info("Task added successfully (ID: {$task->id})");
    }
}
