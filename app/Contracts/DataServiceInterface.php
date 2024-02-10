<?php

namespace App\Contracts;

use Illuminate\Http\Client\Response;

interface DataServiceInterface
{
    public function callApi(string $query): Response;
}
