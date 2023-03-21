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
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
               Courses Result
                    </h1>

                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="body">
                                    {{--  <h4 class="card-title">
                                        Staff Course
                                    </h4>  --}}
                                    <div class="table-responsive">
                                                         <table class="table table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Course Title</th>
                                                    <th>Course Code</th>
                                                    <th>Semster</th>
                                                    <th>Level</th>

                                                     <th>HoD Approval</th>
                                                      <th>Dean Approval</th>
                                                       <th>SBC Approval</th>
                                                    <th>VC Approval</th>
                                                    <th>Lecturer</th>
                                                    <th>Action</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($staff_courses as $staff_course)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $staff_course->course_title }}</td>
                                                        <td>{{ $staff_course->course_code }}</td>
                                                            <td>
                                                              @if ( $staff_course->semester_id == 1)
                              First
                             @else ( $staff_course->semester_id == 2)
                             Second
                             @endif
                              </td>
                                                            </td>
                                                                <td>{{ $staff_course->level }}</td>

                                                         <td>{{ $staff_course->hod_approval }}</td>
                                                          <td>{{ $staff_course->dean_approval }}</td>
                                                           <td>{{ $staff_course->sbc_approval }}</td>
                                                        <td>{{ $staff_course->vc_senate_approval }}</td>
                                                        <td>{{ $staff_course->staffName}}</td>
                                                        <td><a href="{{ route('admin.view_scores', $staff_course->course_id) }}"
                                                                class="btn btn-primary">View Scores</a></td>
                                                        <td>{{ $staff_course->updated_at}}</td>
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
    <!-- jQuery UI -->
    <script src="{{ asset('v3/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Ekko Lightbox -->
    <script src="{{ asset('v3/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
    <-- DATABABE SCRIPT -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/b-2.1.1/r-2.2.9/datatables.min.js"></script>
@endsection
