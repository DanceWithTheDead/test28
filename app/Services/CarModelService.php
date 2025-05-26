<?php

namespace App\Services;

use App\Models\Brand;
use App\Models\CarModel;
class CarModelService
{
    public function firstOrCreate(string $name, Brand $brand): CarModel
    {
        return CarModel::firstOrCreate([
           'name' => $name,
           'brand_id' => $brand->id,
        ]);
    }
}
