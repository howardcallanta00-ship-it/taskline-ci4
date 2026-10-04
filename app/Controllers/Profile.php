<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Profile extends BaseController
{
    public function index(): string
    {
        $user = (new UserModel())->findDemoUser();
        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('No profile record is available.');
        }

        $parts = preg_split('/\s+/', trim($user['full_name'])) ?: [];
        $initials = implode('', array_map(static fn (string $part): string => strtoupper($part[0]), array_slice($parts, 0, 2)));

        return view('profile', [
            'pageTitle'   => 'Profile',
            'activePath'  => '/profile',
            'user'        => $user,
            'memberSince' => date('F j, Y', strtotime($user['created_at'])),
            'initials'    => $initials,
        ]);
    }
}
