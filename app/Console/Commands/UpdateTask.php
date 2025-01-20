<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class UpdateTask extends Command
{
    protected $signature = 'task:update {id} {description}';
    protected $description = 'Update an existing task';

    public function handle()
    {
        $id = $this->argument('id');
        $description = $this->argument('description');
        $task = Task::find($id);

        if (!$task) {
            $this->error('Task not found');
            return;
        }

        $task->update(['description' => $description]);
        $this->info('Task updated successfully');
    }
}
