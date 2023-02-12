<?php

namespace Database\Seeders;

use App\Models\CityStation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CityStationSeeder extends Seeder
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

            array('name' => 'Beograd ZS (SRB)',
                'city' => 'Beograd',
                'country' => 'SRB',
                'location' => 'Srbija',
                'phone' => '+381112636229',
                'description' => '',
                'active' => 1,'created_at' => $now, 'updated_at' => $now),

            array('name' => 'Cacak ZS (SRB)',
                'city' => 'Cacak',
                'country' => 'SRB',
                'location' => 'Srbija',
                'phone' => '+38132400099',
                'description' => '',
                'active' => 1,'created_at' => $now, 'updated_at' => $now),

            array('name' => 'Ljig ZS (SRB)',
                'city' => 'Ljig',
                'country' => 'SRB',
                'location' => 'Srbija',
                'phone' => '+381324000414',
                'description' => '',
                'active' => 1,'created_at' => $now, 'updated_at' => $now),
            array(
                'name' => 'Lazarevac ZS(SRB)',
                'city' => 'Lazarevac',
                'country' => 'SRB',
                'location' => 'Srbija',
                'phone' => '+38111557779',
                'description' => '',
                'active' => 1,
                'created_at' => $now, 'updated_at' => $now
            ),
            array(
                'name' => 'Novi Sad ŽS (BIH)',
                'city' => 'Novi Sad',
                'country' => 'SRB',
                'location' => 'Srbija',
                'phone' => '+3811474747',
                'description' => '',
                'active' => 1
            ,'created_at' => $now, 'updated_at' => $now
            ),

            array(

                'name' => 'Banjaluka ŽS (BIH)',
                'city' => 'Banjaluka',
                'country' => 'BIH',
                'location' => 'Bosna i Hercegovina',
                'phone' => '+3811576229',
                'description' => '',
                'active' => 1,
                'created_at' => $now, 'updated_at' => $now
            ),
            array(
                'name' => 'Sarajevo ŽS (BIH)',
                'city' => 'Sarajevo',
                'country' => 'BIH',
                'location' => 'Bosna i Hercegovina',
                'phone' => '+3811447477',
                'description' => '',
                'active' => 1
                ,'created_at' => $now, 'updated_at' => $now
            ),
        ];

        CityStation::insert($for_insert);
    }
}
