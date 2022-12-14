@extends('layouts.main')
@section('content')
    <a href="{{ route('product.create') }}" class="btn btn-primary mb-3" tabindex="-1" role="button" aria-disabled="true">Add
        New</a>

    <table class="table table-dark table-striped table-shadow">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Short Description</th>
                <th scope="col">Status</th>
                <th scope="col">Price</th>
                <th scope="col">Sale Price</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td><a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a></td>
                    <td>{{ $product->short_description }}</td>
                    <td>{{ $product->status }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->sale_price }}</td>
                    <td>{{ $product->thumbnail }}</td>
                    <td>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div>
        {{ $products->links() }}
    </div>
@endsection
