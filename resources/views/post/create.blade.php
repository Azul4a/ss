@extends('layouts.main')
@section('content')
    <div>
        this is post create page
    </div>


    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="content" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea name="content" type="text" class="form-control" id="content">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="image" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="text" name="image" class="form-control" id="image" value="{{ old('image') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <input type="number" name="likes" class="form-control" id="likes" placeholder="Likes" value="{{ old('likes') }}">
            </div>
            <div class="col">
                <select name="category_id" class="form-select" aria-label="Default select example">
                    {{-- <option selected value="{{ old('category_id') }}">{{ old('category_id') }}</option> --}}
                    @foreach ($categories as $category)
                        <option
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                        value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <select name="tags[]" multiple class="form-select" aria-label="Default select example">
                    @foreach ($tags as $tag)
                        <option
                            {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}
                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
