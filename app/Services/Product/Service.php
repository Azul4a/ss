<?php

namespace App\Services\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class Service
{
    public function store($data) {
        $ptags = $data['ptags'];
        unset($data['ptags']);
        
        $product = Product::create($data);
        $product->ptags()->attach($ptags);
        
    }

    public function update($product, $data) {
        
        $ptags = $data['ptags'];
        unset($data['ptags']);

        $product->update($data);
        $product->ptags()->sync($ptags);

    }
}
