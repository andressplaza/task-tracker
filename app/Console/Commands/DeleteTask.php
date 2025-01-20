<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class DeleteTask extends Command
{
    protected $signature = 'task:delete {id}';
    protected $description = 'Delete a task by ID';

    public function handle()
    {
        $id = $this->argument('id');
        $task = Task::find($id);

        if (!$task) {
            $this->error('Task not found');
            return;
        }

        $task->delete();
        $this->info('Task deleted successfully');
    }
}
