<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityStation extends Model
{
    use HasFactory;

    protected $table = 'city_stations';
    public $timestamps = true;

    public function trips() {
        return $this->hasMany(CityStation::class);
    }
}
