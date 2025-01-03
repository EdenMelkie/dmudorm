<nav class="navbar navbar-expand-lg navbar-light" style="background-color: gray;">
    <div class="container-fluid">
        <!-- Toggler for responsive navbar -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Links on the left side -->
            <ul class="navbar-nav d-flex flex-row me-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="studentsDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Students
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="studentsDropdown">
                        <li> <a class="dropdown-item" href="{{ route('students.index') }}">View Students</a> </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="studentsDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Stud_Placement
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="studentsDropdown">
                        <li> <a class="dropdown-item" href="{{ route('stud_placements.index') }}">View Placements</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="emergencyRecordDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Emergency Record
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="emergencyRecordDropdown">
                        <li> <a class="dropdown-item" href="{{ route('emergencies.index') }}">View Emergency</a> </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="requestsDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Requests
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="requestsDropdown">
                        <li><a class="dropdown-item" href="{{ route('requests.index') }}">View Requests</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="reportsDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Reports
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="reportsDropdown">
                        <li><a class="dropdown-item" href="{{ route('reports.index') }}">Reports</a></li>
                    </ul>
                </li>

                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="employeesDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Employees
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="employeesDropdown">
                        <li><a class="dropdown-item" href="{{ route('employees.index') }}">Employees</a></li>
                    </ul>
                </li> -->

                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="proctorPlacementDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        ProctorPlacement
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="proctorPlacementDropdown">
                        <li><a class="dropdown-item" href="{{ route('proctor_placements.index') }}">ProctorPlacement</a>
                        </li>
                    </ul>
                </li> -->

                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="manageAccountsDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Manage Accounts
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="manageAccountsDropdown">
                        <li><a class="dropdown-item" href="{{ route('students.update_password') }}">Update Password</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('students.view_password') }}">View Password</a></li>
                        <li><a class="dropdown-item" href="{{ route('students.reset_password') }}">Reset Password</a>
                        </li>
                    </ul>
                </li> -->



            </ul>

            <!-- Logout Button on the Right -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" style="background-color: red;" href=" {{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>

        </div>
    </div>
</nav>


</nav>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand">Search</a>

    <!-- Search Form -->
    <form class="form-inline" action="{{ route('students.index') }}" method="GET">
        <input class="form-control mr-sm-2" type="search" name="id" placeholder="Search by ID" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <!-- public function index(Request $request)
    {
    // Check if the search parameter 'id' is present in the query
    $searchId = $request->input('id');

    // If there's a search ID, filter students by that ID
    if ($searchId) {
    $students = Student::where('id', $searchId)->get(); // You can also use 'first()' if you're expecting a single
    result
    } else {
    // If no search, show all students
    $students = Student::all();
    }

    // Return the students view with the students data
    return view('students.index', compact('students'));
    } -->
</nav>

<style>
/* Customizing the Navbar */
.navbar {
    padding: 10px 20px;
    background-color: #f8f9fa;
}

.navbar-brand {
    font-size: 24px;
    font-weight: bold;
    color: #007bff;
    margin-right: 20px;
}

/* Styling the Search Form */
.form-inline {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.form-control {
    width: 250px;
    /* Set the width of the search input */
    padding: 10px;
    font-size: 14px;
    border-radius: 5px;
}

/* Styling the Button */
.btn-outline-success {
    padding: 10px 20px;
    font-size: 14px;
    margin-left: 10px;
    border-radius: 5px;
}

.btn-outline-success:hover {
    background-color: #28a745;
    color: white;
}

/* Media Query for Responsiveness */
@media (max-width: 768px) {
    .form-inline {
        flex-direction: column;
        align-items: flex-start;
    }

    .form-control {
        width: 100%;
        margin-bottom: 10px;
    }

    .btn-outline-success {
        width: 100%;
    }
}
</style>
<style>
/* Custom background color for navbar */
.navbar {
    background-color: #4CAF50;
    /* Change this to any color you prefer */
}

/* Custom Styling for Students link */
.students-link {
    font-weight: bold;
    color: orangered;
    text-decoration: none;
    padding: 0.5rem 1rem;
}

.students-link:hover {
    color: #0056b3;
    text-decoration: underline;
}

/* Ensure the navbar items are displayed correctly */
.navbar-nav {
    display: flex;
    width: 100%;
}

/* Right-aligned navbar items */
.navbar-nav.ms-auto {
    margin-left: auto;
    display: flex;
    align-items: center;
}

/* Optional: Space between right-side links */
.navbar-nav.ms-auto .nav-item {
    margin-left: 10px;
}
</style>