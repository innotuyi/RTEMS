@extends('admin.layout')

@section('content')
    <div class="container">
        <h1>Edit Company</h1>

        <form action="{{ route('admin.companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Company Name:</label>
                <input type="text" id="name" name="name" class="form-control"
                    value="{{ old('name', $company->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control"
                    value="{{ old('email', $company->email) }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" class="form-control"
                    value="{{ old('phone', $company->phone) }}">
            </div>

            <div class="form-group">
                <label for="website">Website:</label>
                <input type="url" id="website" name="website" class="form-control"
                    value="{{ old('website', $company->website) }}">
            </div>

            <div class="form-group">
                <label for="industry">Industry:</label>
                <input type="text" id="industry" name="industry" class="form-control"
                    value="{{ old('industry', $company->industry) }}" required>
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
                <label for="mission">Mission:</label>
                <textarea id="mission" name="mission" class="form-control">{{ old('mission', $company->mission) }}</textarea>
            </div>

            <div class="form-group">
                <label for="target">Target:</label>
                <textarea id="target" name="target" class="form-control">{{ old('target', $company->target) }}</textarea>
            </div>

            <div class="form-group">
                <label for="achievements">Achievements:</label>
                <textarea id="achievements" name="achievements" class="form-control">{{ old('achievements', $company->achievements) }}</textarea>
            </div>

            
            <div class="form-group">
                <label for="achievements">Services:</label>
                <textarea id="service" name="service" class="form-control">{{ old('service', $company->service) }}</textarea>
            </div>

            <div class="form-group">
                <label for="number_of_employees">Number of Employees:</label>
                <input type="number" id="number_of_employees" name="number_of_employees" class="form-control" value="{{ old('number_of_employees', $company->number_of_employees) }}">
            </div>

            <div class="form-group">
                <label for="education_level">Education Level:</label>
                <input type="text" id="education_level" name="education_level" class="form-control" value="{{ old('education_level', $company->education_level) }}">
            </div>

            <div class="form-group">
                <label for="company_experience">Company Experience (Years):</label>
                <input type="number" id="company_experience" name="company_experience" class="form-control" value="{{ old('company_experience', $company->company_experience) }}">
            </div>

            <div class="form-group">
                <label for="partners">Partners:</label>
                <textarea id="partners" name="partners" class="form-control">{{ old('partners', $company->partners) }}</textarea>
            </div>

            @if(auth()->user()->role == 'admin')
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

            <div class="form-group" id="reason-group" style="display: none;">
                <label for="reason">Reason:</label>
                <textarea id="reason" name="reason" class="form-control" placeholder="Please provide a reason for rejection">{{ old('reason', $company->reason) }}</textarea>
            </div>
            @endif

            <script>
                document.getElementById('status').addEventListener('change', function() {
                    const status = this.value;
                    const reasonGroup = document.getElementById('reason-group');
                    if (status === 'rejected') {
                        reasonGroup.style.display = 'block';
                    } else {
                        reasonGroup.style.display = 'none';
                    }
                });

                if (document.getElementById('status').value === 'rejected') {
                    document.getElementById('reason-group').style.display = 'block';
                }
            </script>

            <button type="submit" class="btn btn-warning">Update Company</button>
        </form>
    </div>
@endsection
