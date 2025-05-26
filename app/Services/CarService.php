<?php

namespace App\Services;

use App\Models\Car;
class CarService
{
    public function __construct(
        private BrandService $brandService,
        private CarModelService $carModelService
    )
    {
    }

    public function createCar(array $data): Car
    {
        $brand = $this->brandService->firstOrCreate($data['brand_name']);
        $model = $this->carModelService->firstOrCreate($data['model_name'], $brand);

        return Car::create([
           'model_id' => $model->id,
            'year' => $data['year'] ?? null,
            'mileage' => $data['mileage'] ?? null,
            'color' => $data['color'] ?? null,
        ]);
    }
}
