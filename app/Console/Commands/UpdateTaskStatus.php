<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class UpdateTaskStatus extends Command
{
    protected $signature = 'task:update-status {id} {status}';
    protected $description = 'Update the status of a task (todo, in-progress, done)';

    public function handle()
    {
        $id = $this->argument('id');
        $status = $this->argument('status');

        if (!in_array($status, ['todo', 'in-progress', 'done'])) {
            $this->error('Invalid status. Valid statuses are: todo, in-progress, done.');
            return;
        }

        $task = Task::find($id);

        if (!$task) {
            $this->error("Task with ID {$id} not found.");
            return;
        }

        // Actualizar el estado de la tarea
        $task->status = $status;
        $task->save();

        $this->info("Task ID {$id} status updated to {$status}.");
    }
}
