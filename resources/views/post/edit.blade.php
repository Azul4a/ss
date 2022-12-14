@extends('layouts.main')
@section('content')
    <div>
        this is post create page
    </div>


    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="row mb-3">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $post->title) }}">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="content" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea name="content" type="text" class="form-control" id="content">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="image" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="text" name="image" class="form-control" id="image" value="{{ old('image', $post->image) }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="likes" class="col-sm-2 col-form-label">Likes</label>
            <div class="col">
                <input type="number" name="likes" class="form-control" id="likes" value="{{ old('likes', $post->likes) }}">
            </div>

            <div class="col">
                <select name="category_id" class="form-select" aria-label="Default select example">
                    @foreach ($categories as $category)
                        <option 
                        {{ old('category_id', $post->category->id) == $category->id  ? 'selected' : '' }} value="{{ $category->id }}">
                        {{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col">
                <select name="tags[]" multiple class="form-select" aria-label="Default select example">
                    @foreach ($tags as $tag)
                        <option
                            @foreach ($post->tags as $postTag)
                                @if (!old('tags'))
                                    {{ $postTag->id == $tag->id ? 'selected' : '' }}
                                @endif
                                {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}

                            @endforeach
                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection