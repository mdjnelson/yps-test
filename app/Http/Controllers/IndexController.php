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
        return view('index');
    }
}
