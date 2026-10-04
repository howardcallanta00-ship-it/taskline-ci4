<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TasklineSeeder extends Seeder
{
    public function run(): void
    {
        $now = date('Y-m-d H:i:s');
        $today = date('Y-m-d');

        $this->db->table('tasks')->truncate();
        $this->db->table('users')->truncate();

        $this->db->table('tasks')->insertBatch([
            ['title' => "Review yesterday's project notes", 'status' => 'completed', 'task_date' => date('Y-m-d', strtotime('-1 day')), 'created_at' => $now],
            ['title' => 'Send the weekly progress summary', 'status' => 'completed', 'task_date' => date('Y-m-d', strtotime('-1 day')), 'created_at' => $now],
            ['title' => 'Plan the top priorities for today', 'status' => 'completed', 'task_date' => $today, 'created_at' => $now],
            ['title' => 'Finish the dashboard wireframes', 'status' => 'in-progress', 'task_date' => $today, 'created_at' => $now],
            ['title' => 'Meet with the product team', 'status' => 'pending', 'task_date' => $today, 'created_at' => $now],
            ['title' => "Prepare tomorrow's handoff notes", 'status' => 'pending', 'task_date' => $today, 'created_at' => $now],
            ['title' => 'Review customer feedback', 'status' => 'pending', 'task_date' => date('Y-m-d', strtotime('+1 day')), 'created_at' => $now],
            ['title' => 'Outline the next sprint', 'status' => 'pending', 'task_date' => date('Y-m-d', strtotime('+1 day')), 'created_at' => $now],
        ]);

        $this->db->table('users')->insert([
            'username'   => 'alex.morgan',
            'full_name'  => 'Alex Morgan',
            'email'      => 'alex.morgan@example.com',
            'created_at' => $now,
        ]);
    }
}
