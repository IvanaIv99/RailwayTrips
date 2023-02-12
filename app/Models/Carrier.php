<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    use HasFactory;

    protected $table = 'carriers';
    public $timestamps = true;

    public function trips() {
        return $this->hasMany(Trip::class);
    }
}
