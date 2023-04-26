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
                "sponsor_id" => "3",
                "deadline" => ""
            ],
            [
                "apartment_id" => "2",
                "sponsor_id" => "2",
                "deadline" => ""
            ],
            [
                "apartment_id" => "3",
                "sponsor_id" => "1",
                "deadline" => ""
            ],
            [
                "apartment_id" => "4",
                "sponsor_id" => "1",
                "deadline" => ""
            ],
        ];

        foreach ($apartmentSponsors as $key => $apartmentSponsor) {
            $currentDate = date("Y-m-d H:i:s");
            if ($apartmentSponsor['sponsor_id'] == 1) {
                $currentDateMin = date("Y-m-d H:i:s", strtotime('+24 hours', strtotime($currentDate)));
            } else if ($apartmentSponsor['sponsor_id'] == 2) {
                $currentDateMin = date("Y-m-d H:i:s", strtotime('+72 hours', strtotime($currentDate)));
            } else if ($apartmentSponsor['sponsor_id'] == 3) {
                $currentDateMin = date("Y-m-d H:i:s", strtotime('+144 hours', strtotime($currentDate)));
            }

            $apartmentSponsor["deadline"] = $currentDateMin;

            ApartmentSponsor::create($apartmentSponsor);
        }
    }
}
