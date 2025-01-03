<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fill Emergency Form</title>
    <!-- Add Bootstrap CSS for styling (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f7f9fc;
        /* Light blue-gray background for the page */
        color: #333;
        /* Darker text color for readability */
        font-family: Arial, sans-serif;
    }

    .form-container {
        width: 100%;
        /* Ensures responsiveness */
        max-width: 100px;
        /* Restricts the maximum width */
        margin: 100px auto;
        /* Centers the form on the page */
        background: #ffffff;
        /* White background for the form */
        border: 1px solid #e0e0e0;
        /* Subtle border for the form */
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Soft shadow for depth */
    }

    .form-container h1 {
        color: #007bff;
        /* Blue color for the title */
        font-size: 1.5rem;
    }

    .btn-primary {
        background-color: #007bff;
        /* Blue button color */
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        /* Darker blue on hover */
        border-color: #0056b3;
    }

    .fixed-header,
    .fixed-footer {
        position: fixed;
        left: 0;
        width: 100%;
        background-color: #007bff;
        /* Blue background for the header/footer */
        color: #ffffff;
        /* White text color */
        padding: 10px 20px;
        z-index: 1000;
        /* Ensure it stays above other elements */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Optional shadow for depth */
    }

    .fixed-header {
        top: 0;
    }

    .fixed-footer {
        bottom: 0;
    }
    </style>

</head>

<body>
    <!-- Include header -->
    <div class="fixed-header">
        @php
        $userType = session('userType');
        $layout = match ($userType) {
        'Admin' => 'partials.headeradd',
        'Student' => 'partials.headerstd',
        'Manager' => 'partials.headerm',
        'Proctor' => 'partials.headerp',
        default => 'partials.header', };
        @endphp
        @include($layout)
    </div>
    <div class="container mt-5 form-container">
        <h1 class="text-center"><strong>Emergency Form</strong></h1>
        <form action="{{ route('emergency-form') }}" method="POST">
            @csrf
            <!-- CSRF token for form security -->

            <!-- ID  -->
            <div class="mb-3">
                <label for="id" class="form-label">User Name/ID</label>
                <input type="text" id="id" name="id" class="form-control" required>
            </div>

            <!-- First Name -->
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" id="first_name" name="first_name" class="form-control" required>
            </div>

            <!-- Second Name -->
            <div class="mb-3">
                <label for="second_name" class="form-label">Second Name</label>
                <input type="text" id="second_name" name="second_name" class="form-control">
            </div>

            <!-- Last Name -->
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="form-control" required>
            </div>

            <!-- address -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <!-- Region -->
            <div class="mb-3">
                <label for="region" class="form-label">region</label>
                <input type="text" id="region" name="region" class="form-control" required>
            </div>

            <!-- Zone -->
            <div class="mb-3">
                <label for="zone" class="form-label">Zone</label>
                <input type="text" id="Zone" name="password" class="form-control" required>
            </div>

            <!-- Department -->
            <div class="mb-3">
                <label for="woreda" class="form-label">Woreda</label>
                <input type="text" id="woreda" name="woreda" class="form-control" required>
            </div>

            <!-- Gender -->
            <div class="mb-3">
                <label for="kebele" class="form-label">Kebele</label>
                <input type="text" id="kebele" name="kebele" class="form-control" required>
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input id="phone" type="number" name="phone" class="form-control">
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Fill a Form</button>
            </div>
        </form>
    </div>

    <!-- Include header -->
    <div class="fixed-footer">
        @include('partials.footer')
    </div>
    <!-- Add Bootstrap JS for interactivity (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>