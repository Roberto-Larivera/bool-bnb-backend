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
                "name"=> "Wifi",
            ],
            [
                "name"=> "Lavatrice",
            ],
            [
                "name"=> "Aria condizionata",
            ],
            [
                "name"=> "Spazio di lavoro dedicato",
            ],
            [
                "name"=> "Asciugacapelli",
            ],
            [
                "name"=> "Cucina",
            ],
            [
                "name"=> "Asciugatrice",
            ],
            [
                "name"=> "Riscaldamento",
            ],
            [
                "name"=> "Tv",
            ],
            [
                "name"=> "Ferro da stiro",
            ],
            [
                "name"=> "Piscina",
            ],
            [
                "name"=> "Parcheggio gratuito nella proprità",
            ],
            [
                "name"=> "Culla",
            ],
            [
                "name"=> "Griglia per barbecue",
            ],
            [
                "name"=> "Camino",
            ],
            [
                "name"=> "Idromasaggio",
            ],
            [
                "name"=> "Postazione di ricarica per veicoli elettrici",
            ],
            [
                "name"=> "Palestra",
            ],
            [
                "name"=> "Colazione inclusa",
            ],
            [
                "name"=> "E' permesso fumare",
            ],
            [
                "name"=> "Lungo la spiaggia o lungo la riva",
            ],
            [
                "name"=> "Allarme anticendio",
            ],
            [
                "name"=> "Rilevatore di monossido di carbonio",
            ],
            [
                "name"=> "Escursionismo",
            ],
            [
                "name"=> "Tutti i pasti inclusi",
            ],
            [
                "name"=> "Reception 24 ore su 24",
            ],
            [
                "name"=> "Intera unità accessibile ai disabili",
            ],
        ];

        foreach ($services as $key => $service) {
            service::create($service);
        }
    }
}
