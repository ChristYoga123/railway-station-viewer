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
        $admins = [
            [
                'name' => 'Admin DAOP',
                'email' => 'adminkai@gmail.com',
                'password' => bcrypt('keretaapi'),
                'role_id' => 1
            ],
            [
                'name' => 'Logawa Admin',
                'email' => 'adminlogawa@gmail.com',
                'password' => bcrypt('keretaapi'),
                'role_id' => 2
            ]
        ];

        foreach($admins as $admin)
        {
            User::create($admin);
        }
    }
}
