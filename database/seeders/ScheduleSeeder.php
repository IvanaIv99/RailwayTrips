<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
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
            array('start_from' => '12:00:00','end_to' => '16:00:00','active' => '1','created_at' => $now, 'updated_at' => $now),
            array('start_from' => '16:00:00','end_to' => '23:00:00','active' => '1','created_at' => $now, 'updated_at' => $now),
            array('start_from' => '11:00:00','end_to' => '13:00:00','active' => '1','created_at' => $now, 'updated_at' => $now),
        ];

        Schedule::insert($for_insert);
    }
}
