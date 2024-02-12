<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class LogoutController extends BaseController
{
    public function logout(Request $request)
    {
        Auth::guard('sanctum')->user()->tokens()->delete();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    }
}
