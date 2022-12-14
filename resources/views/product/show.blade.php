@extends('layouts.main')
@section('content')
    <div class="card" style="width: 18rem;">
        <img src="{{ $product->thumbnail }}" class="card-img-top" alt="{{ $product->thumbnail }}">
        <div class="card-body">
            <h5 class="card-title">{{ $product->title }}</h5>
            <p class="card-text">{{ $product->status }}</p>
            <p class="card-text">{{ $product->price }}</p>
            <p class="card-text">{{ $product->short_description }}</p>
            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
@endsection
