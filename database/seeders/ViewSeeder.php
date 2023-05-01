<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Model
use App\Models\View;
use App\Models\Apartment;

// Helpers
use Faker\Generator as Faker;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i  < 5000; $i++) {
            $apartment_id = Apartment::inRandomOrder()->first()->id;
            $view = [

                "apartment_id" => $apartment_id,
                "ip_address" => $faker->ipv4(),
                "created_at" => $faker->dateTimeBetween('-4 months', '-1 days')

            ];
            View::create($view);
        }
    }
}
