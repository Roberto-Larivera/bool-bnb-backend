<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                "name" => "Wifi",
                "icon" => "fa-solid fa-wifi"
            ],
            [
                "name" => "Lavatrice",
                "icon" => "fa-solid fa-soap"
            ],
            [
                "name" => "Aria condizionata",
                "icon" => "fa-solid fa-wind"
            ],
            [
                "name" => "Spazio di lavoro dedicato",
                "icon" => "fa-solid fa-house-laptop"
            ],
            [
                "name" => "Asciugacapelli",
                "icon" => "fa-solid fa-bacon"
            ],
            [
                "name" => "Cucina",
                "icon" => "fa-solid fa-utensils"
            ],
            [
                "name" => "Asciugatrice",
                "icon" => "fa-solid fa-shirt"
            ],
            [
                "name" => "Riscaldamento",
                "icon" => "fa-solid fa-temperature-arrow-up"
            ],
            [
                "name" => "Tv",
                "icon" => "fa-solid fa-tv"
            ],
            [
                "name" => "Ferro da stiro",
                "icon" => "fa-solid fa-vest"
            ],
            [
                "name" => "Piscina",
                "icon" => "fa-solid fa-person-swimming"
            ],
            [
                "name" => "Parcheggio gratuito nella proprità",
                "icon" => "fa-solid fa-square-parking"
            ],
            [
                "name" => "Culla",
                "icon" => "fa-solid fa-baby-carriage"
            ],
            [
                "name" => "Griglia per barbecue",
                "icon" => "fa-solid fa-burger"
            ],
            [
                "name" => "Camino",
                "icon" => "fa-solid fa-fire"
            ],
            [
                "name" => "Idromasaggio",
                "icon" => "fa-solid fa-water"
            ],
            [
                "name" => "Postazione di ricarica per veicoli elettrici",
                "icon" => "fa-solid fa-charging-station"
            ],
            [
                "name" => "Palestra",
                "icon" => "fa-solid fa-dumbbell"
            ],
            [
                "name" => "Colazione inclusa",
                "icon" => "fa-solid fa-mug-saucer"
            ],
            [
                "name" => "E' permesso fumare",
                "icon" => "fa-solid fa-smoking"
            ],
            [
                "name" => "Lungo la spiaggia o lungo la riva",
                "icon" => "fa-solid fa-umbrella-beach"
            ],
            [
                "name" => "Allarme anticendio",
                "icon" => "fa-solid fa-fire-extinguisher"
            ],
            [
                "name" => "Rilevatore di monossido di carbonio",
                "icon" => "fa-solid fa-leaf"
            ],
            [
                "name" => "Escursionismo",
                "icon" => "fa-solid fa-map-location"
            ],
            [
                "name" => "Tutti i pasti inclusi",
                "icon" => "fa-solid fa-kitchen-set"
            ],
            [
                "name" => "Reception 24 ore su 24",
                "icon" => "fa-solid fa-square-h"
            ],
            [
                "name" => "Intera unità accessibile ai disabili",
                "icon" => "fa-solid fa-wheelchair"
            ],
        ];

        foreach ($services as $key => $service) {
            Service::create($service);
        }
    }
}
