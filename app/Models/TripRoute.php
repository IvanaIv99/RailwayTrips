<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripRoute extends Model
{
    use HasFactory;

    protected $table = 'trip_routes';

    public $timestamps = true;

    public function stoppage() {
        return $this->hasOne(TripStoppage::class,'id','trip_stoppage_id');
    }
}
