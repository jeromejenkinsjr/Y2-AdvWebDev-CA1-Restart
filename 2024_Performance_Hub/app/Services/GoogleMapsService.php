<?php

namespace App\Services;

use GuzzleHttp\Client;

class GoogleMapsService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
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

        if ($data['status'] === 'OK') {
            return $data['rows'][0]['elements'][0];
        }

        return null;
    }
}
