<?php

namespace App\Services;

use App\Contracts\DataServiceInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class PunkBeerDataService implements DataServiceInterface
{
    private string $endPoint = 'https://api.punkapi.com/v2/beers/';

    public function callApi(string $query): Response
    {
        return Http::get($this->endPoint, ['beer_name' => $query]);
    }
}
