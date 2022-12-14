@extends('layouts.main')
@section('content')
    <h3>Product Create Page</h3>

    <form action="{{ route('product.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ old('title') }}">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-10">
                <textarea name="short_description" type="text" class="form-control" id="short_description"
                    placeholder="Short Description">{{ old('short_description') }}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <select name="status" class="form-select" aria-label="Default select example">
                    <option value="{{ old('status', 'In Stock') }}" selected>{{ old('status', 'In Stock') }}</option>
                    <option value="In Stock">In Stock</option>
                    <option value="Out Of Stock">Out Of Stock</option>
                    <option value="Back Order">Back Order</option>
                </select>
            </div>
            <div class="col">
                <input type="number" step="0.01" class="form-control" name="price" placeholder="Price"
                    aria-label="Price" value="{{ old('price') }}">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col">
                <input type="number" step="0.01" class="form-control" name="sale_price" placeholder="Sale Price"
                    aria-label="Sale Price" value="{{ old('sale_price') }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="thumbnail" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="text" name="thumbnail" class="form-control" id="thumbnail" placeholder="Url"
                    value="{{ old('thumbnail') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
