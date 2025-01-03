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
<h1>Create New Request</h1>

<!-- Display error message temporarily if it exists -->
@if (session('error'))
<div class="alert alert-danger" id="error-message">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('requests.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="student_id">Student ID</label>
        @php
        $user = session('username'); // Check session value
        @endphp

        <!-- Debug session username -->
        @if (!$user)
        <div class="alert alert-danger">
            Error: No username found in session. Please log in again.
        </div>
        @endif
        <!-- <input type="text" name="student_id" id="student_id" class="form-control" placeholder="Enter Student ID"
            value="{{ session('username') }}" readonly> -->
        <input type="text" name="student_id" id="student_id" class="form-control" placeholder="Enter Student ID"
            value="{{ $user }}" readonly>

        <!-- <input type="text" name="student_id" id="student_id" class="form-control" value="{{ $user }}" readonly> -->

        @error('student_id')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
        @enderror
        <!-- Debug session username -->
        @if (!$user)
        <div class="alert alert-danger">
            Error: No username found in session. Please log in again.
        </div>
        @endif
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
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">

            <!-- <option value="Active">Active</option>
            <option value="Inactive">Inactive</option> -->
            <option value="Pending">Pending</option>
            <!-- <option value="Completed">Completed</option> -->
        </select>
    </div>


    <div class="form-group">
        <label for="comment">Comment</label>
        <textarea name="comment" id="comment" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="purpose">Purpose</label>
        <textarea name="purpose" id="purpose" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="reason">Reason</label>
        <textarea name="reason" id="reason" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Send Request</button>
</form>

<!-- Inline CSS -->
<style>
h1 {
    text-align: center;
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-size: 16px;
    font-weight: bold;
    color: #333;
}

.form-control {
    width: 100%;
    padding: 8px 12px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 5px;
}

.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 20px;
}

.btn-primary:hover {
    background-color: #0056b3;
}

form {
    max-width: 600px;
    margin: 0 auto;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Optional: Add custom style for the alert */
#error-message {
    display: none;
}
</style>

<!-- jQuery Script to Hide the Error Message After Some Time -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Show the error message if it exists
    if ($("#error-message").length) {
        $("#error-message").fadeIn(500).delay(3000).fadeOut(
            500); // Fade in for 500ms, stay for 3 seconds, then fade out in 500ms
    }
});
</script>

@endsection