@extends('layouts.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Register</h2>
            <form>
                <div class="mb-3">
                    <label class="form-label">Company Name</label>
                    <input type="text" class="form-control" placeholder="Enter your company name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
            <p class="mt-3 text-center">Already have an account? <a href="/login">Login</a></p>
        </div>
    </div>
</div>
@endsection