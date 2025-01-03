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
                    <a class="nav-link dropdown-toggle" href="#" id="requestsDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Students
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="requestsDropdown">
                        <li><a class="dropdown-item" href="{{ route('students.index') }}">View </a></li>
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
                    <a class="nav-link dropdown-toggle" href="#" id="requestsDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Employees
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="requestsDropdown">
                        <li><a class="dropdown-item" href="{{ route('employees.index') }}">View Employees</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="employeesDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Block
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="employeesDropdown">
                        <li><a class="dropdown-item" href="{{ route('blocks.index') }}">Blocks</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="employeesDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Room
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="employeesDropdown">
                        <li><a class="dropdown-item" href="{{ route('rooms.index') }}">Rooms</a></li>
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="manageAccountsDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Manage own Accounts
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="manageAccountsDropdown">
                        <li><a class="dropdown-item" href="{{ route('students.update_password') }}">Update Password</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('students.reset_password') }}">Reset Password</a>
                        </li>
                    </ul>
                </li>



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