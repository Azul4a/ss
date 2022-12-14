@extends('layouts.main')
@section('content')
    <h3>Product Edit Page</h3>

    <form action="{{ route('product.update', $product->id) }}" method="POST">
        @csrf
        @method('patch')

        <div class="row mb-3">
            <div class="col-sm-10">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                    value="{{ old('title', $product->title) }}">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-10">
                <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                <textarea name="short_description" type="text" class="form-control" id="short_description"
                    placeholder="Short Description">{{ old('short_description   ', $product->short_description) }}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <select name="status" class="form-select" aria-label="Default select example">
                    <option value="{{ old('status', $product->status) }}" selected>{{ old('status', $product->status) }}
                    </option>
                    <option value="In Stock">In Stock</option>
                    <option value="Out Of Stock">Out Of Stock</option>
                    <option value="Back Order">Back Order</option>
                </select>
            </div>
            <div class="col">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <input type="number" step="0.01" class="form-control" name="price" placeholder="Price"
                    aria-label="Price" value="{{ old('price', $product->price) }}">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row mb-3">

            <div class="col">
                <div class="col">
                    <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                    <select name="category_id" class="form-select" aria-label="Default select example">
                        @foreach ($categories as $category)
                            <option value="{{ old('category_id', $category->id) }}"
                                {{ old('category_id', $product->category->id) == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="ptags" class="col-sm-2 col-form-label">Tags</label>
                    <select name="ptags[]" multiple class="form-select" aria-label="Default select example">
                        @foreach ($ptags as $tag)
                            <option
                                @foreach ($product->ptags as $productTag)
                                    @if (!old('ptags'))
                                        {{ $productTag->id == $tag->id ? 'selected' : '' }}
                                    @endif
                                    {{ collect(old('ptags'))->contains($tag->id) ? 'selected' : '' }}

                                @endforeach
                                value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="sale_price" class="col-sm-2 col-form-label">Sale Price</label>
                <input type="number" step="0.01" class="form-control" name="sale_price" placeholder="Sale Price"
                    aria-label="Sale Price" value="{{ old('sale_price', $product->sale_price) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="thumbnail" class="col-sm-2 col-form-label">Image</label>
                <input type="text" name="thumbnail" class="form-control" id="thumbnail" placeholder="Url"
                    value="{{ old('thumbnail', $product->thumbnail) }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
