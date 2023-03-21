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

                    <div class="card card-primary">
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
                                                href="{{ route('academia.department.program_level_students', [base64_encode($program->id), 100]) }}">
                                                List ({{ $program->registeredStudentsCount(100) }})</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="{{ route('academia.department.program_level_students', [base64_encode($program->id), 200]) }}">
                                                List ({{ $program->registeredStudentsCount(200) }})</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="{{ route('academia.department.program_level_students', [base64_encode($program->id), 300]) }}">
                                                List ({{ $program->registeredStudentsCount(300) }})</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="{{ route('academia.department.program_level_students', [base64_encode($program->id), 400]) }}">
                                                List ({{ $program->registeredStudentsCount(400) }})</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="{{ route('academia.department.program_level_students', [base64_encode($program->id), 500]) }}">
                                                List ({{ $program->registeredStudentsCount(500) }})</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="{{ route('academia.department.program_level_students', [base64_encode($program->id), 700]) }}">
                                                List ({{ $program->registeredStudentsCount(700) }})</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="{{ route('academia.department.program_level_students', [base64_encode($program->id), 800]) }}">
                                                List ({{ $program->registeredStudentsCount(800) }})</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="{{ route('academia.department.program_level_students', [base64_encode($program->id), 900]) }}">
                                                List ({{ $program->registeredStudentsCount(900) }})</a></td>
                                    </tr>
                                    <tr>
                                        <td> Courses</td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.program_level_courses', [base64_encode($program->id), 100]) }}">
                                                Show ({{ $program->levelCoursesCount(100) }})</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.program_level_courses', [base64_encode($program->id), 200]) }}">
                                                Show ({{ $program->levelCoursesCount(200) }})</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.program_level_courses', [base64_encode($program->id), 300]) }}">
                                                Show ({{ $program->levelCoursesCount(300) }})</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.program_level_courses', [base64_encode($program->id), 400]) }}">
                                                Show ({{ $program->levelCoursesCount(400) }})</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.program_level_courses', [base64_encode($program->id), 500]) }}">
                                                Show ({{ $program->levelCoursesCount(500) }})</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.program_level_courses', [base64_encode($program->id), 700]) }}">
                                                Show ({{ $program->levelCoursesCount(700) }})</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.program_level_courses', [base64_encode($program->id), 800]) }}">
                                                Show ({{ $program->levelCoursesCount(800) }})</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.program_level_courses', [base64_encode($program->id), 900]) }}">
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
                                                 Second Semester </a>

                                                 </td>


                                        <td><a class="btn btn-outline-dark"
                                                href="{{ route('academia.department.export_view', [$program->id, 200, 1]) }}">
                                                First Semester </a>
                                                   <br><br>
                                                <a class="btn btn-outline-primary"
                                                href="{{ route('academia.department.export_view', [$program->id, 200, 2]) }}">
                                                 Second Semester </a>
                                                    {{--  <a class="btn btn-outline-primary"
                                                href="{{ route('academia.department.generatePDF', [$program->id, 200, 2]) }}">
                                                 Second Semester test </a>  --}}
                                                 </td>
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
                                                 Second Semester)</a>
                                                 </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
