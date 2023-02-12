<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripStoppage extends Model
{
    use HasFactory;

    protected $table = 'trip_stoppages';

    public $timestamps = true;

    public function trip() {
        return $this->belongsTo(Trip::class);
    }

    public function start_city_station() {
        return $this->belongsTo(CityStation::class,'start_city_station_id');
    }

    public function end_city_station() {
        return $this->belongsTo(CityStation::class,'end_city_station_id');
    }

    public function route() {
        return $this->belongsTo(TripRoute::class,'trip_stoppage_id');
    }
}
