@extends('layouts.adminsials')



@section('pagetitle')
Home
@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('student-open')
menu-open
@endsection

@section('student')
active
@endsection

<!-- Page -->
@section('home')
active
@endsection

<!-- End Sidebar links -->



@section('content')
<div class="dashboard-main-wrapper">
    <div class="top-navbar flex-between gap-16">

        <div class="flex-align gap-16">
            <!-- Toggle Button Start -->
            <button type="button" class="toggle-btn d-xl-none d-flex text-26 text-gray-500"><i
                    class="ph ph-list"></i></button>
            <!-- Toggle Button End -->

            <form action="#" class="w-350 d-sm-block d-none">
                <div class="position-relative">
                    <button type="submit" class="input-icon text-xl d-flex text-gray-100 pointer-event-none"><i
                            class="ph ph-magnifying-glass"></i></button>
                    <input type="text"
                        class="form-control ps-40 h-40 border-transparent focus-border-main-600 bg-main-50 rounded-pill placeholder-15"
                        placeholder="Search...">
                </div>
            </form>
        </div>

        <div class="flex-align gap-16">
            <div class="flex-align gap-8">
                <!-- Notification Start -->
                <div class="dropdown">
                    <button
                        class="dropdown-btn shaking-animation text-gray-500 w-40 h-40 bg-main-50 hover-bg-main-100 transition-2 rounded-circle text-xl flex-center"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="position-relative">
                            <i class="ph ph-bell"></i>
                            <span class="alarm-notify position-absolute end-0"></span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu--lg border-0 bg-transparent p-0">
                        <div class="card border border-gray-100 rounded-12 box-shadow-custom p-0 overflow-hidden">
                            <div class="card-body p-0">
                                <div class="py-8 px-24 bg-main-600">
                                    <div class="flex-between">
                                        <h5 class="text-xl fw-semibold text-white mb-0">Notifications</h5>
                                        <div class="flex-align gap-12">
                                            <button type="button"
                                                class="bg-white rounded-6 text-sm px-8 py-2 hover-text-primary-600">
                                                New </button>
                                            <button type="button"
                                                class="close-dropdown hover-scale-1 text-xl text-white"><i
                                                    class="ph ph-x"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-24 max-h-270 overflow-y-auto scroll-sm">
                                    <div class="d-flex align-items-start gap-12">
                                        <img src="assets/images/thumbs/notification-img1.png" alt=""
                                            class="w-48 h-48 rounded-circle object-fit-cover">
                                        <div class="border-bottom border-gray-100 mb-24 pb-24">
                                            <div class="flex-align gap-4">
                                                <a href="#"
                                                    class="fw-medium text-15 mb-0 text-gray-300 hover-text-main-600 text-line-2">Ashwin
                                                    Bose is requesting access to Design File - Final Project. </a>
                                                <!-- Three Dot Dropdown Start -->
                                                <div class="dropdown flex-shrink-0">
                                                    <button class="text-gray-200 rounded-4" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ph-fill ph-dots-three-outline"></i>
                                                    </button>
                                                    <div
                                                        class="dropdown-menu dropdown-menu--md border-0 bg-transparent p-0">
                                                        <div
                                                            class="card border border-gray-100 rounded-12 box-shadow-custom">
                                                            <div class="card-body p-12">
                                                                <div
                                                                    class="max-h-200 overflow-y-auto scroll-sm pe-8">
                                                                    <ul>
                                                                        <li class="mb-0">
                                                                            <a href="#"
                                                                                class="py-6 text-15 px-8 hover-bg-gray-50 text-gray-300 rounded-8 fw-normal text-xs d-block">
                                                                                <span class="text">Mark as
                                                                                    read</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="mb-0">
                                                                            <a href="#"
                                                                                class="py-6 text-15 px-8 hover-bg-gray-50 text-gray-300 rounded-8 fw-normal text-xs d-block">
                                                                                <span class="text">Delete
                                                                                    Notification</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="mb-0">
                                                                            <a href="#"
                                                                                class="py-6 text-15 px-8 hover-bg-gray-50 text-gray-300 rounded-8 fw-normal text-xs d-block">
                                                                                <span class="text">Report</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Three Dot Dropdown End -->
                                            </div>
                                            <div class="flex-align gap-6 mt-8">
                                                <img src="assets/images/icons/google-drive.png" alt="">
                                                <div class="flex-align gap-4">
                                                    <p class="text-gray-900 text-sm text-line-1">Design brief and
                                                        ideas.txt</p>
                                                    <span class="text-xs text-gray-200 flex-shrink-0">2.2 MB</span>
                                                </div>
                                            </div>
                                            <div class="mt-16 flex-align gap-8">
                                                <button type="button"
                                                    class="btn btn-main py-8 text-15 fw-normal px-16">Accept</button>
                                                <button type="button"
                                                    class="btn btn-outline-gray py-8 text-15 fw-normal px-16">Decline</button>
                                            </div>
                                            <span class="text-gray-200 text-13 mt-8">2 mins ago</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start gap-12">
                                        <img src="assets/images/thumbs/notification-img2.png" alt=""
                                            class="w-48 h-48 rounded-circle object-fit-cover">
                                        <div class="">
                                            <a href="#"
                                                class="fw-medium text-15 mb-0 text-gray-300 hover-text-main-600 text-line-2">Patrick
                                                added a comment on Design Assets - Smart Tags file:</a>
                                            <span class="text-gray-200 text-13">2 mins ago</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="#"
                                    class="py-13 px-24 fw-bold text-center d-block text-primary-600 border-top border-gray-100 hover-text-decoration-underline">
                                    View All </a>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Notification Start -->

                <!-- Language Start -->
                <div class="dropdown">
                    <button
                        class="text-gray-500 w-40 h-40 bg-main-50 hover-bg-main-100 transition-2 rounded-circle text-xl flex-center"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ph ph-globe"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu--md border-0 bg-transparent p-0">
                        <div class="card border border-gray-100 rounded-12 box-shadow-custom">
                            <div class="card-body">
                                <div class="max-h-270 overflow-y-auto scroll-sm pe-8">
                                    <div
                                        class="form-check form-radio d-flex align-items-center justify-content-between ps-0 mb-16">
                                        <label
                                            class="ps-0 form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="arabic">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-8">
                                                <img src="assets/images/thumbs/flag1.png" alt=""
                                                    class="w-32-px h-32-px border borde border-gray-100 rounded-circle flex-shrink-0">
                                                <span class="text-15 fw-semibold mb-0">Arabic</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="language" id="arabic">
                                    </div>
                                    <div
                                        class="form-check form-radio d-flex align-items-center justify-content-between ps-0 mb-16">
                                        <label
                                            class="ps-0 form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="germany">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-8">
                                                <img src="assets/images/thumbs/flag2.png" alt=""
                                                    class="w-32-px h-32-px border borde border-gray-100 rounded-circle flex-shrink-0">
                                                <span class="text-15 fw-semibold mb-0">Germany</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="language" id="germany">
                                    </div>
                                    <div
                                        class="form-check form-radio d-flex align-items-center justify-content-between ps-0 mb-16">
                                        <label
                                            class="ps-0 form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="english">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-8">
                                                <img src="assets/images/thumbs/flag3.png" alt=""
                                                    class="w-32-px h-32-px border borde border-gray-100 rounded-circle flex-shrink-0">
                                                <span class="text-15 fw-semibold mb-0">English</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="language" id="english">
                                    </div>
                                    <div
                                        class="form-check form-radio d-flex align-items-center justify-content-between ps-0">
                                        <label
                                            class="ps-0 form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="spanish">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-8">
                                                <img src="assets/images/thumbs/flag4.png" alt=""
                                                    class="w-32-px h-32-px border borde border-gray-100 rounded-circle flex-shrink-0">
                                                <span class="text-15 fw-semibold mb-0">Spanish</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="language" id="spanish">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Language Start -->
            </div>


            <!-- User Profile Start -->
            <div class="dropdown">
                <button
                    class="users arrow-down-icon border border-gray-200 rounded-pill p-4 d-inline-block pe-40 position-relative"
                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="position-relative">
                        <img src="assets/images/thumbs/user-img.png" alt="Image" class="h-32 w-32 rounded-circle">
                        <span
                            class="activation-badge w-8 h-8 position-absolute inset-block-end-0 inset-inline-end-0"></span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu--lg border-0 bg-transparent p-0">
                    <div class="card border border-gray-100 rounded-12 box-shadow-custom">
                        <div class="card-body">
                            <div class="flex-align gap-8 mb-20 pb-20 border-bottom border-gray-100">
                                <img src="assets/images/thumbs/user-img.png" alt=""
                                    class="w-54 h-54 rounded-circle">
                                <div class="">
                                    <h4 class="mb-0">Michel John</h4>
                                    <p class="fw-medium text-13 text-gray-200">examplemail@mail.com</p>
                                </div>
                            </div>
                            <ul class="max-h-270 overflow-y-auto scroll-sm pe-4">
                                <li class="mb-4">
                                    <a href="setting.html"
                                        class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                        <span class="text-2xl text-primary-600 d-flex"><i
                                                class="ph ph-gear"></i></span>
                                        <span class="text">Account Settings</span>
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="pricing-plan.html"
                                        class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                        <span class="text-2xl text-primary-600 d-flex"><i
                                                class="ph ph-chart-bar"></i></span>
                                        <span class="text">Upgrade Plan</span>
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="analytics.html"
                                        class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                        <span class="text-2xl text-primary-600 d-flex"><i
                                                class="ph ph-chart-line-up"></i></span>
                                        <span class="text">Daily Activity</span>
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="message.html"
                                        class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                        <span class="text-2xl text-primary-600 d-flex"><i
                                                class="ph ph-chats-teardrop"></i></span>
                                        <span class="text">Inbox</span>
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="email.html"
                                        class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                        <span class="text-2xl text-primary-600 d-flex"><i
                                                class="ph ph-envelope-simple"></i></span>
                                        <span class="text">Email</span>
                                    </a>
                                </li>
                                <li class="pt-8 border-top border-gray-100">
                                    <a href="sign-in.html"
                                        class="py-12 text-15 px-20 hover-bg-danger-50 text-gray-300 hover-text-danger-600 rounded-8 flex-align gap-8 fw-medium text-15">
                                        <span class="text-2xl text-danger-600 d-flex"><i
                                                class="ph ph-sign-out"></i></span>
                                        <span class="text">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Profile Start -->

        </div>
    </div>


    <div class="dashboard-body">

        <div class="row gy-4">
            <div class="col-lg-9">
                <!-- Widgets Start -->
                <div class="row gy-4">
                    <div class="col-xxl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-2">155+</h4>
                                <span class="text-gray-600">Completed Courses</span>
                                <div class="flex-between gap-8 mt-16">
                                    <span
                                        class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-main-600 text-white text-2xl"><i
                                            class="ph-fill ph-book-open"></i></span>
                                    <div id="complete-course" class="remove-tooltip-title rounded-tooltip-value">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-2">39+</h4>
                                <span class="text-gray-600">Earned Certificate</span>
                                <div class="flex-between gap-8 mt-16">
                                    <span
                                        class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-main-two-600 text-white text-2xl"><i
                                            class="ph-fill ph-certificate"></i></span>
                                    <div id="earned-certificate" class="remove-tooltip-title rounded-tooltip-value">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-2">25+</h4>
                                <span class="text-gray-600">Course in Progress</span>
                                <div class="flex-between gap-8 mt-16">
                                    <span
                                        class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-purple-600 text-white text-2xl">
                                        <i class="ph-fill ph-graduation-cap"></i></span>
                                    <div id="course-progress" class="remove-tooltip-title rounded-tooltip-value">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-2">18k+</h4>
                                <span class="text-gray-600">Community Support</span>
                                <div class="flex-between gap-8 mt-16">
                                    <span
                                        class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-warning-600 text-white text-2xl"><i
                                            class="ph-fill ph-users-three"></i></span>
                                    <div id="community-support" class="remove-tooltip-title rounded-tooltip-value">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Widgets End -->

                <!-- Top Course Start -->
                <div class="card mt-24">
                    <div class="card-body">
                        <div class="mb-20 flex-between flex-wrap gap-8">
                            <h4 class="mb-0">Study Statistics</h4>
                            <div class="flex-align gap-16 flex-wrap">
                                <div class="flex-align flex-wrap gap-16">
                                    <div class="flex-align flex-wrap gap-8">
                                        <span class="w-8 h-8 rounded-circle bg-main-600"></span>
                                        <span class="text-13 text-gray-600">Study</span>
                                    </div>
                                    <div class="flex-align flex-wrap gap-8">
                                        <span class="w-8 h-8 rounded-circle bg-main-two-600"></span>
                                        <span class="text-13 text-gray-600">Test</span>
                                    </div>
                                </div>
                                <select class="form-select form-control text-13 px-8 pe-24 py-8 rounded-8 w-auto">
                                    <option value="1">Yearly</option>
                                    <option value="1">Monthly</option>
                                    <option value="1">Weekly</option>
                                    <option value="1">Today</option>
                                </select>
                            </div>
                        </div>

                        <div id="doubleLineChart" class="tooltip-style y-value-left"></div>

                    </div>
                </div>
                <!-- Top Course End -->

                <!-- Top Course Start -->
                <div class="card mt-24">
                    <div class="card-body">
                        <div class="mb-20 flex-between flex-wrap gap-8">
                            <h4 class="mb-0">Top Courses Pick for You</h4>
                            <a href="student-courses.html"
                                class="text-13 fw-medium text-main-600 hover-text-decoration-underline">See All</a>
                        </div>

                        <div class="row g-20">
                            <div class="col-lg-4 col-sm-6">
                                <div class="card border border-gray-100">
                                    <div class="card-body p-8">
                                        <a href="course-details.html"
                                            class="bg-main-100 rounded-8 overflow-hidden text-center mb-8 h-164 flex-center p-8">
                                            <img src="assets/images/thumbs/course-img1.png" alt="Course Image">
                                        </a>
                                        <div class="p-8">
                                            <span
                                                class="text-13 py-2 px-10 rounded-pill bg-success-50 text-success-600 mb-16">Development</span>
                                            <h5 class="mb-0"><a href="course-details.html"
                                                    class="hover-text-main-600">Full Stack Web Development</a></h5>

                                            <div class="flex-align gap-8 flex-wrap mt-16">
                                                <img src="assets/images/thumbs/user-img1.png"
                                                    class="w-28 h-28 rounded-circle object-fit-cover"
                                                    alt="User Image">
                                                <div>
                                                    <span class="text-gray-600 text-13">Created by <a
                                                            href="profile.html"
                                                            class="fw-semibold text-gray-700 hover-text-main-600 hover-text-decoration-underline">Albert
                                                            James</a> </span>
                                                </div>
                                            </div>

                                            <div class="flex-align gap-8 mt-12 pt-12 border-top border-gray-100">
                                                <div class="flex-align gap-4">
                                                    <span class="text-sm text-main-600 d-flex"><i
                                                            class="ph ph-video-camera"></i></span>
                                                    <span class="text-13 text-gray-600">24 Lesson</span>
                                                </div>
                                                <div class="flex-align gap-4">
                                                    <span class="text-sm text-main-600 d-flex"><i
                                                            class="ph ph-clock"></i></span>
                                                    <span class="text-13 text-gray-600">40 Hours</span>
                                                </div>
                                            </div>

                                            <div class="flex-between gap-4 flex-wrap mt-24">
                                                <div class="flex-align gap-4">
                                                    <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                            class="ph-fill ph-star"></i></span>
                                                    <span class="text-13 fw-bold text-gray-600">4.9</span>
                                                    <span class="text-13 fw-bold text-gray-600">(12k)</span>
                                                </div>
                                                <a href="course-details.html"
                                                    class="btn btn-outline-main rounded-pill py-9">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="card border border-gray-100">
                                    <div class="card-body p-8">
                                        <a href="course-details.html"
                                            class="bg-main-100 rounded-8 overflow-hidden text-center mb-8 h-164 flex-center p-8">
                                            <img src="assets/images/thumbs/course-img5.png" alt="Course Image">
                                        </a>
                                        <div class="p-8">
                                            <span
                                                class="text-13 py-2 px-10 rounded-pill bg-warning-50 text-warning-600 mb-16">Design</span>
                                            <h5 class="mb-0"><a href="course-details.html"
                                                    class="hover-text-main-600">Design System</a></h5>

                                            <div class="flex-align gap-8 flex-wrap mt-16">
                                                <img src="assets/images/thumbs/user-img5.png"
                                                    class="w-28 h-28 rounded-circle object-fit-cover"
                                                    alt="User Image">
                                                <div>
                                                    <span class="text-gray-600 text-13">Created by <a
                                                            href="profile.html"
                                                            class="fw-semibold text-gray-700 hover-text-main-600 hover-text-decoration-underline">Albert
                                                            James</a> </span>
                                                </div>
                                            </div>

                                            <div class="flex-align gap-8 mt-12 pt-12 border-top border-gray-100">
                                                <div class="flex-align gap-4">
                                                    <span class="text-sm text-main-600 d-flex"><i
                                                            class="ph ph-video-camera"></i></span>
                                                    <span class="text-13 text-gray-600">24 Lesson</span>
                                                </div>
                                                <div class="flex-align gap-4">
                                                    <span class="text-sm text-main-600 d-flex"><i
                                                            class="ph ph-clock"></i></span>
                                                    <span class="text-13 text-gray-600">40 Hours</span>
                                                </div>
                                            </div>

                                            <div class="flex-between gap-4 flex-wrap mt-24">
                                                <div class="flex-align gap-4">
                                                    <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                            class="ph-fill ph-star"></i></span>
                                                    <span class="text-13 fw-bold text-gray-600">4.9</span>
                                                    <span class="text-13 fw-bold text-gray-600">(12k)</span>
                                                </div>
                                                <a href="course-details.html"
                                                    class="btn btn-outline-main rounded-pill py-9">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="card border border-gray-100">
                                    <div class="card-body p-8">
                                        <a href="course-details.html"
                                            class="bg-main-100 rounded-8 overflow-hidden text-center mb-8 h-164 flex-center p-8">
                                            <img src="assets/images/thumbs/course-img6.png" alt="Course Image">
                                        </a>
                                        <div class="p-8">
                                            <span
                                                class="text-13 py-2 px-10 rounded-pill bg-danger-50 text-danger-600 mb-16">Frontend</span>
                                            <h5 class="mb-0"><a href="course-details.html"
                                                    class="hover-text-main-600">React Native Courese</a></h5>

                                            <div class="flex-align gap-8 flex-wrap mt-16">
                                                <img src="assets/images/thumbs/user-img6.png"
                                                    class="w-28 h-28 rounded-circle object-fit-cover"
                                                    alt="User Image">
                                                <div>
                                                    <span class="text-gray-600 text-13">Created by <a
                                                            href="profile.html"
                                                            class="fw-semibold text-gray-700 hover-text-main-600 hover-text-decoration-underline">Albert
                                                            James</a> </span>
                                                </div>
                                            </div>

                                            <div class="flex-align gap-8 mt-12 pt-12 border-top border-gray-100">
                                                <div class="flex-align gap-4">
                                                    <span class="text-sm text-main-600 d-flex"><i
                                                            class="ph ph-video-camera"></i></span>
                                                    <span class="text-13 text-gray-600">24 Lesson</span>
                                                </div>
                                                <div class="flex-align gap-4">
                                                    <span class="text-sm text-main-600 d-flex"><i
                                                            class="ph ph-clock"></i></span>
                                                    <span class="text-13 text-gray-600">40 Hours</span>
                                                </div>
                                            </div>

                                            <div class="flex-between gap-4 flex-wrap mt-24">
                                                <div class="flex-align gap-4">
                                                    <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                            class="ph-fill ph-star"></i></span>
                                                    <span class="text-13 fw-bold text-gray-600">4.9</span>
                                                    <span class="text-13 fw-bold text-gray-600">(12k)</span>
                                                </div>
                                                <a href="course-details.html"
                                                    class="btn btn-outline-main rounded-pill py-9">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Top Course End -->
            </div>

            <div class="col-lg-3">
                <!-- Calendar Start -->
                <div class="card">
                    <div class="card-body">
                        <div class="calendar">
                            <div class="calendar__header">
                                <button type="button" class="calendar__arrow left"><i
                                        class="ph ph-caret-left"></i></button>
                                <p class="display h6 mb-0">""</p>
                                <button type="button" class="calendar__arrow right"><i
                                        class="ph ph-caret-right"></i></button>
                            </div>

                            <div class="calendar__week week">
                                <div class="calendar__week-text">Su</div>
                                <div class="calendar__week-text">Mo</div>
                                <div class="calendar__week-text">Tu</div>
                                <div class="calendar__week-text">We</div>
                                <div class="calendar__week-text">Th</div>
                                <div class="calendar__week-text">Fr</div>
                                <div class="calendar__week-text">Sa</div>
                            </div>
                            <div class="days"></div>
                        </div>
                    </div>
                </div>
                <!-- Calendar End -->

                <!-- Assignment Start -->
                <div class="card mt-24">
                    <div class="card-body">
                        <div class="mb-20 flex-between flex-wrap gap-8">
                            <h4 class="mb-0">Assignments</h4>
                            <a href="assignment.html"
                                class="text-13 fw-medium text-main-600 hover-text-decoration-underline">See All</a>
                        </div>
                        <div
                            class="p-xl-4 py-16 px-12 flex-between gap-8 rounded-8 border border-gray-100 hover-border-gray-200 transition-1 mb-16">
                            <div class="flex-align flex-wrap gap-8">
                                <span
                                    class="text-main-600 bg-main-50 w-44 h-44 rounded-circle flex-center text-2xl flex-shrink-0"><i
                                        class="ph-fill ph-graduation-cap"></i></span>
                                <div>
                                    <h6 class="mb-0">Do The Research</h6>
                                    <span class="text-13 text-gray-400">Due in 9 days</span>
                                </div>
                            </div>
                            <a href="assignment.html" class="text-gray-900 hover-text-main-600"><i
                                    class="ph ph-caret-right"></i></a>
                        </div>
                        <div
                            class="p-xl-4 py-16 px-12 flex-between gap-8 rounded-8 border border-gray-100 hover-border-gray-200 transition-1 mb-16">
                            <div class="flex-align flex-wrap gap-8">
                                <span
                                    class="text-main-600 bg-main-50 w-44 h-44 rounded-circle flex-center text-2xl flex-shrink-0"><i
                                        class="ph ph-code"></i></span>
                                <div>
                                    <h6 class="mb-0">PHP Dvelopment</h6>
                                    <span class="text-13 text-gray-400">Due in 2 days</span>
                                </div>
                            </div>
                            <a href="assignment.html" class="text-gray-900 hover-text-main-600"><i
                                    class="ph ph-caret-right"></i></a>
                        </div>
                        <div
                            class="p-xl-4 py-16 px-12 flex-between gap-8 rounded-8 border border-gray-100 hover-border-gray-200 transition-1">
                            <div class="flex-align flex-wrap gap-8">
                                <span
                                    class="text-main-600 bg-main-50 w-44 h-44 rounded-circle flex-center text-2xl flex-shrink-0"><i
                                        class="ph ph-bezier-curve"></i></span>
                                <div>
                                    <h6 class="mb-0">Graphic Design</h6>
                                    <span class="text-13 text-gray-400">Due in 5 days</span>
                                </div>
                            </div>
                            <a href="assignment.html" class="text-gray-900 hover-text-main-600"><i
                                    class="ph ph-caret-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Assignment End -->

                <!-- Progress Bar Start -->
                <div class="card mt-24">
                    <div class="card-header border-bottom border-gray-100">
                        <h5 class="mb-0">My Progress</h5>
                    </div>
                    <div class="card-body">
                        <div id="radialMultipleBar"></div>

                        <div class="">
                            <h6 class="text-lg mb-16 text-center"> <span class="text-gray-400">Total hour:</span> 6h
                                32 min</h6>
                            <div class="flex-between gap-8 flex-wrap">
                                <div class="flex-align flex-column">
                                    <h6 class="mb-6">60/60</h6>
                                    <span class="w-30 h-3 rounded-pill bg-main-600"></span>
                                    <span class="text-13 mt-6 text-gray-600">Completed</span>
                                </div>
                                <div class="flex-align flex-column">
                                    <h6 class="mb-6">60/60</h6>
                                    <span class="w-30 h-3 rounded-pill bg-main-two-600"></span>
                                    <span class="text-13 mt-6 text-gray-600">Completed</span>
                                </div>
                                <div class="flex-align flex-column">
                                    <h6 class="mb-6">60/60</h6>
                                    <span class="w-30 h-3 rounded-pill bg-gray-500"></span>
                                    <span class="text-13 mt-6 text-gray-600">Completed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Progress bar end -->
            </div>

        </div>
    </div>
