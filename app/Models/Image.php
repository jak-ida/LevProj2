<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Image extends Model
    {
        use HasFactory;

        protected $fillable = [
            'vehicle_id',
            'path',
        ];

    //Relationship with Vehicles
    public function vehicles(){
        return $this->belongsTo(Vehicle::class,'image_id');
    }
}
