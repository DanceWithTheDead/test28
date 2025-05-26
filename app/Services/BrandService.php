<?php

namespace App\Services;

use App\Models\Brand;

class BrandService
{
    public function firstOrCreate(string $name): Brand
    {
        return Brand::firstOrCreate(['name' => $name]);
    }
}
