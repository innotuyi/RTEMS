@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Company</h1>

    <form action="{{ route('admin.companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Company Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $company->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $company->email) }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $company->phone) }}">
        </div>

        <div class="form-group">
            <label for="website">Website:</label>
            <input type="url" id="website" name="website" class="form-control" value="{{ old('website', $company->website) }}">
        </div>

        <div class="form-group">
            <label for="industry">Industry:</label>
            <input type="text" id="industry" name="industry" class="form-control" value="{{ old('industry', $company->industry) }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <textarea id="address" name="address" class="form-control" required>{{ old('address', $company->address) }}</textarea>
        </div>

        <div class="form-group">
            <label for="registration_certificate">Certificate (Optional):</label>
            <input type="file" id="registration_certificate" name="registration_certificate" class="form-control">
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" class="form-control">
                @foreach(['pending', 'approved', 'rejected'] as $status)
                    <option value="{{ $status }}" {{ old('status', $company->status) == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="user_id">Owner (User ID):</label>
            <input type="text" id="user_id" name="user_id" class="form-control" value="{{ old('user_id', $company->user_id) }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Update Company</button>
    </form>
</div>
@endsection
