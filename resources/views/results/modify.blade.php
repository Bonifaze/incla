{{--  @php

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
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Score Upload
                    </h1>

                    <div class="card shadow border border-success">

     <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-4">
                                    Student Result
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="body">
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
                                    <form method="POST" action="/results/update">
                                        @csrf
                                        <div class="table-responsive mt-5 mb-4">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Course Title</th>
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
                                                    @foreach ($registered_courses as $student_course)
                                                    <input type="hidden" name="reg_ids[]" value="{{ $student_course->id }}">
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $student_course->course_title }}</td>
                                                            <td>{{ $student_course->course_code }}</td>
                                                            <td><input type="number" name="ca1_scores[]"
                                                                    value="{{ $student_course->ca1_score }}"
                                                                    id="{{ 'ca1' . $student_course->student_id }}"
                                                                    class="form-control ca"></td>
                                                            <td><input type="number" name="ca2_scores[]"
                                                                value="{{ $student_course->ca2_score }}"
                                                                id="{{ 'ca2' . $student_course->student_id }}"
                                                                class="form-control ca"></td>
                                                            <td><input type="number" name="ca3_scores[]"
                                                                value="{{ $student_course->ca3_score }}"
                                                                id="{{ 'ca3' . $student_course->student_id }}"
                                                                class="form-control ca"></td>
                                                            <td><input type="number" name="exam_scores[]"
                                                                    value="{{ $student_course->exam_score }}"
                                                                    id="{{ 'exam' . $student_course->student_id }}"
                                                                    class="form-control exam"></td>
                                                            <td><input type="number" name="total_scores[]"
                                                                    value="{{ $student_course->total }}"
                                                                    class="form-control" readonly></td>
                                                            <td>{{ $student_course->grade }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mb-4">
                                            <button type="submit" name="button" class="btn btn-success">Update Scores</button>
                                        </div>
                                    </form>
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


    <!--<div class="modal fade" id="uploadModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Scoresheet</h4>
                    <a href="#" class="close" data-dismiss="modal">&times;</a>
                </div>
                <div class="modal-body">
                    <form action="/admin/upload-scores" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="file">Scoresheet</label>
                            <input type="file" name="file" id="file" class="form-control" accept=".csv">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>-->
@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
    <script>
        $('body').on('keyup', '.ca', function () {
            let input = $(this)
            input.parent().find($('.xs')).remove()
            if (input.val() > 10)
            {
                input.parent().append(`<span class="text-danger text-small text-sm xs">The input value should be less than or equals 10</span>`);
            }else{
                input.parent().find($('.xs')).remove()
            }
        })
        $('body').on('keyup', '.exam', function () {
            let input = $(this)
            input.parent().find($('.ex')).remove()
            if (input.val() > 70)
            {
                input.parent().append(`<span class="text-danger text-small text-sm ex">The input value should be less than or equals 70</span>`);
            }else{
                input.parent().find($('.ex')).remove()
            }
        })
    </script>
@endsection
