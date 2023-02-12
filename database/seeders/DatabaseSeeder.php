<?php

namespace Database\Seeders;

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
            CarrierSeeder::class,
            CityStationSeeder::class,
            ScheduleSeeder::class,
            TripSeeder::class,
            TripStoppageSeeder::class,
            TripRoutesSeeder::class
        ]);
    }
}
