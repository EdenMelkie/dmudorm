@php
$userType = session('userType');
$layout = match ($userType) {
'Admin' => 'layouts.appadd',
'Student' => 'layouts.appstd',
'Manager' => 'layouts.appman',
'Proctor' => 'layouts.appproc',
default => 'layouts.invalid',
};
@endphp

@extends($layout)

@section('content')
<div class="container">
    <h1 style="font-size: 2rem; margin-bottom: 20px; text-align: center;">Employee List</h1>
    @if ($userType=='Manager'||$userType=='Admin')
    <a href="{{ route('employees.create') }}"
        style="display: inline-block; margin-bottom: 20px; padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px; font-size: 16px; transition: background-color 0.3s;">
        Add Employee
    </a>
    @endif

    <table style="width: 100%; border-collapse: collapse; font-size: 16px;">
        <thead>
            <tr style="background-color: #f8f9fa;">
                <th style="padding: 10px; text-align: left; border-bottom: 2px solid #dee2e6;">Emp ID</th>
                <th style="padding: 10px; text-align: left; border-bottom: 2px solid #dee2e6;">Email</th>
                <th style="padding: 10px; text-align: left; border-bottom: 2px solid #dee2e6;">First Name</th>
                <th style="padding: 10px; text-align: left; border-bottom: 2px solid #dee2e6;">Last Name</th>
                <th style="padding: 10px; text-align: left; border-bottom: 2px solid #dee2e6;">Role</th>
                <th style="padding: 10px; text-align: left; border-bottom: 2px solid #dee2e6;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #dee2e6;">{{ $employee->emp_id }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #dee2e6;">{{ $employee->email }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #dee2e6;">{{ $employee->first_name }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #dee2e6;">{{ $employee->last_name }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #dee2e6;">{{ $employee->user->userType }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #dee2e6;">

                    <!-- View Button -->
                    <a href="{{ route('employees.show', $employee->emp_id) }}"
                        style="padding: 8px 15px; background-color: #6c63ff; color: white; text-decoration: none; border-radius: 5px; margin-right: 5px;">
                        View
                    </a>
                    @if (session('userType') === 'Admin' || session('userType') === 'Manager')

                    <!-- Edit Button -->
                    <a href="{{ route('employees.edit', $employee->emp_id) }}"
                        style="padding: 8px 15px; background-color: #ffc107; color: white; text-decoration: none; border-radius: 5px; margin-right: 5px;">
                        Edit
                    </a>

                    <!-- Delete Button -->

                    <form action="{{ route('employees.destroy', $employee->emp_id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            style="padding: 8px 15px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer;"
                            onclick="return confirm('Are you sure you want to delete this employee?')">
                            Delete
                        </button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection