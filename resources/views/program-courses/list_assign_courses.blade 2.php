@extends('layouts.mini')



@section('pagetitle') List of Program Courses  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('courses-open') menu-open @endsection

@section('courses') active @endsection

<!-- Page -->
 @section('list-roles') active @endsection

 <!-- End Sidebar links -->




@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">
          <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        List Program Courses
                    </h1>

            <div class="card ">


            @include('partialsv3.flash')

             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>Data Id</th>
							  <th>Course Code</th>
							  <th>Program</th>
							  <th>Level</th>
							  <th>Credit</th>
							  <th>Session</th>
							  <th>Lecturer</th>
							  <th>Action</th>
							  <th>Action</th>



						  </thead>


						  <tbody>

						  @foreach ($pcourses as $key => $pcourse)

							<tr>
							  <td>{{ $pcourse->id }}</td>
							  <td>{{ $pcourse->course->courseDescribe }}</td>
							   <td>{{ $pcourse->program->name }}</td>
							   <td>{{ $pcourse->level }}</td>
							 <td>{{ $pcourse->hours }}</td>
							 <td>{{ $pcourse->session->name }}</td>
							 {{--  <td>{{ $pcourse->lecturer->fullName }}</td>  --}}
							<td><a href="{{ route('program_course.edit',$pcourse->id) }}"> Edit </td>

							    <td>
							    {!! Form::open(['method' => 'Delete', 'route' => 'program_course.delete', 'id'=>'deletePCourseForm'.$pcourse->id]) !!}
				    		{{ Form::hidden('id', $pcourse->id) }}


				    		<button onclick="deletePCourse({{$pcourse->id}})" type="button" class="{{$pcourse->id}} btn btn-danger" ><span class="icon-line2-trash"></span> Delete</button>
				    		{!! Form::close() !!}

							 </td>
							</tr>

							@endforeach

						  </tbody>



						</table>
						 {!! $pcourses->render() !!}


            </div>

          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('pagescript')
<script src="{{ asset('dist/js/bootbox.min.js')}}"></script>

 <script>




 			function deletePCourse(id)
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to delete this program course</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("deletePCourseForm"+id).submit();
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



    </script>
    @endsection


