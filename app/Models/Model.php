<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_ extends Model
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
    //Relatiionship with User
    // public function user(){

    //     return $this->belongsTo(User::class);
    // }
    //Relatiionship with Make
    public function make(){

        return $this->belongsTo(Make::class);
    }

    // //Relatiionship with Images
    // public function images()
    // {
    //     return $this->hasMany(Image::class);
    // }

    //Relatinship with Vehicles
    public function vehicles(){
        return $this->belongsTo(Vehicle::class);
    }

}
