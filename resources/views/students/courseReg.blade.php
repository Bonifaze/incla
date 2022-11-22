@extends('layouts.student')

@section('pagetitle')  Course Registration @endsection

@section('course-open') menu-open @endsection

@section('course') active @endsection

@section('registration') active @endsection


@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-10 border border-success p-4 m-4">
          <label>Courses</label>
          <div class="form-check">
          @foreach ($courses as $courses)
            <input class="form-check-input" type="checkbox" id="course" name="course[]" value="">
            <label class="form-check-label"> {{$courses -> course_code}}</label>
            @endforeach
          </div>



        </div>
        <div class="col-lg-2 col-10 border border-success p-4 m-2">
          <div><a href="" class="btn btn-primary">Add Courses </a></div>
          <div> <a href="" class="btn btn-danger">Remove Courses </a></div>


        </div>
        <div class="col-lg-4 col-10 border border-success p-4 m-4">
          <label>Selected Courses</label>
          <div>
            <ol>
              <li> csc101 </li>

            </ol>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection

@section('pagescript')
<script src="<?php echo asset('dist/js/bootbox.min.js') ?>"></script>

@endsection
