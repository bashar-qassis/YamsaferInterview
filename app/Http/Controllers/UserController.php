<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getLocation()
    {
        $ip = Request()->ip();
        dd($ip);
        $location = geoip($ip);
        dd($location);
        return response()->json(['location' => $location->getLocation()]);
    }
}
