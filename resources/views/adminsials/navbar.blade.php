<nav class="main-header navbar navbar-expand navbar-white navbar-light mb-2" style="padding-bottom: 1.4rem;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="color: #c95b28;" data-widget="pushmenu" href="#">
                <i class="fas fa-bars fa-2x"></i>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <div class="dropdown">
                <button
                    class="users arrow-down-icon border border-gray-200 rounded-pill p-4 d-inline-block pe-40 position-relative"
                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="position-relative">
                        <img src="{{ asset('img/123.png') }}" alt="Image" class="h-32 w-32 rounded-circle">
                        <span
                            class="activation-badge w-8 h-8 position-absolute inset-block-end-0 inset-inline-end-0"></span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu--lg border-0 bg-transparent p-0">
                    <div class="card border border-gray-100 rounded-12 box-shadow-custom">
                        <div class="card-body">
                            <div class="flex-align gap-8 mb-20 pb-20 border-bottom border-gray-100">
                                {{-- <img src="assets/images/thumbs/user-img.png" alt="" class="w-54 h-54 rounded-circle"> --}}
                                <div>
                                    @php

                                        if (!session('userid')) {
                                            header('location: /admissions/login');
                                            exit();
                                        }
                                    @endphp
                                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">


                                        <div class="info text-wrap ">
                                            <div class="d-block"> </div>
                                        </div>
                                        <h4 class="mb-0">{{ session('userssurname') }} {{ session('usersFirstName') }}
                                            {{ session('usersMiddleName') }}</h4>
                                        <p class="fw-medium text-13 text-gray-200">{{ session('email') }}</p>
                                    </div>
                                </div>
                                <ul class="max-h-270 overflow-y-auto scroll-sm pe-4">
                                    <li class="mb-4">
                                        <a href="setting.html"
                                            class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium">
                                            <span class="text-2xl text-primary-600 d-flex"><i class="ph ph-gear"></i></span>
                                            <span class="text">Account Settings</span>
                                        </a>
                                    </li>

                                    <li class="pt-8 border-top border-gray-100">
                                        <a href="/logoutUser"
                                            class="py-12 text-15 px-20 hover-bg-danger-50 text-gray-300 hover-text-danger-600 rounded-8 flex-align gap-8 fw-medium"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span class="text-2xl text-danger-600 d-flex">
                                                <i class="ph ph-sign-out"></i>
                                                {{-- <i class="fas fa-power-off nav-icon text-danger" title="Logout"></i></span> --}}
                                            <span class="text">{{ __('Logout') }}</span>
                                        </a>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </li>
        <!-- User Profile End -->
    </ul>
</nav>
