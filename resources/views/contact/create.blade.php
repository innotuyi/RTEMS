
@extends('layouts.layout')

@section('content')
<section class="contact">
    <div class="banner text-white" style="background: linear-gradient(to bottom, lightblue, white); padding: 50px; text-align: center;">
        <h1>Contact Us</h1>
    </div>

    <div class="container py-5">
        <!-- Display success message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Your Email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" class="form-control" rows="5" placeholder="Your Message" required>{{ old('message') }}</textarea>
                @error('message')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success mt-3">Send</button>
        </form>
    </div>
</section>
@endsection
