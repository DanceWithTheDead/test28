<?php

namespace App\Services;

use App\Models\Car;
class CarService
{
    public function __construct(
        protected BrandService $brandService,
        protected CarModelService $carModelService
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

    public function updateCar(Car $car, array $data)
    {
    }
}
