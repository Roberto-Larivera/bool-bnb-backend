<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ApartmentSponsor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            UserDataSeeder::class,
            ApartmentSeeder::class,
            MessageSeeder::class,
            ServiceSeeder::class,
            SponsorSeeder::class,
            ViewSeeder::class,
            ApartmentSponsorSeeder::class,
            ApartmentServiceSeeder::class,
            ImageGallerySeeder::class
        ]);
    }
}
