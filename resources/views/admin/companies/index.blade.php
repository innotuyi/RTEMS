@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Company List</h1>

    <a href="{{ route('admin.companies.create') }}" class="btn btn-primary mb-3">Create Company</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Industry</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->industry }}</td>
                    <td>{{ ucfirst($company->status) }}</td>
                    <td>
                        <!-- Action Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="actionsDropdown{{ $company->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="actionsDropdown{{ $company->id }}">
                                <!-- Edit Action -->
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.companies.edit', $company->id) }}">
                                        Edit
                                    </a>
                                </li>
                    
                                <!-- Delete Action -->
                                <li>
                                    <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form>
                                </li>
                    
                                <!-- View Profile Action -->
                                <li>
                                    <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#viewCompanyModal{{ $company->id }}">
                                        View Profile
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </td>
                    
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    @foreach($companies as $company)
    <!-- Modal -->
    <div class="modal fade" id="viewCompanyModal{{ $company->id }}" tabindex="-1" aria-labelledby="viewCompanyLabel{{ $company->id }}" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewCompanyLabel{{ $company->id }}">Company Profile: {{ $company->name }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p><strong>Email:</strong> {{ $company->email }}</p>
            <p><strong>Phone:</strong> {{ $company->phone }}</p>
            <p><strong>Website:</strong> {{ $company->website }}</p>
            <p><strong>Industry:</strong> {{ $company->industry }}</p>
            <p><strong>Address:</strong> {{ $company->address }}</p>
            <p><strong>Services:</strong> {{ $company->service }}</p>
            <p><strong>Mission:</strong> {{ $company->mission }}</p>
            <p><strong>Target:</strong> {{ $company->target }}</p>
            <p><strong>Achievements:</strong> {{ $company->achievements }}</p>
            <p><strong>Employees:</strong> {{ $company->number_of_employees }}</p>
            <p><strong>Education Level:</strong> {{ $company->education_level }}</p>
            <p><strong>Experience:</strong> {{ $company->company_experience }}</p>
            <p><strong>Partners:</strong> {{ $company->partners }}</p>
            
            <!-- Certificate Link -->
            @if($company->registration_certificate)
                <p><strong>Certificate:</strong> 
                    <a href="{{ asset('storage/' . $company->registration_certificate) }}" target="_blank" class="btn btn-primary btn-sm">
                        View Certificate
                    </a>
                </p>
            @endif
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    
</div>
@endsection
