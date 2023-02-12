<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $table = 'trips';

    public $timestamps = true;

    protected $casts = [
        'day_off' => 'array',
        'stoppages' => 'array',
    ];

    protected $with = [
        'stoppages'
    ];

    public function stoppages() {
        return $this->hasMany(TripStoppage::class);
    }

    public function carrier() {
        return $this->belongsTo(Carrier::class, 'carrier_id');
    }

    public function schedule() {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    public function routes() {
        return $this->hasMany(TripRoute::class, 'trip_id');
    }
}
