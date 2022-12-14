<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $city = City::find(1);
        dump($city);
        dump($city->name);
        dump($city->about);
        dump($city->population);
    }
}
