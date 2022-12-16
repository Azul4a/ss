<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\Product\FilterRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends BaseController
{

    public function __invoke(FilterRequest $request)
    {
        // $products = Product::paginate(10);

        $data = $request->validated();
        
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::filter($filter)->paginate(10);

        return view('product.index', compact('products'));
    }
}
