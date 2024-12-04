@extends('templates.main')

@section('content')
    <h1>Contacts</h1>
    
    @include('templates._errors')

    <form action="{{ route('sendEmail') }}" method="post">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
        </div>

        <div class="mb-3">
            <label for="message">Message:</label>
            <textarea name="message" value="{{ old('message') }}" class="form-control @error('message') is-invalid @enderror"></textarea>
            @error('message')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection
