<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use Carbon\Carbon;

class UpdateTaskNotifications extends Command
{
    protected $signature = 'tasks:update-notifications';
    protected $description = 'Update notifications for tasks due soon';

    public function handle()
    {
        $tasks = Task::where('due_date', '>=', Carbon::now())
            ->where('notified', false)
            ->get();

        foreach ($tasks as $task) {
            $task->notified = true;
            $task->save();
        }

        $this->info('Task notifications updated.');
    }
}
