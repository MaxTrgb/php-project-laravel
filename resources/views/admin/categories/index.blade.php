@extends('templates.main')

@section('content')
    <h1>Categories</h1>


    <a href="{{route('categories.create')}}" class="btn btn-primary">Create Category</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$category->image}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->short_description}}</td>
                <td>
                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-warning">Edit</a>
                    <form action="{{route('categories.destroy', $category->id)}}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection