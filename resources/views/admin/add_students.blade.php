<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Student</title>
    <!-- Add Bootstrap CSS for styling (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Register Student</h1>
        <form action="{{ route('register_student') }}" method="POST">
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

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                    required>
            </div>

            <!-- Entry Year -->
            <div class="mb-3">
                <label for="entry_year" class="form-label">Entry Year</label>
                <input type="number" id="entry_year" name="entry_year" class="form-control" required>
            </div>

            <!-- Department -->
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <input type="text" id="department" name="department" class="form-control" required>
            </div>

            <!-- Gender -->
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" name="gender" class="form-select" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <!-- Disability -->
            <div class="mb-3">
                <label for="disability" class="form-label">Disability</label>
                <select id="disability" name="disability" class="form-select">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea id="address" name="address" class="form-control"></textarea>
            </div>

            <!-- Citizenship -->
            <div class="mb-3">
                <label for="citizenship" class="form-label">Citizenship</label>
                <input type="text" id="citizenship" name="citizenship" class="form-control" required>
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Register Student</button>
            </div>
        </form>
    </div>

    <!-- Add Bootstrap JS for interactivity (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>