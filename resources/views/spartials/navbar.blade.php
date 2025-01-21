<nav class="main-header navbar navbar-expand navbar-white navbar-light mb-2" style="padding-bottom: 1.4rem;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="color: #c95b28;" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
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
        <li class="nav-item">
            <div class="dropdown">
                <button class="users arrow-down-icon border border-gray-100 rounded-circle p-2 position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="position-relative">
                        <img src="data:image/png;base64,{{ Auth::guard('student')->user()->passport }}" alt="User Image" class="h-10 w-20 rounded-circle" style="width: 20px;">
                        <span class="activation-badge position-absolute w-2 h-2 bg-success rounded-circle" style="bottom: 0; right: 0; border: 2px solid white;"></span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow-lg p-0 mt-2" style="border-radius: 12px; max-width: 320px;">
                    <div class="card border-0 rounded-12 overflow-hidden box-shadow-custom" style="background: #ffffff; padding: 0;">
                        <div class="card-body py-4 px-3 text-center">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <img src="data:image/png;base64,{{ Auth::guard('student')->user()->passport }}" alt="User Image" class="rounded-circle mb-2" style="width: 60px; height: 60px; object-fit: cover;">
                                <h5 class="mb-1 text-dark">{{ Auth::guard('student')->user()->full_name }}</h5>
                                <p class="text-muted mb-0">{{ Auth::guard('student')->user()->username }}</p>
                            </div>

                            <div class="border-top pt-3">
                                <ul class="list-unstyled">
                                    <li class="mb-3">
                                        <a href="{{ route('student.profile') }}" class="d-flex align-items-center py-2 px-3 text-dark text-decoration-none hover-bg-light rounded">
                                            <i class="fas fa-user-circle me-2 text-primary"></i> Profile
                                        </a>
                                    </li>
                                    <li class="mb-3">
                                        <a href="setting.html" class="d-flex align-items-center py-2 px-3 text-dark text-decoration-none hover-bg-light rounded">
                                            <i class="fas fa-cog me-2 text-primary"></i> Account Settings
                                        </a>
                                    </li>
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
