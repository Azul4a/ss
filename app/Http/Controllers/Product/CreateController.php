<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CreateController extends BaseController
{

    public function __invoke()
    {
        return view('product/create');
    }
}
