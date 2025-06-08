<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Models\Car;
use App\Http\Requests\UpdateCarRequest;
use App\Services\CarService;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct(
        private CarService $carService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Car::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest   $request)
    {

        try {
            $car = $this->carService->createCar($request->validated());
            return response()->json([
                'success' => true,
                'data' => $car,
                'message' => 'Машина создана'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка при создании машины',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $car = Car::find($car->id);
        return response()->json($car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        Car::destroy($car->id);
        return response()->json([
            'message' => 'Car has been deleted'
        ], 204);
    }
}
