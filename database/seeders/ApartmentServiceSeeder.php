<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apartment;
use App\Models\Service;
use App\Models\ApartmentService;

class ApartmentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i  < 700; $i++) {
            $apartment_id = Apartment::inRandomOrder()->first()->id;
            $service_id = Service::inRandomOrder()->first()->id;

            $exist = ApartmentService::where([['apartment_id', '=', $apartment_id], ['service_id', '=', $service_id]])->first();
            while ($exist) {
                $apartment_id = Apartment::inRandomOrder()->first()->id;
                $service_id = Service::inRandomOrder()->first()->id;
                $exist = ApartmentService::where([['apartment_id', '=', $apartment_id], ['service_id', '=', $service_id]])->first();
            }

            $apartment_service = [

                "apartment_id" => $apartment_id,
                "service_id" => $service_id

            ];

            ApartmentService::create($apartment_service);
        }
    }
}
