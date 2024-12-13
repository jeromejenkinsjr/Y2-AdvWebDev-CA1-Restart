<?php

namespace App\Services;

use GuzzleHttp\Client;

class GoogleMapsService
{
    protected $client;

    public function __construct()
    {
        // Simplified Guzzle client setup
        $this->client = new Client([
            'verify' => false, // Disable SSL verification
        ]);
        
    }

    public function getDistance($origin, $destination)
{
    $apiKey = config('services.google.maps_api_key');
    $url = "https://maps.googleapis.com/maps/api/distancematrix/json";

    $response = $this->client->get($url, [
        'query' => [
            'origins' => $origin,
            'destinations' => $destination,
            'key' => $apiKey,
        ],
    ]);

    $data = json_decode($response->getBody(), true);

    // Log the API response
    \Log::info('Distance Matrix API Response:', ['response' => $data]);

    if ($data['status'] === 'OK' && isset($data['rows'][0]['elements'][0])) {
        return $data['rows'][0]['elements'][0];
    }

    \Log::error('Distance Matrix API Error', ['status' => $data['status'], 'error_message' => $data['error_message'] ?? 'None']);
    return null;
}

}
