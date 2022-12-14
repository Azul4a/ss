@extends('layouts.main')
@section('content')

    <div>
        <div>{{ $post->id }}. {{ $post->title }}</div>
        <div>{{ $post->content }}</div>
    </div>

    <a href="{{ route('post.index') }}" class="btn btn-primary">Back</a>

@endsection
