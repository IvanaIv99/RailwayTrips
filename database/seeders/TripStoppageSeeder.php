<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\Trip;
use App\Models\TripRoute;
use App\Models\TripStoppage;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TripStoppageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $for_insert = [

            // BG - Cacak
            array('trip_id' => 1, 'start_city_station_id' => 1 ,'end_city_station_id' => 4,'arrival' => '12:00:00','departure' => '13:00:00','distance' => '50km','time' => '1 h','active' => '1','created_at' => $now,'updated_at' => $now ),
            array('trip_id' => 1, 'start_city_station_id' => 1 ,'end_city_station_id' => 3,'arrival' => '12:00:00','departure' => '14:00:00','distance' => '90km','time' => '2h','active' => '1','created_at' => $now,'updated_at' => $now ),
            array('trip_id' => 1, 'start_city_station_id' => 1 ,'end_city_station_id' => 2,'arrival' => '12:00:00','departure' => '16:00:00','distance' => '130km','time' => '3h','active' => '1','created_at' => $now,'updated_at' => $now ),
            array('trip_id' => 1, 'start_city_station_id' => 4 ,'end_city_station_id' => 3,'arrival' => '13:00:00','departure' => '14:00:00','distance' => '40km','time' => '1h','active' => '1','created_at' => $now,'updated_at' => $now ),
            array('trip_id' => 1, 'start_city_station_id' => 4 ,'end_city_station_id' => 2,'arrival' => '13:00:00','departure' => '16:00:00','distance' => '100km','time' => '2h','active' => '1','created_at' => $now,'updated_at' => $now ),
            array('trip_id' => 1, 'start_city_station_id' => 3 ,'end_city_station_id' => 2,'arrival' => '15:00:00','departure' => '16:00:00','distance' => '100km','time' => '2h','active' => '1','created_at' => $now,'updated_at' => $now ),


            // NS - Banjaluka
            array('trip_id' => 2, 'start_city_station_id' => 5 ,'end_city_station_id' => 6,'arrival' => '16:00:00','departure' => '20:00:00','distance' => '250km','time' => '4h','active' => '1','created_at' => $now,'updated_at' => $now ),
            array('trip_id' => 2, 'start_city_station_id' => 6 ,'end_city_station_id' => 7,'arrival' => '20:00:00','departure' => '23:00:00','distance' => '200km','time' => '3h','active' => '1','created_at' => $now,'updated_at' => $now ),
            array('trip_id' => 2, 'start_city_station_id' => 5 ,'end_city_station_id' => 7,'arrival' => '16:00:00','departure' => '23:00:00','distance' => '450km','time' => '7h','active' => '1','created_at' => $now,'updated_at' => $now ),

            // BG - LJIG

            array('trip_id' => 3, 'start_city_station_id' => 1 ,'end_city_station_id' => 4,'arrival' => '11:00:00','departure' => '12:00:00','distance' => '40km','time' => '1h','active' => '1','created_at' => $now,'updated_at' => $now ),
            array('trip_id' => 3, 'start_city_station_id' => 4 ,'end_city_station_id' => 3,'arrival' => '11:00:00','departure' => '13:00:00','distance' => '90km','time' => '2h','active' => '1','created_at' => $now,'updated_at' => $now ),
            array('trip_id' => 3, 'start_city_station_id' => 1 ,'end_city_station_id' => 3,'arrival' => '12:00:00','departure' => '13:00:00','distance' => '50km','time' => '1h','active' => '1','created_at' => $now,'updated_at' => $now ),
        ];

        TripStoppage::insert($for_insert);

    }


}
