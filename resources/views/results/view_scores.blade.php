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
                    Courses Score
                    </h1>

                       <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="body">
                                    <h4 class="card-title mb-4">
                                        {{ $course->course_title }}
                                    </h4>
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger">
                                                {{ $error }}
                                            </div>
                                        @endforeach
                                    @endif
                                    @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    <form method="post" action="/admin/scores/approve">
                                        @csrf
                                        <div class="table-responsive mt-5 mb-4">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Student Name</th>
                                                        <th>Matric Number</th>
                                                        <th>Course Code</th>
                                                        <th>CA1 Score</th>
                                                        <th>CA2 Score</th>
                                                        <th>CA3 Score</th>
                                                        <th>Exam Score</th>
                                                        <th>Total Score</th>
                                                        <th>Grade</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <input type="hidden" name="session"
                                                        value="{{ $student_registered_courses[0]->session }}">
                                                    <input type="hidden" name="level"
                                                        value="{{ $student_registered_courses[0]->level }}">
                                                    <input type="hidden" name="semester"
                                                        value="{{ $student_registered_courses[0]->semester }}">
                                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                    @foreach ($student_registered_courses as $student_course)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $student_course->student_name }} <input type="hidden"
                                                                    name="reg_ids[]" value="{{ $student_course->id }}"></td>
                                                            <td>{{ $student_course->student_matric }}</td>
                                                            <td>{{ $student_course->course_code }}</td>
                                                            <td>{{ $student_course->ca1_score }}</td>
                                                            <td>{{ $student_course->ca2_score }}</td>
                                                            <td>{{ $student_course->ca3_score }}</td>
                                                            <td>{{ $student_course->exam_score }}</td>
                                                            <td>{{ $student_course->ca_score + $student_course->exam_score }}
                                                            </td>
                                                            <td>{{ $student_course->grade }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mb-4">
                                            <button type="submit" name="button" class="btn btn-success">Approve
                                                Scores</button>
                                            <a href="/admin/scores/decline/{{ $course->id }}"
                                                class="btn btn-danger">Decline Scores</a>
                                        </div>
                                    </form>
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
