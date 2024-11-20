<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'make_id',
        'model_id',
        'price',
        'mileage',
        'year',
        'condition',
        'description',
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
