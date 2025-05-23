@extends('layouts.mini')



@section('pagetitle') Program Course Results  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('staff-open') menu-open @endsection

@section('staff') active @endsection

<!-- Page -->
 @section('staff-results') active @endsection

 <!-- End Sidebar links -->




@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">


            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Program Course Results</h3>
				</div>

            @include('partialsv3.flash')

             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>Id</th>
							  <th>Course Code</th>
							  <th>Course Title</th>
							  <th>Program</th>
							  <th>Level</th>
							  <th>Credit</th>
							  <th>Session</th>
							  <th>Semester</th>
							  <th>Result</th>


						  </thead>


						  <tbody>

						  @foreach ($pcourses as $key => $pcourse)

							<tr>
							  <td>{{ $loop->iteration }}</td>
							  <td>{{ $pcourse->course->code }}</td>
								<td>{{ $pcourse->course->title }}</td>
							   <td>{{ $pcourse->program->name }}</td>
							   <td>{{ $pcourse->level }}</td>
							 <td>{{ $pcourse->hours }}</td>
								<td>{{ $pcourse->session->name }}</td>
								<td>{{ $pcourse->semester }}</td>
							 <td> {{ $pcourse->results_count}} <a href="{{ route('program_course.result',base64_encode($pcourse->id)) }}"> (View) </a></td>

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

		function submitPCourse(id)
		{
			bootbox.dialog({
				message: "<h4>Confirm you want to submit this course?</h4>",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success',
						callback: function(){
							document.getElementById("submitPCourseForm"+id).submit();
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


		function revokePCourse(id)
		{
			bootbox.dialog({
				message: "<h4>Confirm you want to revoke your submission?</h4>",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success',
						callback: function(){
							document.getElementById("revokePCourseForm"+id).submit();
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