@endsection

@section('pagescript')
<script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
@endsection












<!-- ======================================== -->
@extends('layouts.adminsials')

@section('pagetitle')
Home
@endsection

<!-- Sidebar Links -->
@section('student-open')
menu-open
@endsection

@section('student')
active
@endsection

<!-- Page -->
@section('home')
active
@endsection
<!-- End Sidebar links -->

@section('content')
    <div class="wrapper bg-dark">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xl-9 col-12">
                            <div class="box bg-success">
                                <div class="box-body d-flex p-0">
                                    <div class="flex-grow-1 p-30 flex-grow-1 bg-img bg-none-md"
                                        style="background-position: right bottom; background-size: auto 100%; background-image: url(http://edulearn-lms-admin-template.multipurposethemes.com/images/svg-icon/color-svg/custom-30.svg)">
                                        <div class="row">
                                            <div class="col-12 col-xl-7">
                                                <h1 class="mb-0 fw-600">Learn With Effectively With Us!</h1>
                                                <p class="my-10 fs-16 text-white-70">Get 30% off every course on january.
                                                </p>
                                                <div class="mt-45 d-md-flex align-items-center">
                                                    <div class="me-30 mb-30 mb-md-0">
                                                        <div class="d-flex align-items-center">
                                                            <div
                                                                class="me-15 text-center fs-24 w-50 h-50 l-h-50 bg-danger b-1 border-white rounded-circle">
                                                                <i class="fa fa-graduation-cap"></i>
                                                            </div>
                                                            <div>
                                                                <h5 class="mb-0">Students</h5>
                                                                <p class="mb-0 text-white-70">75,000+</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="d-flex align-items-center">
                                                            <div
                                                                class="me-15 text-center fs-24 w-50 h-50 l-h-50 bg-warning b-1 border-white rounded-circle">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                            <div>
                                                                <h5 class="mb-0">Expert Mentors</h5>
                                                                <p class="mb-0 text-white-70">200+</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-xl-5"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-12">
                            <div class="box bg-transparent no-shadow">
                                <div class="box-body p-xl-0 text-center">
                                    <h3 class="px-30 mb-20">Have More<br>knoledge to share?</h3>
                                    <a href="course.html" class="waves-effect waves-light w-p100 btn btn-primary"><i
                                            class="fa fa-plus me-15"></i> Create New Course</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <a class="box box-link-shadow text-center pull-up" href="javascript:void(0)">
                                        <div class="box-body py-5 bg-primary-light px-5">
                                            <p class="fw-500 text-primary text-overflow">Courses in Progress</p>
                                        </div>
                                        <div class="box-body p-10">
                                            <h1 class="countnm fs-40 m-0">5</h1>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a class="box box-link-shadow text-center pull-up" href="javascript:void(0)">
                                        <div class="box-body py-5 bg-primary-light px-5">
                                            <p class="fw-500 text-primary text-overflow">Forum Discussion</p>
                                        </div>
                                        <div class="box-body p-10">
                                            <h1 class="countnm fs-40 m-0">25</h1>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-12">
                            <div class="box no-shadow mb-0 bg-transparent">
                                <div class="box-header no-border px-0">
                                    <h3 class="fw-500 box-title">Popular Courses</h3>
                                    <div class="box-controls pull-right d-md-flex d-none">
                                        <a href="course.html">All Courses</a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="box mb-15 pull-up">
                                    <div class="box-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="me-15 bg-warning h-50 w-50 l-h-55 rounded text-center">
                                                    <span class="fs-24">U</span>
                                                </div>
                                                <div class="d-flex flex-column fw-500">
                                                    <a href="course.html" class="text-dark hover-warning mb-1 fs-16">UI/UX
                                                        Design</a>
                                                    <span class="text-fade">30+ Courses</span>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <a href="course.html"
                                                    class="waves-effect waves-light btn btn-sm btn-warning-light me-10">View
                                                    Courses</a>
                                                <div class="dropdown">
                                                    <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item flexbox" href="#">Apply</a>
                                                        <a class="dropdown-item flexbox" href="#">Make a Payment</a>
                                                        <a class="dropdown-item flexbox" href="#">Benefits</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box mb-15 pull-up">
                                    <div class="box-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="me-15 bg-danger h-50 w-50 l-h-55 rounded text-center">
                                                    <span class="fs-24">M</span>
                                                </div>
                                                <div class="d-flex flex-column fw-500">
                                                    <a href="course.html"
                                                        class="text-dark hover-danger mb-1 fs-16">Marketing</a>
                                                    <span class="text-fade">25+ Courses</span>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <a href="course.html"
                                                    class="waves-effect waves-light btn btn-sm btn-danger-light me-10">View
                                                    Courses</a>
                                                <div class="dropdown">
                                                    <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item flexbox" href="#">Apply</a>
                                                        <a class="dropdown-item flexbox" href="#">Make a Payment</a>
                                                        <a class="dropdown-item flexbox" href="#">Benefits</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box mb-15 pull-up">
                                    <div class="box-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="me-15 bg-success h-50 w-50 l-h-55 rounded text-center">
                                                    <span class="fs-24">W</span>
                                                </div>
                                                <div class="d-flex flex-column fw-500">
                                                    <a href="course.html" class="text-dark hover-success mb-1 fs-16">Web
                                                        Dev.</a>
                                                    <span class="text-fade">30+ Courses</span>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <a href="course.html"
                                                    class="waves-effect waves-light btn btn-sm btn-success-light me-10">View
                                                    Courses</a>
                                                <div class="dropdown">
                                                    <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item flexbox" href="#">Apply</a>
                                                        <a class="dropdown-item flexbox" href="#">Make a Payment</a>
                                                        <a class="dropdown-item flexbox" href="#">Benefits</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box mb-15 pull-up">
                                    <div class="box-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="me-15 bg-primary h-50 w-50 l-h-55 rounded text-center">
                                                    <span class="fs-24">M</span>
                                                </div>
                                                <div class="d-flex flex-column fw-500">
                                                    <a href="course.html"
                                                        class="text-dark hover-primary mb-1 fs-16">Mathematics</a>
                                                    <span class="text-fade">50+ Courses</span>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <a href="course.html"
                                                    class="waves-effect waves-light btn btn-sm btn-primary-light me-10">View
                                                    Courses</a>
                                                <div class="dropdown">
                                                    <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item flexbox" href="#">Apply</a>
                                                        <a class="dropdown-item flexbox" href="#">Make a Payment</a>
                                                        <a class="dropdown-item flexbox" href="#">Benefits</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-12">
                            <div class="box no-shadow mb-0 bg-transparent">
                                <div class="box-header no-border px-0">
                                    <h3 class="fw-500 box-title">Current Activity</h3>
                                </div>
                            </div>
                            <div class="box">
                                <div class="box-body pb-0">
                                    <div class="mb-15 w-p100 d-flex align-items-center justify-content-between">
                                        <div>
                                            <h3 class="my-0">Monthly Progress</h3>
                                            <p class="mb-0 text-fade">This is the latest Improvement</p>
                                        </div>
                                        <div class="input-group w-auto">
                                            <button type="button" class="btn btn-primary-light btn-circle"
                                                id="daterange-btn">
                                                <p><i class="fa fa-calendar"></i></p>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="charts_widget_2_chart"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <div class="box bg-warning">
                                        <div class="box-body">
                                            <h2 class="my-0 fw-600 text-white">450K+</h2>
                                            <p class="mb-10 text-white-80">Completed Course</p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="mb-0 text-white-70">This is the latest Data</p>
                                                <button type="button"
                                                    class="waves-effect waves-circle btn btn-circle btn-warning-light"><i
                                                        class="mdi mdi-arrow-top-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="box bg-danger">
                                        <div class="box-body">
                                            <h2 class="my-0 fw-600 text-white">200K+</h2>
                                            <p class="mb-10 text-white-80">Video Course</p>
                                            <div class="d-flex align-items-center justify-content-end">
                                                <button type="button"
                                                    class="waves-effect waves-circle btn btn-circle btn-danger-light"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                        class="mdi mdi-play"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="ratio ratio-16x9">
                                                    <iframe
                                                        src="http://player.vimeo.com/video/473177594?title=0&amp;portrait=0&amp;byline=0&amp;autoplay=1"
                                                        title="video" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-12">
                            <div class="box no-shadow mb-0 bg-transparent">
                                <div class="box-header no-border px-0">
                                    <h3 class="fw-500 box-title">Best Instructors</h3>
                                    <div class="box-controls pull-right d-md-flex d-none">
                                        <a href="#">See All</a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="box mb-15 pull-up">
                                    <div class="box-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="me-15 mb-1">
                                                    <img src="{{ asset('img/uaes.png') }}"
                                                        class="bg-primary-light avatar avatar-lg rounded-circle"
                                                        alt="">
                                                </div>
                                                <div class="d-flex flex-column fw-500">
                                                    <a href="extra_profile.html"
                                                        class="text-dark hover-primary mb-1 fs-16">Nil Yeager</a>
                                                    <span class="text-fade">5 Design Course</span>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <a href="course.html"
                                                    class="waves-effect waves-light btn btn-sm btn-secondary">Courses</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box mb-15 pull-up">
                                    <div class="box-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="me-15 mb-1">
                                                    <img src="{{ asset('img/uaes.png') }}"
                                                        class="bg-primary-light avatar avatar-lg rounded-circle"
                                                        alt="">
                                                </div>
                                                <div class="d-flex flex-column fw-500">
                                                    <a href="extra_profile.html"
                                                        class="text-dark hover-primary mb-1 fs-16">Theron Trump</a>
                                                    <span class="text-fade">5 Design Course</span>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <a href="course.html"
                                                    class="waves-effect waves-light btn btn-sm btn-secondary">Courses</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box mb-15 pull-up">
                                    <div class="box-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="me-15" style="margin-bottom: 1px;">
                                                    <img src="{{ asset('img/uaes.png') }}"
                                                        class="bg-primary-light avatar avatar-lg rounded-circle"
                                                        alt="">
                                                </div>
                                                <div class="d-flex flex-column fw-500">
                                                    <a href="extra_profile.html"
                                                        class="text-dark hover-primary mb-1 fs-16">Tyler Mark</a>
                                                    <span class="text-fade">5 Design Course</span>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <a href="course.html"
                                                    class="waves-effect waves-light btn btn-sm btn-secondary">Courses</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box mb-15 pull-up">
                                    <div class="box-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="me-15">
                                                    <img src="{{ asset('img/uaes.png') }}"
                                                        class="bg-primary-light avatar avatar-lg rounded-circle"
                                                        alt="">
                                                </div>
                                                <div class="d-flex flex-column fw-500">
                                                    <a href="extra_profile.html"
                                                        class="text-dark hover-primary mb-1 fs-16">Johen Mark</a>
                                                    <span class="text-fade">5 Design Course</span>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <a href="course.html"
                                                    class="waves-effect waves-light btn btn-sm btn-secondary">Courses</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-6 col-12">
                            <div class="box">
                                <div class="box-header no-border">
                                    <h3 class="box-title">Top 5 School Performance</h3>
                                </div>
                                <div class="box-body">
                                    <div id="performance_chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-12">
                            <div class="box">
                                <div class="box-header no-border">
                                    <h3 class="box-title">Overall Pass Percentage</h3>
                                </div>
                                <div class="box-body" style="min-height: 275px;">
                                    <div id="pass_chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-12">
                            <div class="box">
                                <div class="box-header no-border">
                                    <h3 class="box-title">Content Usage</h3>
                                </div>
                                <div class="box-body text-center pt-60">
                                    <p class="text-primary">12.5% higher than last month</p>
                                    <div id="usage_chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-12">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 col-12">
                                    <div class="box">
                                        <div class="box-header no-border">
                                            <h3 class="box-title">Course completion</h3>
                                            <ul class="box-controls pull-right d-md-flex d-none">
                                                <li>
                                                    <a href="course.html"
                                                        class="btn btn-primary-light px-10 base-font">View All</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="box-body">
                                            <div class="mb-25">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="w-p85">
                                                        <div class="progress progress-sm mb-0">
                                                            <div class="progress-bar progress-bar-primary"
                                                                role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 40%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>40%</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="mb-0 text-primary">In Progress</p>
                                                    <p class="text-fade mb-0">117 User</p>
                                                </div>
                                            </div>
                                            <div class="mb-25">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="w-p85">
                                                        <div class="progress progress-sm mb-0">
                                                            <div class="progress-bar progress-bar-success"
                                                                role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 20%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>20%</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="mb-0 text-primary">Completed</p>
                                                    <p class="text-fade mb-0">74 User</p>
                                                </div>
                                            </div>
                                            <div class="mb-25">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="w-p85">
                                                        <div class="progress progress-sm mb-0">
                                                            <div class="progress-bar progress-bar-warning"
                                                                role="progressbar" aria-valuenow="18" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 18%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>18%</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="mb-0 text-primary">Inactive</p>
                                                    <p class="text-fade mb-0">58 User</p>
                                                </div>
                                            </div>
                                            <div class="mb-25">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="w-p85">
                                                        <div class="progress progress-sm mb-0">
                                                            <div class="progress-bar progress-bar-danger"
                                                                role="progressbar" aria-valuenow="7" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 7%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>07%</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="mb-0 text-primary">Expeired</p>
                                                    <p class="text-fade mb-0">11 User</p>
                                                </div>
                                            </div>
                                            <div class="mb-25">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="w-p85">
                                                        <div class="progress progress-sm mb-0">
                                                            <div class="progress-bar progress-bar-primary"
                                                                role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 40%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>40%</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="mb-0 text-primary">In Progress</p>
                                                    <p class="text-fade mb-0">117 User</p>
                                                </div>
                                            </div>
                                            <div class="mb-20">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="w-p85">
                                                        <div class="progress progress-sm mb-0">
                                                            <div class="progress-bar progress-bar-success"
                                                                role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 20%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>20%</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="mb-0 text-primary">Completed</p>
                                                    <p class="text-fade mb-0">74 User</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-6 col-12">
                                    <div class="box bg-transparent no-shadow mb-30">
                                        <div class="box-header no-border pb-0">
                                            <h3 class="box-title">Upcoming Lessons</h3>
                                            <ul class="box-controls pull-right d-md-flex d-none">
                                                <li>
                                                    <a href="course.html"
                                                        class="btn btn-primary-light px-10 base-font">View All</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="box mb-15 pull-up">
                                        <div class="box-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-15 bg-warning h-50 w-50 l-h-68 rounded text-center">
                                                        <span class="icon-Book-open fs-24"><span
                                                                class="path1"></span><span class="path2"></span></span>
                                                    </div>
                                                    <div class="d-flex flex-column fw-500">
                                                        <a href="course.html"
                                                            class="text-dark hover-primary mb-1 fs-16">Informatic
                                                            Course</a>
                                                        <span class="text-fade">Nil Yeager, 19 April</span>
                                                    </div>
                                                </div>
                                                <a href="course.html">
                                                    <span class="icon-Arrow-right fs-24"><span class="path1"></span><span
                                                            class="path2"></span></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box mb-15 pull-up">
                                        <div class="box-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-15 bg-primary h-50 w-50 l-h-68 rounded text-center">
                                                        <span class="icon-Mail fs-24"></span>
                                                    </div>
                                                    <div class="d-flex flex-column fw-500">
                                                        <a href="course.html"
                                                            class="text-dark hover-primary mb-1 fs-16">Live Drawing</a>
                                                        <span class="text-fade">Micak Doe, 12 June</span>
                                                    </div>
                                                </div>
                                                <a href="course.html">
                                                    <span class="icon-Arrow-right fs-24"><span class="path1"></span><span
                                                            class="path2"></span></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box mb-15 pull-up">
                                        <div class="box-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-15 bg-danger h-50 w-50 l-h-68 rounded text-center">
                                                        <span class="icon-Book-open fs-24"><span
                                                                class="path1"></span><span class="path2"></span></span>
                                                    </div>
                                                    <div class="d-flex flex-column fw-500">
                                                        <a href="course.html"
                                                            class="text-dark hover-primary mb-1 fs-16">Contemporary Art</a>
                                                        <span class="text-fade">Potar doe, 27 July</span>
                                                    </div>
                                                </div>
                                                <a href="course.html">
                                                    <span class="icon-Arrow-right fs-24"><span class="path1"></span><span
                                                            class="path2"></span></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box mb-15 pull-up">
                                        <div class="box-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-15 bg-info h-50 w-50 l-h-68 rounded text-center">
                                                        <span class="icon-Mail fs-24"></span>
                                                    </div>
                                                    <div class="d-flex flex-column fw-500">
                                                        <a href="course.html" class="text-dark hover-info mb-1 fs-16">Live
                                                            Drawing</a>
                                                        <span class="text-fade">Micak Doe, 12 June</span>
                                                    </div>
                                                </div>
                                                <a href="course.html">
                                                    <span class="icon-Arrow-right fs-24"><span class="path1"></span><span
                                                            class="path2"></span></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-12">
                            <div class="box">
                                <div class="box-header no-border">
                                    <h3 class="box-title">Notice board</h3>
                                </div>
                                <div class="box-body p-0">
                                    <div class="act-div">
                                        <div class="media-list media-list-hover">
                                            <div class="media bar-0">
                                                <span class="avatar avatar-lg bg-primary-light rounded"><i
                                                        class="fa fa-user"></i></span>
                                                <div class="media-body">
                                                    <p class="d-flex align-items-center justify-content-between">
                                                        <a class="hover-success fs-16" href="#">New Teacher</a>
                                                        <span class="text-fade fs-12">Just Now</span>
                                                    </p>
                                                    <p class="text-fade">It is a long established fact that a reader will
                                                        be<span class="d-xxxl-inline-block d-none"> distracted by the
                                                            readable</span>...</p>
                                                </div>
                                            </div>

                                            <div class="media bar-0">
                                                <span class="avatar avatar-lg bg-danger-light rounded"><i
                                                        class="fa fa-money"></i></span>
                                                <div class="media-body">
                                                    <p class="d-flex align-items-center justify-content-between">
                                                        <a class="hover-success fs-16" href="#">New Fees
                                                            Structure</a>
                                                        <span class="text-fade fs-12">Today</span>
                                                    </p>
                                                    <p class="text-fade">It is a long established fact that a reader will
                                                        be<span class="d-xxxl-inline-block d-none"> distracted by the
                                                            readable</span>...</p>
                                                </div>
                                            </div>

                                            <div class="media bar-0">
                                                <span class="avatar avatar-lg bg-success-light rounded"><i
                                                        class="fa fa-book"></i></span>
                                                <div class="media-body">
                                                    <p class="d-flex align-items-center justify-content-between">
                                                        <a class="hover-success fs-16" href="#">Updated Syllabus</a>
                                                        <span class="text-fade fs-12">17 Dec 2020</span>
                                                    </p>
                                                    <p class="text-fade">It is a long established fact that a reader will
                                                        be<span class="d-xxxl-inline-block d-none"> distracted by the
                                                            readable</span>...</p>
                                                </div>
                                            </div>

                                            <div class="media bar-0">
                                                <span class="avatar avatar-lg bg-info-light rounded"><i
                                                        class="fa fa-graduation-cap"></i></span>
                                                <div class="media-body">
                                                    <p class="d-flex align-items-center justify-content-between">
                                                        <a class="hover-success fs-16" href="#">New Course</a>
                                                        <span class="text-fade fs-12">27 Oct 2020</span>
                                                    </p>
                                                    <p class="text-fade">It is a long established fact that a reader will
                                                        be<span class="d-xxxl-inline-block d-none"> distracted by the
                                                            readable</span>...</p>
                                                </div>
                                            </div>

                                            <div class="media bar-0">
                                                <span class="avatar avatar-lg bg-danger-light rounded"><i
                                                        class="fa fa-money"></i></span>
                                                <div class="media-body">
                                                    <p class="d-flex align-items-center justify-content-between">
                                                        <a class="hover-success fs-16" href="#">New Fees
                                                            Structure</a>
                                                        <span class="text-fade fs-12">Today</span>
                                                    </p>
                                                    <p class="text-fade">It is a long established fact that a reader will
                                                        be<span class="d-xxxl-inline-block d-none"> distracted by the
                                                            readable</span>...</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer text-center p-20">
                                    <a href="extra_taskboard.html" class="btn w-p100 btn-primary-light p-5">View all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->


        <!-- Side panel -->
        <!-- quick_user_toggle -->
        <div class="modal modal-light fade" id="quick_user_toggle" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content slim-scroll3">
                    <div class="modal-body p-30 bg-white">
                        <div class="d-flex align-items-center justify-content-between pb-30">
                            <h4 class="m-0">User Profile
                                <small class="text-fade fs-12 ms-5">12 messages</small>
                            </h4>
                            <a href="#" class="btn btn-icon btn-danger-light btn-sm no-shadow"
                                data-bs-dismiss="modal">
                                <span class="fa fa-close"></span>
                            </a>
                        </div>
                        <div>
                            <div class="d-flex flex-row">
                                <div class=""><img src="{{ asset('img/uaes.png') }}" alt="user"
                                        class="rounded bg-danger-light w-150" width="100"></div>
                                <div class="ps-20">
                                    <h5 class="mb-0">Nil Yeager</h5>
                                    <p class="my-5 text-fade">Manager</p>
                                    <a href="mailto:dummy@gmail.com"><span
                                            class="icon-Mail-notification me-5 text-success"><span
                                                class="path1"></span><span class="path2"></span></span>
                                        dummy@gmail.com</a>
                                    <button class="btn btn-success-light btn-sm mt-5"><i class="ti-plus"></i>
                                        Follow</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection

