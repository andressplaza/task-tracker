<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class ListTasks extends Command
{
    protected $signature = 'task:list {status?}';
    protected $description = 'List tasks by status (todo, in-progress, done) or all';

    public function handle()
    {
        $status = $this->argument('status');
        $tasks = $status ? Task::where('status', $status)->get() : Task::all();

        if ($tasks->isEmpty()) {
            $this->info('No tasks found.');
            return;
        }

        foreach ($tasks as $task) {
            $this->line("[{$task->id}] {$task->description} - {$task->status}");
        }
    }
}
