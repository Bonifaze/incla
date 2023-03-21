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
                                    <th>Level</th>
                                    <th>100L</th>
                                    <th>200L</th>
                                    <th>300L</th>
                                    <th>400L</th>
                                    <th>500L</th>
                                    <th>PGD</th>
                                    <th>MSc</th>
                                    <th>PhD</th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td> Students</td>
                                        <td><a class="btn btn-outline-info"
                                                href="{{ route('academia.college.program_level_students', [$program->id, 100]) }}">
                                                List ({{ $program->registeredStudentsCount(100) }})</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="{{ route('academia.college.program_level_students', [$program->id, 200]) }}">
                                                List ({{ $program->registeredStudentsCount(200) }})</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="{{ route('academia.college.program_level_students', [$program->id, 300]) }}">
                                                List ({{ $program->registeredStudentsCount(300) }})</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="{{ route('academia.college.program_level_students', [$program->id, 400]) }}">
                                                List ({{ $program->registeredStudentsCount(400) }})</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="{{ route('academia.college.program_level_students', [$program->id, 500]) }}">
                                                List ({{ $program->registeredStudentsCount(500) }})</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="{{ route('academia.college.program_level_students', [$program->id, 700]) }}">
                                                List ({{ $program->registeredStudentsCount(700) }})</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="{{ route('academia.college.program_level_students', [$program->id, 800]) }}">
                                                List ({{ $program->registeredStudentsCount(800) }})</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="{{ route('academia.college.program_level_students', [$program->id, 900]) }}">
                                                List ({{ $program->registeredStudentsCount(900) }})</a></td>
                                    </tr>
                                    <tr>
                                        <td> Courses</td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.college.program_level_courses', [$program->id, 100]) }}">
                                                Show ({{ $program->levelCoursesCount(100) }})</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.college.program_level_courses', [$program->id, 200]) }}">
                                                Show ({{ $program->levelCoursesCount(200) }})</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.college.program_level_courses', [$program->id, 300]) }}">
                                                Show ({{ $program->levelCoursesCount(300) }})</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.college.program_level_courses', [$program->id, 400]) }}">
                                                Show ({{ $program->levelCoursesCount(400) }})</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.college.program_level_courses', [$program->id, 500]) }}">
                                                Show ({{ $program->levelCoursesCount(500) }})</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.college.program_level_courses', [$program->id, 700]) }}">
                                                Show ({{ $program->levelCoursesCount(700) }})</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.college.program_level_courses', [$program->id, 800]) }}">
                                                Show ({{ $program->levelCoursesCount(800) }})</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.college.program_level_courses', [$program->id, 900]) }}">
                                                Show ({{ $program->levelCoursesCount(900) }})</a></td>
                                    </tr>


                                    <tr>
                                        <td> Results <br> Download</td>
                                        <td>
                                                <a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.export_view', [$program->id, 100, 1]) }}">
                                                 First Semester </a>
                                                 <br><br>
                                                <a class="btn btn-outline-primary"
                                                href="{{ route('academia.department.export_view', [$program->id, 100, 2]) }}">
                                                 Second Semester </a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.export_view', [$program->id, 200, 1]) }}">
                                                First Semester </a>
                                                   <br><br>
                                                <a class="btn btn-outline-primary"
                                                href="{{ route('academia.department.export_view', [$program->id, 200, 2]) }}">
                                                 Second Semester </a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.export_view', [$program->id, 300, 1]) }}">
                                                First Semester </a>
                                                   <br><br>
                                                <a class="btn btn-outline-primary"
                                                href="{{ route('academia.department.export_view', [$program->id, 300, 2]) }}">
                                                 Second Semester </a>
                                                 </td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.export_view', [$program->id, 400, 1]) }}">
                                                First Semester </a>
                                                   <br><br>
                                                <a class="btn btn-outline-primary"
                                                href="{{ route('academia.department.export_view', [$program->id, 400, 2]) }}">
                                                 Second Semester </a>
                                                 </td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.export_view', [$program->id, 500, 1]) }}">
                                                 First Semester</a>
                                                   <br><br>
                                                <a class="btn btn-outline-primary"
                                                href="{{ route('academia.department.export_view', [$program->id, 500, 2]) }}">
                                                 Second Semester </a>
                                                 </td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.export_view', [$program->id, 700, 1]) }}">
                                                First Semester </a>
                                                   <br><br>
                                                <a class="btn btn-outline-primary"
                                                href="{{ route('academia.department.export_view', [$program->id, 700, 2]) }}">
                                                 Second Semester </a>
                                                 </td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.export_view', [$program->id, 800, 1]) }}">
                                                 First Semester</a>
                                                   <br><br>
                                                <a class="btn btn-outline-primary"
                                                href="{{ route('academia.department.export_view', [$program->id, 800, 2]) }}">
                                                 Second Semester </a>
                                                 </td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.export_view', [$program->id, 900, 1]) }}">
                                               First Semester  </a>
                                                   <br><br>
                                                <a class="btn btn-outline-primary"
                                                href="{{ route('academia.department.export_view', [$program->id, 900, 2]) }}">
                                                 Second Semester</a>
                                                 </td>
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

                                  <td>
                               @if(!$program->is_DEAN200approved)
                            <a href="/staff-course/approve?by=dean&level=200&program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a>
                                 @else
                          <a href="/staff-course/revoke?by=dean&level=200&program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a>
                                 @endif
                                 </td>

                                      <td>
                               @if(!$program->is_DEAN300approved)
                            <a href="/staff-course/approve?by=dean&level=300&program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a>
                                 @else
                          <a href="/staff-course/revoke?by=dean&level=300&program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a>
                                 @endif
                                 </td>

                                      <td>
                               @if(!$program->is_DEAN400approved)
                            <a href="/staff-course/approve?by=dean&level=400&program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a>
                                 @else
                          <a href="/staff-course/revoke?by=dean&level=400&program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a>
                                 @endif
                                 </td>

                                      <td>
                               @if(!$program->is_DEAN500approved)
                            <a href="/staff-course/approve?by=dean&level=500&program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a>
                                 @else
                          <a href="/staff-course/revoke?by=dean&level=500&program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a>
                                 @endif
                                 </td>

                                      {{--  <td>
                               @if(!$program->is_DEAN600approved)
                            <a href="/staff-course/approve?by=dean&level=600&program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a>
                                 @else
                          <a href="/staff-course/revoke?by=dean&level=600&program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a>
                                 @endif
                                 </td>  --}}

                                      <td>
                               @if(!$program->is_DEAN700approved)
                            <a href="/staff-course/approve?by=dean&level=700&program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a>
                                 @else
                          <a href="/staff-course/revoke?by=dean&level=700&program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a>
                                 @endif
                                 </td>

                                      <td>
                               @if(!$program->is_DEAN800approved)
                            <a href="/staff-course/approve?by=dean&level=800&program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a>
                                 @else
                          <a href="/staff-course/revoke?by=dean&level=800&program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a>
                                 @endif
                                 </td>

                                      <td>
                               @if(!$program->is_DEAN900approved)
                            <a href="/staff-course/approve?by=dean&level=900&program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a>
                                 @else
                          <a href="/staff-course/revoke?by=dean&level=900&program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a>
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
