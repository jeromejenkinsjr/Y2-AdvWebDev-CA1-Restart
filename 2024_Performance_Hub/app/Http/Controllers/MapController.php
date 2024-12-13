<?php

namespace App\Http\Controllers;

use App\Services\GoogleMapsService;
use Illuminate\Http\Request;

class MapController extends Controller
{
    protected $googleMapsService;

    public function __construct(GoogleMapsService $googleMapsService)
    {
        $this->googleMapsService = $googleMapsService;
    }

    public function showDistance(Request $request)
    {
        $origin = $request->input('origin'); // e.g., "New York, NY"
        $destination = $request->input('destination'); // e.g., "Los Angeles, CA"

        $distanceInfo = $this->googleMapsService->getDistance($origin, $destination);

        if ($distanceInfo) {
            return response()->json([
                'distance' => $distanceInfo['distance']['text'],
                'duration' => $distanceInfo['duration']['text'],
            ]);
        }

        return response()->json(['error' => 'Unable to calculate distance']);
    }
}
