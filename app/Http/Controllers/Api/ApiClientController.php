<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleTourRequest;
use App\Http\Services\ScheduleTourService;
use App\Models\Properties;
use App\Models\Tours;
use Illuminate\Http\Request;

class ApiClientController extends Controller
{

    protected $scheduleTourService;


    public function __construct(ScheduleTourService $scheduleTourService)
    {
        $this->scheduleTourService = $scheduleTourService;

    }

    public function clientDashboard()
    {
        $user = auth()->user();
        $toursCount = Tours::where('uid', $user->uid)->count();

        return response()->json([
            'user' => $user,
            'tours_count' => $toursCount,
        ]);
    }

    public function tourView($pid)
    {
        try {
            $property = Properties::with(['propertyAgent', 'images'])->findOrFail($pid);

            return response()->json([
                'property' => $property,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Property not found.',
                'error' => $exception->getMessage(),
            ], 404);
        }
    }

    public function scheduleTour(ScheduleTourRequest $request)
    {
        try {
            $tourData = $request->validated();

            $existingTour = Tours::where('uid', auth()->user()->uid)
                ->where('pid', $tourData['pid'])
                ->first();

            if ($existingTour) {
                return response()->json([
                    'message' => 'You already have a scheduled tour for this property.',
                ], 400);
            }

            $this->scheduleTourService->createTour($tourData);

            return response()->json([
                'message' => 'Tour Scheduled',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Sorry, an error occurred. Please try again.',
                'error' => $exception->getMessage(),
            ], 500);
        }
    }

    public function tourHistory()
    {
        $uid = auth()->user()->uid;
        $tours = Tours::where('uid', $uid)
            ->with(['tourProperty', 'agent'])
            ->get();

        return response()->json([
            'tours' => $tours,
        ]);
    }
}
