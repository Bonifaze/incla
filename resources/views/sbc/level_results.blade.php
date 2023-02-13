@extends('layouts.mini')



@section('pagetitle') {{$level}} Level Semester Results  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('vc-open') menu-open @endsection

@section('vc') active @endsection

<!-- Page -->
 @section('vc-list') active @endsection

 <!-- End Sidebar links -->



@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">

			@php
				$session_id = $session->currentSession();
                $semester = $session->currentSemester();
			    $semesterName =  $session->semesterName($semester);
			@endphp
            <div class="card card-primary">
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                      {{$semesterName}} {{$level}} Level {{$session->currentSessionName()}} Result status SBC Approval
                    </h1>

            @include('partialsv3.flash')
             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>#</th>
							  <th>Department</th>
							  <th>Program</th>
							  {{--  <th>Results ready</th>
							   <th>Results Outstanding</th>
							   <th>Results Approved</th>  --}}
							   <th>Students Total</th>
							 <th>Action</th>



						  </thead>


						  <tbody>

						  @foreach ($programs as $key => $program)
						   @php
						   $notReady = $program->vcNotReadyProgramCourses($session_id,$semester,$level);

                           $students = $program->allregisteredStudentsCount($session_id,$semester,$level);

							 @endphp
						   <tr>
							  <td>{{ $loop->iteration }}</td>
							  <td>{{ $program->department->name }}</td>
							  <td>{{ $program->name }}</td>
							  {{--  <td> {{ $ready }} </td>  --}}
							  {{--  <td> {{ $notReady }} </td>  --}}
							  {{--  <td> {{ $approved }} </td>  --}}
							  <td> {{ $students}} </td>
                               <td><a href="/staff-course/approve?by=sbc&level={{$level}} &program_id={{ $program->id }}" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a><a href="/staff-course/revoke?by=sbc&level={{$level}} &program_id={{ $program->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a></td>




							</tr>

							@endforeach

						  </tbody>



						</table>
						 {{--  {!! $programs->render() !!}  --}}


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




		function approveResult(id,program,level)
		{
			bootbox.dialog({
				message: "<h4>Confirm you want to approve result for " + program + " " + level + " level ?</h4>",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success',
						callback: function(){
							document.getElementById("approveResultForm"+id).submit();
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

