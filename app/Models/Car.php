<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];


    public function model()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }
}
