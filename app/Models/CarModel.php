<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [

        'make_id',
        'name',
    ];

    //Relationship with Makes
    public function make(){
        return $this->belongsTo(Make::class, 'make_id');
    }

    //Relationship with Vehicles
    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }
}
