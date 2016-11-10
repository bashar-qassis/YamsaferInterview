<?php

namespace App\Http\Controllers;

use App\Country;
use App\City;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getCountries()
    {
        //returns all countries
        $countries = Country::orderBy('name', 'desc')->get();
        return response()->json(['countries' => $countries], 200);
    }

    public function getCities($countryId)
    {
        //returns list of cities in country
        $cities = City::where('country_Id', '=', $countryId)->get();
        return response()->json(['cities' => $cities], 200);
    }

    public function getCountry($countryId)
    {
        //returns country by id
        $country = Country::find($countryId);
        $cities = $country->cities();
        return response()->json(['country' => $country, 'cities' => $cities], 200);
    }

    public function getCheapestHotel($countryId)
    {
        //return cheapest hotel
        $hotel = Country::find($countryId)->hotels()->cheapest()->first();
        return response()->json(['hotel' => $hotel], 200);
    }

    public function fetchCountries()
    {
        //fetches countries from Yamsafer API to local database
        $client = new Client();
        $json = $client->get("https://api-staging.yamsafer.me/admin/countries");
        $data = \GuzzleHttp\json_decode($json->getBody());

        $data = $data->countries->data;

        for ($x = 0; $x <= 14; $x++) {
            $country = new Country();
            $country->name = $data[$x]->translations->en->name;
            $country->currency = $data[$x]->currency_code;
            $country->save();
        }

        }
}
