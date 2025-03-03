@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Create Company</h1>

    <form action="{{ route('admin.companies.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="form-group">
            <label for="name">Company Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            @error('email')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}">
            @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label for="website">Website:</label>
            <input type="url" id="website" name="website" class="form-control" value="{{ old('website') }}">
            @error('website')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label for="industry">Industry:</label>
            <input type="text" id="industry" name="industry" class="form-control" value="{{ old('industry') }}" required>
            @error('industry')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <textarea id="address" name="address" class="form-control" required>{{ old('address') }}</textarea>
            @error('address')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label for="registration_certificate">Certificate (Optional):</label>
            <input type="file" id="registration_certificate" name="registration_certificate" class="form-control">
            @error('registration_certificate')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <!-- New Fields -->
        <div class="form-group">
            <label for="mission">Mission:</label>
            <textarea id="mission" name="mission" class="form-control">{{ old('mission') }}</textarea>
            @error('mission')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label for="target">Target:</label>
            <textarea id="target" name="target" class="form-control">{{ old('target') }}</textarea>
            @error('target')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label for="achievements">Achievements:</label>
            <textarea id="achievements" name="achievements" class="form-control">{{ old('achievements') }}</textarea>
            @error('achievements')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label for="number_of_employees">Number of Employees:</label>
            <input type="number" id="number_of_employees" name="number_of_employees" class="form-control" value="{{ old('number_of_employees') }}">
            @error('number_of_employees')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label for="education_level">Education Level (NAMA Degree, etc.):</label>
            <input type="text" id="education_level" name="education_level" class="form-control" value="{{ old('education_level') }}">
            @error('education_level')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label for="company_experience">Company Experience:</label>
            <textarea id="company_experience" name="company_experience" class="form-control">{{ old('company_experience') }}</textarea>
            @error('company_experience')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label for="partners">Partners (if any):</label>
            <textarea id="partners" name="partners" class="form-control">{{ old('partners') }}</textarea>
            @error('partners')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <button type="submit" class="btn btn-success">Save Company</button>
    </form>
</div>
@endsection
