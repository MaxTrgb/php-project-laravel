@extends('templates.main')

@section('content')
    <h1>Products</h1>


    {{-- <a href="{{route('products.create')}}" class="btn btn-primary">Create product</a> --}}

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>product</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><img src="{{asset($product->image)}}" alt="" width="100"></td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->category->name}}</td>
                <td>
                    <a href="{{route('products.edit', $product->id)}}" class="btn btn-warning">Edit</a>
                    <form action="{{route('products.destroy', $product->id)}}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>    
    </table>

    {{$products->links()}}

@endsection