<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
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
        'image'
    ];

    // Automatically set user_id when creating a vehicle
    // protected static function booted()
    // {
    //     static::creating(function ($vehicle) {
    //         if (auth()->check()) {
    //             $vehicle->user_id = auth()->id();  // Set the logged-in user's ID automatically
    //         }
    //     });
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function make()
    {
        return $this->belongsTo(Make::class, 'make_id');
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
