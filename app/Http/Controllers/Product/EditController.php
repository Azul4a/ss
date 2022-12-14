<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Ptag;
use Illuminate\Http\Request;

class EditController extends BaseController
{

    public function __invoke(Product $product)
    {
        $categories = ProductCategory::all();
        $ptags = Ptag::all();
        return view('product.edit', compact('product', 'categories', 'ptags'));
    }
}
