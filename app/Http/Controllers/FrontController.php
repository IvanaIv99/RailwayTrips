<?php

namespace App\Http\Controllers;


use App\Models\CityStation;

class FrontController extends Controller
{
    public function index(){

        $city_stations =  CityStation::all()->toArray();

        $data = [
            'city_stations' => $city_stations
        ];

        return view('pages.home', $data);
    }


}
