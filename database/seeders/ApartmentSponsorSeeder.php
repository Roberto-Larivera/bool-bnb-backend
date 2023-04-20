<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Apartment;
use App\Models\ApartmentSponsor;
use App\Models\Sponsor;

class ApartmentSponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartmentSponsors = [
            [
                "apartment_id" => "1",
                "sponsor_id" => "3"
            ],
            [
                "apartment_id" => "2",
                "sponsor_id" => "2"
            ],
            [
                "apartment_id" => "3",
                "sponsor_id" => "1"
            ],
            [
                "apartment_id" => "4",
                "sponsor_id" => "1"
            ],
        ];

        foreach ($apartmentSponsors as $key => $apartmentSponsor) {
            ApartmentSponsor::create($apartmentSponsor);
        }
    }
}
