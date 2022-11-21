@php

if(!session('adminId'))
{

  header('location: /adminLogin');
  exit;
}
@endphp
@extends('layouts.app')

@section('content')

<!-- Page Wrapper -->
<div id="wrapper">

    @include('layouts.sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Begin Page Content -->
        <div class="container-fluid p-5">

            <!-- Page Heading -->
            <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h5 mb-2 p-2 fw-bold text-capitalize text-success">Administrator Dashboard</h1>
            </div> -->

            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="body">
                                <h4 class="card-title mb-4">
                                    {{ $course->course_title }}
                                </h4>
                                @if($errors->any())
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
                                <form method="post" action="/admin/upload">
                                  @csrf
                                  <div class="table-responsive mt-5 mb-4">
                                      <table class="table table-bordered table-striped table-hover">
                                          <thead>
                                              <tr>
                                                  <th>#</th>
                                                  <th>Student Name</th>
                                                  <th>Matric Number</th>
                                                  <th>Course Code</th>
                                                  <th>CA Score</th>
                                                  <th>Exam Score</th>
                                                  <th>Total Score</th>
                                                  <th>Grade</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <input type="hidden" name="session" value="{{ $student_registered_courses[0]->session }}">
                                            <input type="hidden" name="level" value="{{ $student_registered_courses[0]->level }}">
                                            <input type="hidden" name="semester" value="{{ $student_registered_courses[0]->semester }}">
                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                              @foreach ($student_registered_courses as $student_course)
                                                  <tr>
                                                      <td>{{ $loop->iteration }}</td>
                                                      <td>{{ $student_course->student_name }} <input type="hidden" name="reg_ids[]" value="{{ $student_course->id }}"></td>
                                                      <td>{{ $student_course->student_matric }}</td>
                                                      <td>{{ $student_course->course_code }}</td>
                                                      <td><input type="number" name="ca_scores[]" value="{{ $student_course->ca_score }}" id="{{ 'ca'.$student_course->student_id }}" class="form-control"></td>
                                                      <td><input type="number" name="exam_scores[]" value="{{ $student_course->exam_score }}" id="{{ 'exam'.$student_course->student_id }}" class="form-control"></td>
                                                      <td><input type="number" name="total_scores[]" value="{{ $student_course->ca_score + $student_course->exam_score }}" class="form-control" readonly></td>
                                                      <td>{{ $student_course->grade }}</td>
                                                  </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                                  </div>
                                  <div class="mb-4">
                                    <button type="submit" name="button" class="btn btn-success">Save & submit for approval</button>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Footer -->
            <!--  -->
            <!-- End of Footer -->

        </div>

    </div>
    <!-- End of Content Wrapper -->

    @endsection
