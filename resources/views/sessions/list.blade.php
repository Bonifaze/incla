@extends('layouts.mini')



@section('pagetitle') List of Academic Sessions  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('school-open') menu-open @endsection

@section('school') active @endsection

<!-- Page -->
 @section('list-sessions') active @endsection

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
                     List of Academics Sessions
                    </h1>

            @include('partialsv3.flash')
             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
							  <th>Name</th>
							  <th>Start</th>
							  <th>End</th>
							   <th>Semester</th>
							   <th>Status</th>
							 <th>Action</th>
							  <th>Action</th>




						  </thead>


						  <tbody>

						  @foreach ($sessions as $key => $session)

							<tr>
							  <td>{{ $loop->iteration }}</td>
							  <td>{{ $session->name }}</td>
							   <td>{{ $session->start_date }}</td>
							   <td>{{ $session->end_date }}</td>
							    {{--  <td>{{ $session->semester }}</td>  --}}
                                   @if ( $session->semester  == 1)
                             <td> First </td>
                             @else ( $session->semester  == 2)
                             <td>Second </td>
                             @endif
       @if ( $session->status == 1)
                             <td> Active </td>
                             @else
                             <td>Deactive </td>
                             @endif
							 {{--  <td>{{ $session->status }}</td>  --}}
								<td><a class="btn btn-warning" href="{{ route('session.edit',$session->id) }}"> <i class="fa fa-edit"></i> Edit </td>

							@if ($session->status == 1)
									<td>Current Session</td>
								@elseif($session->status == 0)
							 <td>
									{!! Form::open(['method' => 'Patch', 'route' => 'session.set_current', 'id'=>'setCurrentForm'.$session->id]) !!}
									{{ Form::hidden('id', $session->id) }}


									<button onclick="setCurrent({{$session->id}})" type="button" class="{{$session->id}} btn btn-primary" > Set Current</button>
									{!! Form::close() !!}

								</td>
				    		@endif
							</tr>

							@endforeach

						  </tbody>



						</table>
						 {!! $sessions->render() !!}


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




		function setCurrent(id)
		{
			bootbox.dialog({
				message: "<h4>Confirm you want to set this as the current session?</h4>",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success',
						callback: function(){
							document.getElementById("setCurrentForm"+id).submit();
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

