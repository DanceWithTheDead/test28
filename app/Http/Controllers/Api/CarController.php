<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|string|max:255',
            'model_name' => 'required|string|max:255',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'mileage' => 'nullable|integer|min:0',
            'color' => 'nullable|string|max:100',
        ]);
        try {
            $car = $this->carService->createCar($validated);
            return response()->json($car, 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create car',
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
        //
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