@section('pagescript')
<script src="{{ asset('dist/js/bootbox.min.js') }}"></script>
@endsection




@extends('layouts.adminsials')

@section('pagetitle')
Home
@endsection

<!-- Sidebar Links -->

<!-- Treeview -->
@section('student-open')
menu-open
@endsection

@section('student')
active
@endsection

<!-- Page -->
@section('home')
active
@endsection

<!-- End Sidebar links -->

@section('content')
<div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- left column -->
            <div class="row">
                {{-- <div class="col-xl-8 col-md-12">
                    <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Dashboard
                    </h1>

                    <div class="card shadow border border-success">
                        <div class="row p-5">
                            @foreach ($admissiontype as $key => $session)
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h4 text-success" style="text-decoration: underline;">
                                                    <a href="{{ $session->route }}" class="text-success @yield('registration')">{{ $session->name }}</a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-tasks fa-3x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> --}}

                <!-- Right column (Custom Calendar) -->
                <div class="col-xl-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="calendar">
                                <div class="calendar__header">
                                    <button type="button" class="calendar__arrow left"><i class="ph ph-caret-left"></i></button>
                                    <p class="display h6 mb-0" id="calendar-month">January 2025</p>
                                    <button type="button" class="calendar__arrow right"><i class="ph ph-caret-right"></i></button>
                                </div>

                                <div class="calendar__week week">
                                    <div class="calendar__week-text">Su</div>
                                    <div class="calendar__week-text">Mo</div>
                                    <div class="calendar__week-text">Tu</div>
                                    <div class="calendar__week-text">We</div>
                                    <div class="calendar__week-text">Th</div>
                                    <div class="calendar__week-text">Fr</div>
                                    <div class="calendar__week-text">Sa</div>
                                </div>
                                <div class="days" id="calendar-days"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom Calendar JavaScript -->
    <script>
        // Liturgical events for the calendar (example for January)
        const liturgicalEvents = {
            '2025-01-01': ['Feast of the Solemnity of Mary, Mother of God'],
            '2025-01-06': ['Epiphany of the Lord'],
            '2025-01-25': ['Conversion of Saint Paul'],
            // Add more events here...
        };

        let display = document.querySelector(".display");
        let days = document.querySelector(".days");
        let previous = document.querySelector(".left");
        let next = document.querySelector(".right");

        let date = new Date();

        let year = date.getFullYear();
        let month = date.getMonth();

        // Function to display the calendar with liturgical events
        function displayCalendar() {
            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const firstDayIndex = firstDay.getDay();
            const numberOfDays = lastDay.getDate();

            let formattedDate = date.toLocaleString("en-US", {
                month: "long",
                year: "numeric"
            });
            display.innerHTML = `${formattedDate}`;

            // Clear previous days
            days.innerHTML = '';

            // Add empty days for the first row
            for (let x = 1; x <= firstDayIndex; x++) {
                const div = document.createElement("div");
                div.innerHTML += "";
                days.appendChild(div);
            }

            // Add the actual days of the month
            for (let i = 1; i <= numberOfDays; i++) {
                let div = document.createElement("div");
                let currentDate = new Date(year, month, i);
                div.dataset.date = currentDate.toDateString();
                div.innerHTML += i;

                // Add liturgical event class if there's an event for that day
                const eventKey = currentDate.toISOString().split('T')[0]; // Format to YYYY-MM-DD
                if (liturgicalEvents[eventKey]) {
                    div.classList.add('event-day');
                    div.title = liturgicalEvents[eventKey].join(', '); // Show events on hover
                }

                // Highlight current date
                if (
                    currentDate.getFullYear() === new Date().getFullYear() &&
                    currentDate.getMonth() === new Date().getMonth() &&
                    currentDate.getDate() === new Date().getDate()
                ) {
                    div.classList.add("current-date");
                }

                days.appendChild(div);
            }
        }

        // Navigate to previous month
        previous.addEventListener("click", () => {
            if (month === 0) {
                month = 11;
                year -= 1;
            } else {
                month -= 1;
            }
            date.setMonth(month);
            displayCalendar();
        });

        // Navigate to next month
        next.addEventListener("click", () => {
            if (month === 11) {
                month = 0;
                year += 1;
            } else {
                month += 1;
            }
            date.setMonth(month);
            displayCalendar();
        });

        // Initial render
        displayCalendar();
    </script>

    <!-- Additional Styles for Calendar -->
    <style>
        .calendar {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .calendar__header {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 10px 0;
            margin-bottom: 10px;
        }

        .calendar__arrow {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .calendar__week {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            width: 100%;
        }

        .calendar__week-text {
            text-align: center;
            font-weight: bold;
        }

        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            width: 100%;
            margin-top: 10px;
        }

        .calendar__day {
            text-align: center;
            padding: 10px;
            background-color: #f4f4f4;
            border-radius: 5px;
            cursor: pointer;
        }

        .calendar__day:hover {
            background-color: #ccc;
        }

        /* Highlight current date */
        .current-date {
            background-color: #4caf50;
            color: white;
            font-weight: bold;
        }

        /* Highlight days with events */
        .event-day {
            background-color: #ffeb3b;
        }

        /* Tooltip for liturgical events */
        .event-day:hover {
            background-color: #ffcc00;
            color: black;
            cursor: pointer;
            opacity: 1;
        }


    </style>
</div>
@endsection

@section('pagescript')
<script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
@endsection
