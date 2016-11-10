<?php

namespace App\Http\Controllers;

use App\City;
use App\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function getHotels($cityId)
    {
        //returns hotels by city id
        $hotels = Hotel::where('cityId', '=', $cityId)->get();
        return response()->json(['hotels' => $hotels]);
    }
}
