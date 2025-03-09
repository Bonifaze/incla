<nav class="main-header navbar navbar-expand navbar-white navbar-light mb-2" style="padding-bottom: 1.4rem;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="color: #c95b28;" data-widget="pushmenu" href="#"><i class="fas fa-bars fa-2x"></i></a>
        </li>

    </ul>
<style>
        .navbar-nav.right-navbar-links {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .navbar-nav .nav-item {
            list-style: none;
        }

        .dropdown-btn,
        .users {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dropdown-menu {
            left: auto !important;
            right: 0 !important;
        }

        .nav-item {
            margin-left: 16px;
        }
    </style>
    <!-- SEARCH FORM -->


    <!-- Right navbar links -->



    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" style="color: #c95b28;" href="#" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ Auth::guard('student')->user()->full_name }}</a>

        </li>
        <li class="nav-item">
            <div class="dropdown">
                <button class="users arrow-down-icon border border-gray-100 rounded-circle p-2 position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="position-relative">
                        <img src="data:image/png;base64,{{ Auth::guard('student')->user()->passport }}" alt="User Image" class="h-10 w-20 rounded-circle" style="width: 20px;">
                        <span class="activation-badge position-absolute w-2 h-2 bg-success rounded-circle" style="bottom: 0; right: 0; border: 2px solid white;"></span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow-lg p-0 mt-2" style="border-radius: 12px; max-width: 320px;">
                    <div class="card border-0 rounded-12 overflow-hidden box-shadow-custom" style="background: #e5e5e5; padding: 0;">
                        <div class="card-body py-4 px-3 text-center">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <img src="data:image/png;base64,{{ Auth::guard('student')->user()->passport }}" alt="User Image" class="rounded-circle mb-2" style="width: 60px; height: 60px; object-fit: cover;">
                                <h5 class="mb-1 text-dark">{{ Auth::guard('student')->user()->full_name }}</h5>
                                <p class="text-muted mb-0">{{ Auth::guard('student')->user()->username }}</p>
                            </div>

                            <div class="border-top pt-3">
                                <ul class="list-unstyled">
                                    {{-- <li class="mb-3">
                                        <a href="{{ route('student.profile') }}" class="d-flex align-items-center py-2 px-3 text-dark text-decoration-none hover-bg-light rounded">
                                            <i class="fas fa-user-circle me-2 text-primary"></i> Profile
                                        </a>
                                    </li>
                                    <li class="mb-3">
                                        <a href="setting.html" class="d-flex align-items-center py-2 px-3 text-dark text-decoration-none hover-bg-light rounded">
                                            <i class="fas fa-cog me-2 text-primary"></i> Account Settings
                                        </a>
                                    </li> --}}
                                    <li class="mb-3">
                                        <a href="{{ route('student.logout') }}" class="d-flex align-items-center py-2 px-3 text-danger text-decoration-none hover-bg-light rounded" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-power-off me-2 text-danger"></i> Logout
                                            <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>


</nav>


<style>
    /* Profile Dropdown Menu */
.dropdown-menu {
    border-radius: 12px;
    max-width: 320px;
    padding: 0;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    background-color: #e5e5e5; /* White background for better contrast */
}

/* Profile Image and Layout */
.card-body {
    padding: 0;
    background-color: #f8f9fa; /* Light background for the profile card */
    text-align: center;
}

/* Align the profile image and text */
.card-body .d-flex {
    flex-direction: column;
}

.card-body img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 50%; /* Circular profile image */
    margin-bottom: 10px; /* Space between the image and the text */
}

/* Profile name styling */
.card-body h5 {
    font-size: 1.2rem;
    font-weight: 600;
    margin-top: 10px;
    color: #333; /* Dark text for profile name */
}

/* Username styling */
.card-body p {
    color: #6c757d; /* Muted gray for the username */
    font-size: 0.9rem;
}

/* Border between the profile and actions */
.border-top {
    border-top: 1px solid #e9ecef; /* Light border for separation */
}

/* Logout button styling */
.text-danger {
    color: #dc3545; /* Red color for logout button */
    font-weight: 600;
}

.text-danger:hover {
    color: #bb2d3b; /* Darker red on hover */
}

/* Hover effect for logout button */
.hover-bg-light:hover {
    background-color: #f1f1f1; /* Light gray background on hover */
    border-radius: 5px; /* Rounded corners on hover */
}

/* Card rounded corners */
.card {
    border-radius: 12px;
    overflow: hidden;
    background-color: #e5e5e5; /* White background for the dropdown card */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Shadow for depth */
}

</style>
