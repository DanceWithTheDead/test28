<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    protected $guarded = [];

    public function models()
    {
        return $this->hasMany(CarModel::class);
    }

}
