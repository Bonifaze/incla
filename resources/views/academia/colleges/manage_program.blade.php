@extends('layouts.mini')



@section('pagetitle')
    {{ $program->name }} Management
@endsection


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    @include('partialsv3.flash')
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        {{ $program->name }}
                    </h1>

                    <div class="card">
                        <div class="table-responsive card-body">

                            <table class="table table-striped">
                                <thead>

                                </thead>

                                <tbody>
                                    <tr>
                                        <td> Students</td>
                                        <td><a class="btn btn-outline-info"
                                                href="{{ route('academia.college.program_level_students', [$program->id, 100]) }}">
                                                List ({{ $program->registeredStudentsCount(100) }})</a></td>

                                    </tr>
                                    <tr>
                                        <td> Courses</td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.college.program_level_courses', [$program->id, 100]) }}">
                                                Show ({{ $program->levelCoursesCount(100) }})</a></td>

                                    </tr>


                                    <tr>
                                        <td> Results <br> Download</td>
                                        <td>
                                                <a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.export_view', [$program->id, 100, 1]) }}">
                                                 Download </a>
                                                 <br><br>

                                    </tr>


                                    <tr>

                                        <td> Approval</td>
                                <td>
                               @if(!$program->is_DEAN100approved)
                            <a href="/staff-course/approve?by=dean&level=100&program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a>
                                 @else
                          <a href="/staff-course/revoke?by=dean&level=100&program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a>
                                 @endif
                                 </td>

                                        {{--  <td><a href="/staff-course/approve?by=dean&level=100&program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a><a href="/staff-course/revoke?by=dean&level=100&program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a></td>  --}}
                                        {{--  <td><a href="/staff-course/approve?by=dean&level=200&program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a><a href="/staff-course/revoke?by=dean&level=200&program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a></td>
                                        <td><a href="/staff-course/approve?by=dean&level=300&program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a><a href="/staff-course/revoke?by=dean&level=300&program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a></td>
                                        <td><a href="/staff-course/approve?by=dean&level=400&program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a><a href="/staff-course/revoke?by=dean&level=400&program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a></td>
                                        <td><a href="/staff-course/approve?by=dean&level=500&program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a><a href="/staff-course/revoke?by=dean&level=500&program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a></td>
                                        <td><a href="/staff-course/approve?by=dean&level=700&program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a><a href="/staff-course/revoke?by=dean&level=700&program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a></td>
                                        <td><a href="/staff-course/approve?by=dean&level=800&program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a><a href="/staff-course/revoke?by=dean&level=800&program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a></td>
                                        <td><a href="/staff-course/approve?by=dean&level=900&program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a><a href="/staff-course/revoke?by=dean&level=900&program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a></td>
                                    </tr>  --}}


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
