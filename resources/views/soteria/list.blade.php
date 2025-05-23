@extends('layouts.mini')



@section('pagetitle') List of Network Devices  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('soteria-open') menu-open @endsection

@section('soteria') active @endsection

<!-- Page -->
 @section('soteria-list') active @endsection

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
                <h3 class="card-title">List of Network Devices</h3>
				</div>
            @include('partialsv3.flash')
             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>#</th>
							  <th>Name</th>
							  <th>Mac Address</th>
							  <th>Antivirus</th>
							  <th>Expiry</th>
							   <th>Device</th>
							   <th>OS</th>
							   <th>Type</th>
							 <th>Action</th>
							  <th>Action</th>




						  </thead>


						  <tbody>

						  @foreach ($devices as $key => $device)

							<tr>
							  <td>{{ $loop->iteration }}</td>
							  <td>{{ $device->full_name }}</td>
							  <td>{{ $device->mac_address }}</td>
							  <td>{{ $device->antivirus }}</td>
							  <td>{{ $device->av_expire }}</td>
							  <td>{{ $device->device_type }}</td>
							  <td>{{ $device->os }}</td>
							  <td>{{ $device->userType() }}</td>
								<td>
									<a class="btn btn-warning" href="{{ route('soteria.edit',base64_encode($device->id)) }}"> <i class="fa fa-edit"></i> Edit
										@can('soteriaAdmin','App\Staff')
											<a class="btn btn-info" href="{{ route('soteria.admin_edit',base64_encode($device->id)) }}"> <i class="fa fa-edit"></i> Admin Edit
									@endcan
								</td>

							<td>
									{!! Form::open(['method' => 'Delete', 'route' => 'soteria.delete', 'id'=>'deleteForm'.$device->id]) !!}
									{{ Form::hidden('id', $device->id) }}


									<button onclick="deleteDevice({{$device->id}})" type="button" class="{{$device->id}} btn btn-danger" > Delete</button>
									{!! Form::close() !!}

								</td>
				    		</tr>

							@endforeach

						  </tbody>



						</table>
						 {!! $devices->render() !!}


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




		function deleteDevice(id)
		{
			bootbox.dialog({
				message: "<h4>Confirm you want to Delete this Device?</h4>",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success',
						callback: function(){
							document.getElementById("deleteForm"+id).submit();
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

