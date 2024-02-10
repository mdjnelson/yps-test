<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Contracts\DataServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class DataController extends BaseController
{
    protected DataServiceInterface $service;

    public function __construct(DataServiceInterface $service)
    {
        $this->service = $service;
    }

    public function getDataFromApi(Request $request): array
    {
        $query = $request->input('search');

        $punkBeerResponse = $this->service->callApi($query);

        if ($punkBeerResponse->successful()) {
            $results = $punkBeerResponse->json();

            $beers = [];
            foreach ($results as $result) {
                $beer = new Beer(
                    $result['name'],
                    $result['tagline'],
                    $result['description'],
                    $result['abv'],
                    $result['ibu'],
                    $result['food_pairing'],
                    $result['image_url'],
                    $result['ingredients']
                );

                $beers[] = $beer->toArray();
            }

            return $beers;
        }

        return [];
    }
}
