<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\Trip;
use App\Models\TripRoute;
use App\Models\TripStoppage;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TripRoutesSeeder extends Seeder
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
            array('trip_id' => 1, 'trip_stoppage_id' => 1 ),
            array('trip_id' => 1, 'trip_stoppage_id' => 4 ),
            array('trip_id' => 1, 'trip_stoppage_id' => 6 ),

            // NS - Banjaluka
            array('trip_id' => 2, 'trip_stoppage_id' => 7 ),
            array('trip_id' => 2, 'trip_stoppage_id' => 8 ),

            //BG - LJIG

            array('trip_id' => 3, 'trip_stoppage_id' => 10 ),
            array('trip_id' => 3, 'trip_stoppage_id' => 11 ),
        ];

        TripRoute::insert($for_insert);

    }


}
