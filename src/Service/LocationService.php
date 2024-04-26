
<?php
// src/Service/LocationService.php


use GuzzleHttp\Client;

class LocationService
{
    private $httpClient;

    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getCoordinates($address)
    {
        $apiKey = 'VOTRE_CLE_API';
        $url = "https://api.localisation.com/geocode/json?address=$address&key=$apiKey";

        $response = $this->httpClient->request('GET', $url);

        $data = json_decode($response->getBody(), true);

        // Traitez les données de réponse selon vos besoins
        $latitude = $data['results'][0]['geometry']['location']['lat'];
        $longitude = $data['results'][0]['geometry']['location']['lng'];

        return ['latitude' => $latitude, 'longitude' => $longitude];
    }
}
