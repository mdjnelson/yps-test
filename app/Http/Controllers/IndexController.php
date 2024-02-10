<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{
    public function index()
    {
        if (Auth::check()) {
            return view('index');
        }

        return redirect()->route('login');
    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $request = Request::create(route('getDataFromApi'), 'GET', ['search' => $query]);

        $dataResponse = app()->handle($request);

        if ($dataResponse->isSuccessful()) {
            $beers = (array)$dataResponse->getOriginalContent();
            if (!empty($beers)) {
                return view('index', ['beers' => $beers]);
            }

            return view('index', ['beers' => []]);
        }

        return view('index', ['error' => 'Error fetching data ...']);
    }
}
