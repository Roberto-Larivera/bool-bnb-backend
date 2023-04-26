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
                "description" => "Sponsorizza in modo esclusivo il tuo appartamento: sarà visibile in homepage per 1 giorno nella sezione dedicata"
            ],
            [
                "title"=> "Abbonamento Gold",
                "price"=> "5.99",
                "duration"=> "72",
                "description" => "Sponsorizza in modo esclusivo il tuo appartamento: sarà visibile in homepage per 3 giorni nella sezione dedicata"
            ],
            [
                "title"=> "Abbonamento Platinum",
                "price"=> "9.99",
                "duration"=> "144",
                "description" => "Sponsorizza in modo esplosivo il tuo appartamento: sarà visibile in homepage per 6 giorni nella sezione dedicata"
            ],
        ];

        foreach ($sponsors as $key => $sponsor) {
            Sponsor::create($sponsor);
        }
    }
}
