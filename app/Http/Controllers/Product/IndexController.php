<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends BaseController
{

    public function __invoke()
    {
        $products = Product::paginate(10);
        return view('product.index', compact('products'));
    }
}
