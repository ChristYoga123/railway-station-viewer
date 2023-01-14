<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin DAOP',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'is_admin' => true
            ],
            [
                'name' => 'Admin Stasiun Jember',
                'email' => 'adminjember@example.com',
                'password' => bcrypt('password'),
                'is_admin' => false
            ]
        ];
        foreach($users as $user)
        {
            User::create($user);
        }
    }
}
