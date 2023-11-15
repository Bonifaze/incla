@extends('layouts.mini')



@section('pagetitle') Semester Result Remark  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('results-opxen') menu-open @endsection

@section('resultxs') active @endsection
 <!-- End Sidebar links -->



@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">

         @include('partialsv3.flash')

        <div class="card card-success">
            <div class="card-header">
                <h4 class="card-title">Courses added  for {{$student->fullName}}</h4>
				</div>
           </div>

           <div class="table-responsive">

						<table class="table table-striped">
						  <thead>

							  <th>#</th>
							  <th>Course Code</th>
							  <th>Course Title</th>
                               <th>Course Type</th>
							 <th>Action</th>

						  </thead>

						  <tbody>

                          @foreach ($outstandings as $key => $out)

                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $out->course->course_code }}</td>
                                  <td>{{ $out->course->course_title }}</td>

                                  @if ($out->type=='co')
                                    <td>Carry Over</td>
                                  @else
                                       <td>Outstanding</td>
                                  @endif

                                 <td>
                                      {!! Form::open(['method' => 'Delete', 'route' => 'result.remove_semester_remark', 'id'=>'removeRCourse'.$out->id]) !!}
                                      {{ Form::hidden('id', $out->id) }}
                                     {{ Form::hidden('student_id', $student->id) }}
                                     {{--  {{ Form::hidden('semester_registration_id', $registration->id) }}  --}}

                                      <button onclick="removeRCForm({{$out->id}})" type="button" class="{{$out->id}} btn btn-danger" ><span class="icon-line2-trash"></span> Remove</button>
                                      {!! Form::close() !!}
                                  </td>
                              </tr>

                          @endforeach



    </tbody>



  </table>


</div>




            <!-- form start -->

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Remark Courses for {{$student->fullName}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                {!! Form::open(array('route' => 'result.add_semester_remark', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
                <div class="card-body">

                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="course_id">Course :</label>
                                {{ Form::select('course_id', $courses, null,['class' => 'form-control', 'id' => 'course_id', 'name' => 'course_id']) }}
                                <span class="text-danger"> {{ $errors->first('course_id') }}</span>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="type">Type:</label>
                                {{ Form::select('type', [
                                    'out' => 'Outstanding',
                                    'co' => 'Carry Over'],
                                    'co',
                                        ['class' => 'form-control select2']
                                    ) }}
                                <span class="text-danger"> {{ $errors->first('type') }}</span>
                            </div>

                             <div class="col-md-4 mt-3 form-group">
                                  <div style="margin-left:50px; margin-top:15px">
                    {{ Form::submit('Add Course', array('class' => 'btn btn-primary')) }}
                </div>
                            </div>

                        </div>
                        {{ Form::hidden('student_id', $student->id) }}

                    </div>
                </div>
                <!-- /.card-body -->
                {{--  <div class="card-footer">
                    {{ Form::submit('Add Course', array('class' => 'btn btn-primary')) }}
                </div>  --}}
                <!-- /.box-body -->
                {!! Form::close() !!}
            </div>
<!-- /.form end -->

</div>
<!--/.col (left) -->

</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
@endsection

@section('pagescript')
<script src="<?php echo asset('dist/js/bootbox.min.js')?>"></script>



<script>



function removeRCForm(id)
{
bootbox.dialog({
message: "<h4>Confirm you want to remove this course</h4>",
buttons: {
confirm: {
  label: 'Yes',
  className: 'btn-success',
  callback: function(){
      document.getElementById("removeRCourse"+id).submit();
      }
},
cancel: {
  label: 'No',
  className: 'btn-danger',
  }
},
callback: function (result) {}

});
// e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
}

</script>@endsection

