<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Message;
use App\Models\Apartment;

// Helpers
use Faker\Generator as Faker;
class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        for ($i = 0; $i  < 50; $i++) {
            $apartment_id = Apartment::inRandomOrder()->first()->id; 
            $message = [
                
                    "apartment_id"=> $apartment_id,
                    "sender_email"=> $faker->email(),
                    "sender_name"=> $faker->firstName(),
                    "sender_surname"=> $faker->lastName(),
                    "object"=> $faker->sentence(3),
                    "sender_text"=> $faker->realTextBetween(),
                    "read"=> "0",
                
            ];
            Message::create($message);
        } 
    }
}
