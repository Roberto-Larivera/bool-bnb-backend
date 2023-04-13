<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\User_data;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_datas = [
            [
                "user_id"=> "1",
                "name"=> "Mister",
                "surname"=> "Monopolo",
                "date_of_birth"=> "1990-06-24",
            ],
            [
                "user_id"=> "2",
                "name"=> "Roberto",
                "surname"=> "Larivera",
                "date_of_birth"=> "2001-03-15",
            ],
            [
                "user_id"=> "3",
                "name"=> "Francesca",
                "surname"=> "Dascanio",
                "date_of_birth"=> "1996-08-03",
            ],
            [
                "user_id"=> "4",
                "name"=> "Andrea",
                "surname"=> "Raguso",
                "date_of_birth"=> "2003-06-14",
            ],
            [
                "user_id"=> "5",
                "name"=> "Samuel",
                "surname"=> "Aricò",
                "date_of_birth"=> "1998-10-20",
            ],
            [
                "user_id"=> "6",
                "name"=> "Emanuela",
                "surname"=> "Stetsko",
                "date_of_birth"=> "2000-03-08",
            ],
        ];

        foreach ($user_datas as $key => $user_data) {
            User_data::create($user_data);
        }
    }
}
