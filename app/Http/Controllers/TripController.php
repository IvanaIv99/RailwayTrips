<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\TripStoppage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TripController extends FrontController
{

    public function searchTrips(Request $request)
    {
        $dayOff = Carbon::parse($request->departure)->format('w');
        $train_from = intval($request->train_from);
        $train_to = intval($request->train_to);
        $date_of_journey = $request->departure;

        //SERVER VALIDATION

            $empty_error_msg = function ($field) {
                return  response()->json(['success' => false,'data'=>'Please choose' . $field . '.']);
            };

            if($train_from == $train_to ){
                return response()->json(['success' => false,'data'=>"Train from and train to cant be the same."]);
            }

            if(empty($train_from)) return $empty_error_msg('train_from');

            if(empty($train_to)) return $empty_error_msg('train_to');

            if(empty($date_of_journey)) return $empty_error_msg('date_of_journey');


        //SEARCHING TRIPS
        $trips = Trip::with(["stoppages"])
                ->with(['carrier'])
                ->with(['routes.stoppage.start_city_station','routes.stoppage.end_city_station'])
                ->whereJsonDoesntContain('day_off', $dayOff)
                ->whereJsonContains('stoppages', [$train_from,$train_to])
                ->where('active', 1);

        //SEARCHING ROUTES
        $routes = TripStoppage::with(['start_city_station','end_city_station'])->where('start_city_station_id',$train_from)->where('end_city_station_id',$train_to);

        $trips_ids = $trips->pluck('id');
        $trips_array = $trips->get();

        //ERROR MSG IF TRIPS AND ROUTES ARE EMPTY
        $emptyMessage = 'There is no trip available';
        $empty_trips_message = function () use ($emptyMessage){
            return response()->json(['success' => false,'data'=>$emptyMessage]);
        };

        if(!count($trips_array)) $empty_trips_message();

        $check_routes = $routes->whereIn('trip_id',$trips_ids)->get();

        if(count($check_routes) == 0) return $empty_trips_message();


        // GETING RESPONSE OUT
        $keys = array("trip", "route");
        $res =  array_map(null,$trips_array->toArray(), $check_routes->toArray());
        $res = array_map(function ($e) use ($keys) {return array_combine($keys, $e);}, $res);

        return response()->json(['success' => true,'data' =>[
            'response' => $res,
            'date_of_journey' => $date_of_journey,
        ]]);

    }


}
