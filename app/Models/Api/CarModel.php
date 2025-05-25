<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
