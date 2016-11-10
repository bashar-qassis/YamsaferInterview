<?php

namespace App\Http\Controllers;

use App\City;
use App\Hotel;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCity($cityId)
    {
        //returns city by city id
        $city = City::find($cityId);
        return response()->json(['City' => $city]);
    }

    public function getCheapestHotel($countryId, $cityId)
    {
        //returns cheapest hotel inside city using city id
        $hotel = City::find($cityId)->hotels()->cheapest()->first();
        return response()->json(['hotel' => $hotel]);
    }
}
