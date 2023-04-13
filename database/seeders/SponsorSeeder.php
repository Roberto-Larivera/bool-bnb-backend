<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Sponsor;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = [
            [
                "title"=> "Abbonamento Silver",
                "price"=> "2.99",
                "duration"=> "24",
            ],
            [
                "title"=> "Abbonamento Gold",
                "price"=> "5.99",
                "duration"=> "72",
            ],
            [
                "title"=> "Abbonamento Platinum",
                "price"=> "9.99",
                "duration"=> "144",
            ],
        ];

        foreach ($sponsors as $key => $sponsor) {
            Sponsor::create($sponsor);
        }
    }
}
