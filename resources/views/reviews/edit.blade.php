@extends('templates.main')

@section('content')
    <h1>Edit Review</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name', $review->name) }}" class="form-control">
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email', $review->email) }}" class="form-control">
        </div>

        <div>
            <label for="message">Message:</label>
            <textarea name="message" class="form-control">{{ old('message', $review->message) }}</textarea>
        </div>

        <div>
            <label for="rate">Rate (1-5):</label>
            <input type="number" name="rate" min="1" max="5" value="{{ old('rate', $review->rate) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 20px">Update</button>
    </form>
@endsection
