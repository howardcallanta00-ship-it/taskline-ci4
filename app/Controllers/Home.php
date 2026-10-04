<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    public function index(): string
    {
        $tasks = (new TaskModel())->findForToday();
        $completedCount = count(array_filter($tasks, static fn (array $task): bool => $task['status'] === 'completed'));
        $inProgressCount = count(array_filter($tasks, static fn (array $task): bool => $task['status'] === 'in-progress'));

        return view('welcome', [
            'pageTitle'       => 'Today',
            'activePath'      => '/',
            'tasks'           => $tasks,
            'completedCount'  => $completedCount,
            'inProgressCount' => $inProgressCount,
            'progressPercent' => count($tasks) > 0 ? (int) round(($completedCount / count($tasks)) * 100) : 0,
            'todayLabel'      => date('l, F j'),
        ]);
    }
}
