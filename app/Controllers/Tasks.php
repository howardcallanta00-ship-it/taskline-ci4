<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index(): string
    {
        $tasks = (new TaskModel())->findAllOrdered();
        $groups = [];

        foreach ($tasks as $task) {
            $date = $task['task_date'];
            if (! isset($groups[$date])) {
                $groups[$date] = [
                    'key'   => $date,
                    'label' => format_task_date($date),
                    'tasks' => [],
                ];
            }
            $groups[$date]['tasks'][] = $task;
        }

        return view('tasks', [
            'pageTitle'      => 'Task list',
            'activePath'     => '/tasks',
            'tasks'          => $tasks,
            'groupedTasks'   => array_values($groups),
            'completedCount' => count(array_filter($tasks, static fn (array $task): bool => $task['status'] === 'completed')),
            'pendingCount'   => count(array_filter($tasks, static fn (array $task): bool => $task['status'] === 'pending')),
        ]);
    }
}
