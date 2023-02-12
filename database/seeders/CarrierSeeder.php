<?php

namespace Database\Seeders;

use App\Models\Carrier;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrierSeeder extends Seeder
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
            array('name' => 'Eurostar','phone' => '+35897445577','active' => '1','created_at' => $now, 'updated_at' => $now),
            array('name' => 'SNCF','phone' => '+3854111457','active' => '1','created_at' => $now, 'updated_at' => $now),
        ];

        Carrier::insert($for_insert);
    }
}
