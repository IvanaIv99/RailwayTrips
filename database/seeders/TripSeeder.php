<?php

namespace Database\Seeders;

use App\Models\Carrier;
use App\Models\CityStation;
use App\Models\Schedule;
use App\Models\Trip;
use App\Models\TripRoute;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripSeeder extends Seeder
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
            array(
                'name' => 'Beograd ZS (SRB) - Cacak ZS (SRB)',
                'carrier_id' => Carrier::where('name', '=', 'Eurostar')->pluck('id')->first(),
                'schedule_id' => Schedule::where('start_from','12:00:00')->where('end_to','16:00:00')->pluck('id')->first(),
                'start_to_city_station_id' => CityStation::where('city','=','Beograd')->pluck('id')->first(),
                'end_to_city_station_id' => CityStation::where('city','=','Cacak')->pluck('id')->first(),
                'stoppages' => json_encode(array(
                    CityStation::where('city','=','Beograd')->pluck('id')->first(),
                    CityStation::where('city','=','Lazarevac')->pluck('id')->first(),
                    CityStation::where('city','=','Ljig')->pluck('id')->first(),
                    CityStation::where('city','=','Cacak')->pluck('id')->first(),
                )),
                'day_off' => json_encode(['2']),
                'active' => 1,'created_at' => $now, 'updated_at' => $now
            ),
            array(
                'name' => 'Novi Sad ZS (SRB) - Sarajevo ZS (BIH)',
                'carrier_id' => Carrier::where('name', '=', 'SNCF')->pluck('id')->first(),
                'schedule_id' => Schedule::where('start_from','16:00:00')->where('end_to','23:00:00')->pluck('id')->first(),
                'start_to_city_station_id' => CityStation::where('city','=','Novi Sad')->pluck('id')->first(),
                'end_to_city_station_id' => CityStation::where('city','=','Sarajevo')->pluck('id')->first(),
                'stoppages' => json_encode(array(
                    CityStation::where('city','=','Novi Sad')->pluck('id')->first(),
                    CityStation::where('city','=','Banjaluka')->pluck('id')->first(),
                    CityStation::where('city','=','Sarajevo')->pluck('id')->first(),
                )),
                'day_off' => json_encode([]),
                'active' => 1,'created_at' => $now, 'updated_at' => $now
            ),
            array(
                'name' => 'Beograd (SRB) - Ljig ZS (SRB)',
                'carrier_id' => Carrier::where('name', '=', 'SNCF')->pluck('id')->first(),
                'schedule_id' => Schedule::where('start_from','11:00:00')->where('end_to','13:00:00')->pluck('id')->first(),
                'start_to_city_station_id' => CityStation::where('city','=','Beograd')->pluck('id')->first(),
                'end_to_city_station_id' => CityStation::where('city','=','Ljig')->pluck('id')->first(),
                'stoppages' => json_encode(array(
                    CityStation::where('city','=','Beograd')->pluck('id')->first(),
                    CityStation::where('city','=','Lazarevac')->pluck('id')->first(),
                    CityStation::where('city','=','Ljig')->pluck('id')->first(),
                )),
                'day_off' => json_encode(["1"]),
                'active' => 1,'created_at' => $now, 'updated_at' => $now
            )
        ];

        //dd($for_insert);
        Trip::insert($for_insert);
    }
}
