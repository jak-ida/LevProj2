<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'make_id'
    ];

    // //Relationship with Vehicles
    // public function vehicles(){
    //     return $this->belongsTo(Vehicle::class, 'vehicle_id');
    // }

    //Relatiionship with Model
    public function model(){
        return $this->hasMany(Model::class, 'model_id');
    }
}
