@php
$userType = session('userType');
$layout = match ($userType) {
'Admin' => 'layouts.appadd',
'Student' => 'layouts.appstd',
'Manager' => 'layouts.appman',
'Proctor' => 'layouts.appproc',
default => 'layouts.app',
};
@endphp

@extends($layout)

@section('content')

<style>
/* Custom styles for the form page */
h1 {
    text-align: center;
    margin-bottom: 30px;
    color: #4CAF50;
}

.form-group label {
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
}

.form-group input {
    border-radius: 5px;
    padding: 12px;
    font-size: 14px;
    border: 1px solid #ccc;
    width: 100%;
    box-sizing: border-box;
}

.form-group input:focus {
    border-color: #4CAF50;
    outline: none;
}

.btn {
    padding: 12px 20px;
    font-size: 16px;
    border-radius: 5px;
    margin-top: 20px;
    display: inline-block;
    text-decoration: none;
}

.btn-primary {
    background-color: #4CAF50;
    color: white;
    border: none;
}

.btn-primary:hover {
    background-color: #45a049;
}

.btn-secondary {
    background-color: #f44336;
    color: white;
    border: none;
}

.btn-secondary:hover {
    background-color: #e53935;
}

/* Add padding to the form */
form {
    max-width: 600px;
    margin: 0 auto;
    padding: 30px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Responsive design adjustments */
@media (max-width: 600px) {
    .form-group input {
        font-size: 16px;
        padding: 14px;
    }

    .btn {
        font-size: 14px;
        padding: 10px 18px;
    }
}
</style>

<h1>Create Proctor Placement</h1>

<form method="POST" action="{{ route('proctor_placements.store') }}">
    @csrf

    <div class="form-group">
        <label for="emp_id">Employee ID</label>
        @php
        $user = session('username'); // Retrieve username from the session
        @endphp

        @if ($user)
        <input type="text" name="emp_id" id="emp_id" class="form-control" value="{{ $user }}" readonly>
        @else
        <div class="alert alert-danger mt-2">
            Error: No username found in session. Please log in again.
        </div>
        @endif

        @error('emp_id')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
        @enderror
    </div>


    <div class="form-group">
        <label for="year">Year</label>
        <input type="number" name="year" id="year" class="form-control" value="{{ old('year') }}">
    </div>

    <div class="form-group">
        <div class="form-group">
            <label for="date">Date and Time</label>
            <input type="text" name="date" id="date" class="form-control" required placeholder="dd/mm/yy hh:mm">
        </div>

        <script>
        // Function to format the date and time as dd/mm/yy hh:mm
        function formatDateTime(date) {
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0'); // months are 0-based
            const year = String(date.getFullYear()).slice(-2); // last 2 digits of the year
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');
            return `${day}/${month}/${year} ${hours}:${minutes}`;
        }

        // Get today's date and time
        const today = new Date();

        // Format the date and time as dd/mm/yy hh:mm
        const formattedDateTime = formatDateTime(today);

        // Set the value of the input field to today's date and time in dd/mm/yy hh:mm format
        document.getElementById('date').value = formattedDateTime;

        // If the form is submitted, you can convert the date and time back to yyyy-mm-dd hh:mm for storing in the database
        document.querySelector('form').addEventListener('submit', function() {
            const inputDateTime = document.getElementById('date').value;
            const [datePart, timePart] = inputDateTime.split(' '); // Split into date and time
            const [day, month, year] = datePart.split('/'); // Extract dd, mm, and yy
            const [hours, minutes] = timePart.split(':'); // Extract hours and minutes
            const formattedForDB =
                `20${year}-${month}-${day} ${hours}:${minutes}`; // Format as yyyy-mm-dd hh:mm

            // Set a hidden input field or modify the value before submitting (this is optional)
            // You can now send `formattedForDB` in the form
            console.log(formattedForDB); // This will print in yyyy-mm-dd hh:mm format, suitable for submission
        });
        </script>


    </div>


    <div class="form-group">
        <label for="attribute1">Attribute 1</label>
        <input type="text" name="attribute1" id="attribute1" class="form-control" value="{{ old('attribute1') }}">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="role" style="display: block; font-weight: bold;">Role:</label>
        <select name="role" id="role" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            <option value="">-- Select role --</option>
            <option value="Admin">Admin</option>
            <option value="Manager">Manager</option>
            <option value="Proctor">Proctor</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
    <a href="{{ route('proctor_placements.index') }}" class="btn btn-secondary">Cancel</a>
</form>


@endsection