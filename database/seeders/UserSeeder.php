<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\User;

// Helpers
use Illuminate\Support\Str;

class UserSeeder extends Seeder
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
                "email"=> "admin@email.it",
                "password"=> "$2y$10$2dAmXyba.Px7aCXqSJcrTud8hQKLA4oxoGnkhacMqV8wssj.jFQ3a",
            ],
            [
                "email"=> "roberto@email.it",
                "password"=> "$2y$10$2dAmXyba.Px7aCXqSJcrTud8hQKLA4oxoGnkhacMqV8wssj.jFQ3a",
            ],
            [
                "email"=> "francesca@email.it",
                "password"=> "$2y$10$2dAmXyba.Px7aCXqSJcrTud8hQKLA4oxoGnkhacMqV8wssj.jFQ3a",
            ],
            [
                "email"=> "andrea@email.it",
                "password"=> "$2y$10$2dAmXyba.Px7aCXqSJcrTud8hQKLA4oxoGnkhacMqV8wssj.jFQ3a",
            ],
            [
                "email"=> "samuel@email.it",
                "password"=> "$2y$10$2dAmXyba.Px7aCXqSJcrTud8hQKLA4oxoGnkhacMqV8wssj.jFQ3a",
            ],
            [
                "email"=> "emanuela@email.it",
                "password"=> "$2y$10$2dAmXyba.Px7aCXqSJcrTud8hQKLA4oxoGnkhacMqV8wssj.jFQ3a",
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
