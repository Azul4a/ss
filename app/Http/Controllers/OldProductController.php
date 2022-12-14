<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create(Product $product) {
        return view('product/create');
    }

    public function store() {
        $data = request()->validate([
            'title' => 'string',
            'short_description' => 'string',
            'status' => 'string',
            'price' => 'integer',
            'sale_price' => 'integer',
            'thumbnail' => 'string',
        ]);
        Product::create($data);

        return redirect(route('product.index'));
    }

    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('product.index');
    }

    public function show(Product $product) {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product) {
        return view('product.edit', compact('product'));
    }

    public function update(Product $product) {
        $data = request()->validate([
            'title' => 'string',
            'short_description' => 'string',
            'status' => 'string',
            'price' => 'integer',
            'sale_price' => 'integer',
            'thumbnail' => 'string',
        ]);
        $product->update($data);
        return redirect()->route('product.show', $product->id);
    }
}
