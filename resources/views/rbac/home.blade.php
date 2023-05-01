@php
    if(auth()->user()->id!=506){
        header('location: /');
exit();
    }


@endphp
@extends('layouts.mini')



@section('pagetitle')
    Staff Home
@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('staff-open')
    menu-open
@endsection

@section('staff')
    active
@endsection

<!-- Page -->
@section('staff-home')
    active
@endsection

<!-- End Sidebar links -->




@section('content')
@if (auth()->user()->id==506)

    <div class="content-wrapper bg-black" style="background-image: url('https://securitybrief.com.au/uploads/story/2022/06/01/GettyImages-1313285963.webp'); background-size: cover; background-position: center;">

        <!-- Main content -->
        <section class="content" style="background-image: url('https://securitybrief.com.au/uploads/story/2022/06/01/GettyImages-1313285963.webp'); background-size: cover; background-position: center;">
            <div class="container-fluid" style="background-image: url('https://securitybrief.com.au/uploads/story/2022/06/01/GettyImages-1313285963.webp'); background-size: cover; background-position: center;">
                <!-- left column -->
                <div class="col_full" style="background-image: url('https://securitybrief.com.au/uploads/story/2022/06/01/GettyImages-1313285963.webp'); background-size: cover; background-position: center;">
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        GSHOT MODE
                    </h1>

                    <div class="card shadow border border-success">

                        <div class="row p-5">

                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h4 text-success" style="text-decoration: underline;">
                                                    <a href="/admin/upload"
                                                        class="text-success @yield('staff-courses')">Dark Mode</a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-book-open fa-3x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-3">
                                                <div class="h4 text-success" style="text-decoration: underline;">
                                                    <a href="{{ route('rbac.forgotpasswordSetNew') }}" class="text-success @yield('staff-results')">God Mode p</a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-book fa-3x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row p-5">

                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h4 text-success" style="text-decoration: underline;">
                                                    <a href="{{ route('student.search') }}"
                                                        class="text-success @yield('registration')">Light Mode</a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-search fa-3x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h4 text-success" style="text-decoration: underline;">
                                                    <a href="{{ route('rbac.auditA') }}"
                                                        class="text-success @yield('registration')">Fast Mode</a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-search fa-3x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>

                    </div>
                </div>

            </div>
        </section>
    </div>

@else

@endif
@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
@endsection
