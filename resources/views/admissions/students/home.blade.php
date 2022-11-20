@php

if(!session('userid'))
{

header('location: /');
exit;
}
@endphp
@extends('layouts.userapp')

@section('content')

<div class="row justify-content-center">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.studentsidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content m-4">


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h3 class="h5 fw-bold mb-3"> <a href="/students/studenthome" class="text-success fw-bold"> </a> </h3>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <h1>WELCOME TO STUDENTS HOME PAGE</h1>

                                    <!-- Pie Chart -->
                                </div>

                                <!-- Content Row -->
                                <!-- /.container-fluid -->
                            </div>
                            <!-- End of Main Content -->
                        </div>
                        <!-- End of Content Wrapper -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

 @include('layouts.footer')
@endsection
