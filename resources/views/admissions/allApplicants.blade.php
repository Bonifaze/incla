{{-- @php

if(!session('adminId'))
{

  header('location: /adminLogin');
  exit;
}
@endphp  --}}
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
<div class="content-wrapper bg-white">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- left column -->
            <div class="col_full">
                <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    ALL APPLICANTS
                </h1>



                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">

                        <!-- Card Header - Dropdown -->
                        <div class="card shadow mb-4">

                            <div class="card-body">
                                <div class="table-responsive">

                                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>

                                                <th>First Name</th>
                                                <th>Surname</th>
                                                <th>Phone Number</th>
                                                <th>Gender</th>
                                                <th>Course Applied</th>
                                                <th>Applicant Type</th>
                                                <th>View Details</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($allAppli as $allApp)

                                            <tr>

                                                <td>{{$allApp['first_name']}}</td>
                                                <td>{{$allApp['surname']}}</td>
                                                <td>{{$allApp['phone']}}</td>
                                                <td>{{$allApp['gender']}}</td>
                                                <td>{{$allApp['course_applied']}}</td>
                                                <td>{{$allApp['applicant_type']}}</td>
                                                <td><a href="/adminView/{{$allApp['applicant_type']}}/{{urlencode(base64_encode($allApp['id']))}}" class="btn btn-primary border mt-2"> View </a></td>

                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
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
@endsection

@section('pagescript')
<script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
@endsection

