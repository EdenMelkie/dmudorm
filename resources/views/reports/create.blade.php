@php
$userType = session('userType');
$user = session('username');

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
<h1>Create New Report</h1>
<form action="{{ route('reports.store') }}" method="POST">
    @csrf
    <!-- <div class="form-group">
        <label for="report_id">Report ID</label>
        <input type="text" name="report_id" id="report_id" class="form-control" required>
    </div> -->

    @if ($userType==='Proctor')
    <div class="form-group">
        <label for="proctor_id">Proctor ID</label>
        <input type="text" name="proctor_id" id="proctor_id" value="{{$user}}" class="form-control" readonly required>
    </div>
    @elseif($userType==='Student')
    <div class="form-group">
        <label for="student_id">Student ID</label>
        <input type="text" name="student_id" id="student_id" value="{{$user}}" class=" form-control" required readonly>
    </div>
    @endif

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" style="padding: 10px; border-radius: 5px; width: 100%;">
            @if ($userType==='Student'||$userType==='Proctor')
            <option value="Pending">Pending</option>
            @endif
        </select>
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
        <label for="comment">Comment</label>
        <textarea name="comment" id="comment" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Send Report</button>
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
    max-width: 500px;
    margin: 0 auto;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>
@endsection