<div class="form-group">
    <label for="name">Company Name:</label>
    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $company->name ?? '') }}" required>
</div>

<div class="form-group">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $company->email ?? '') }}" required>
</div>

<div class="form-group">
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $company->phone ?? '') }}">
</div>

<div class="form-group">
    <label for="website">Website:</label>
    <input type="url" id="website" name="website" class="form-control" value="{{ old('website', $company->website ?? '') }}">
</div>

<div class="form-group">
    <label for="industry">Industry:</label>
    <input type="text" id="industry" name="industry" class="form-control" value="{{ old('industry', $company->industry ?? '') }}" required>
</div>

<div class="form-group">
    <label for="address">Address:</label>
    <textarea id="address" name="address" class="form-control" required>{{ old('address', $company->address ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="registration_certificate">Certificate (Optional):</label>
    <input type="file" id="registration_certificate" name="registration_certificate" class="form-control">
</div>

<div class="form-group">
    <label for="status">Status:</label>
    <select id="status" name="status" class="form-control">
        @foreach(['pending', 'approved', 'rejected'] as $status)
            <option value="{{ $status }}" {{ (old('status', $company->status ?? 'pending') == $status) ? 'selected' : '' }}>
                {{ ucfirst($status) }}
            </option>
        @endforeach
    </select>
</div>
