@extends('layouts.mini')



@section('pagetitle') Show Security Role details  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('rbac-open') menu-open @endsection

@section('rbac') active @endsection

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
                   {{ $roles->name}}
                    </h1>

            <div class="card">


             <div class="table-responsive">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
							  <th>Name</th>
                            <th>Phone</th>

                <th></th>
							  <th>Action</th>


						  </thead>


						  <tbody>
                      @foreach ($role as $key => $roles)
						  <tr>
							  <td>{{ $loop->iteration  }}</td>
							  <td>{{ $roles->staff->full_name ?? null }}</td>
							 <td>{{ $roles->staff->phone ?? null }}</td>



							    <td>
								{!! Form::open(['method' => 'Post', 'route' => 'rbac.remove-role', 'id'=>'removeRForm'.$roles->role_id]) !!}
				    		{{ Form::hidden('role_id', $roles->role_id) }}
				    		{{ Form::hidden('staff_id', $roles->staff_id) }}

				    	{{--	<button onclick="submitRForm({{$roles->role_id}})" type="button" class="{{$roles->role_id}} btn btn-danger" ><span class="icon-line2-trash"></span> Remove Role</button> --}}
				    		{!! Form::close() !!}
							 </td>
               		<td><a href="{{ route('staff.show',$roles->staff_id) }}" class="btn btn-default"> Show </a></td>
		<td><a href="{{ route('staff.security', $roles->staff_id) }}" class="btn btn-default"> Remove Role</a></td>



@if($roles->staff_id == Auth::guard('staff')->user()->id)
							   <td class="info">
							   <strong>Logged</strong>
							    </td>

							    @elseif ($roles->staff->status == 1 ?? null)
							    <td>
								{!! Form::open(['method' => 'patch', 'action' => 'StaffController@disable', 'id'=>'disableUForm'.$roles->staff_id]) !!}
				    		{{ Form::hidden('id', $roles->staff_id) }}
				    		{{ Form::hidden('status', 2) }}
				    		{{ Form::hidden('action', "disabled") }}


				    		<button type="submit" class="btn btn-danger" ><span class="icon-line2-trash"></span> Disable</button>
				    		{!! Form::close() !!}

							 </td>

				    		@elseif ($roles->staff->status == 2 ?? null)
							 <td>
								{!! Form::open(['method' => 'patch', 'action' => 'StaffController@disable', 'id'=>'enableUForm'.$roles->staff_id]) !!}
				    		{{ Form::hidden('id', $roles->staff_id) }}
				    		{{ Form::hidden('status', 1) }}
				    		{{ Form::hidden('action', "enabled") }}

				    		<button type="submit" class="btn btn-success" ><span class="icon-line2-trash"></span> Enable</button>
				    		{!! Form::close() !!}

							 </td>

							  @endif
							</tr>
@endforeach
						  </tbody>



						</table>


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
<script src="<?php echo asset('dist/js/bootbox.min.js')?>"></script>

 <script>


 			function submitAForm(id)
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to assign this permission</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("addPForm"+id).submit();
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







 			function deleteRForm(id)
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to delete this role</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("deleteRoleForm"+id).submit();
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
	function submitRForm(id)
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to assign remove this Role</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("removeRForm"+id).submit();
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

