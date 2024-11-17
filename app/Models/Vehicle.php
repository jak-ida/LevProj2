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
    ];

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
        return $this->belongsTo(Model::class, 'model_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
