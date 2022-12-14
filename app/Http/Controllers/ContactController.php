<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return(view('contacts'));
    }
}
