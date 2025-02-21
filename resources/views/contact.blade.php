@extends('layouts.layout')

@section('content')
<section class="contact fade-in">
    <!-- Header Banner -->
    <div class="banner text-white" style="background: linear-gradient(to bottom, lightblue, white); padding: 60px; text-align: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h1 class="display-4" style="color: #333; font-weight: bold;">Get in Touch</h1>
        <p class="lead" style="color: #333; font-size: 1.2rem; line-height: 1.6; max-width: 800px; margin: 0 auto;">
            We’d love to hear from you! Whether you have questions, feedback, or just want to say hello, feel free to reach out.
        </p>
    </div>
    
    <!-- Contact Section -->
    <div class="container py-5">
        <div class="row">
            <!-- Contact Information -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 10px; background-color: #f9f9f9;">
                    <h5 class="text-success mb-4 font-weight-bold">Contact Information</h5>
                    <p><i class="fas fa-map-marker-alt text-success"></i> Kigali, Rwanda</p>
                    <p><i class="fas fa-envelope text-success"></i> rightforyoung2019@gmail.com</p>
                    <p><i class="fas fa-phone-alt text-success"></i> +250786847371</p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-8">
                <div class="form-wrapper p-4 border rounded shadow-sm" style="background: linear-gradient(to bottom, #e3f2fd, white);">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <!-- Name Field -->
                        <div class="form-group">
                            <label for="name" class="font-weight-bold text-success">Your Name</label>
                            <input type="text" id="name" name="name" class="form-control p-3 border-success" placeholder="Enter your name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="form-group">
                            <label for="email" class="font-weight-bold text-success">Your Email</label>
                            <input type="email" id="email" name="email" class="form-control p-3 border-success" placeholder="Enter your email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Message Field -->
                        <div class="form-group">
                            <label for="message" class="font-weight-bold text-success">Your Message</label>
                            <textarea id="message" name="message" class="form-control p-3 border-success" rows="5" placeholder="Write your message here..." required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-success btn-block py-3 mt-4 font-weight-bold shadow-sm" style="font-size: 16px;">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="container py-5">
        <h3 class="text-center text-success font-weight-bold mb-4">Find Us Here</h3>
        {{-- <div id="map" style="height: 400px; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"></div> --}}
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15950.003100847824!2d30.1006848!3d-1.9529727999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2srw!4v1736323200515!5m2!1sen!2srw" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>



@endsection
