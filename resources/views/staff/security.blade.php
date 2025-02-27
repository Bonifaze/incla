@extends('layouts.mini')



@section('pagetitle') Show Staff Role details  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('staff-open') menu-open @endsection

@section('staff') active @endsection

<!-- Page -->
 @section('list-staff') active @endsection

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
                       {{ $staff->fullName }}
                    </h1>
            <div class="card ">

				@include('partialsv3.flash')
             <div class="table-responsive">

						<table class="table table-striped">
						  <thead>

							  {{--  <th>Data Id</th>  --}}
							  <th>Name</th>
							 <th>Email</th>
							 <th>Phone</th>
                             <th>email</th>


						  </thead>


						  <tbody>

						  <tr>
							  {{--  <td>{{ $staff->id }}</td>  --}}
							  <td>{{ $staff->fullName }}</td>
							 <td>{{ $staff->email }}</td>
							 <td>{{ $staff->phone }}</td>
							 <td>{{ $staff->username }}</td>

							</tr>

						  </tbody>



						</table>


            </div>

             <div class="card card-info">
            <div class="card-header">
                <h4 class="card-title"> List of assigned Roles</h4>
				</div>
				 </div>


              <div class="table-responsive">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
							  <th>Name</th>
							 <th>Description</th>
							  <th>Action</th>


						  </thead>


						  <tbody>

						  @foreach ($roles as $key => $role)

							<tr>

							  <td>{{ $loop->iteration }} <input type="checkbox"></td>
							  <td>{{ $role->name }}</td>
							 <td>{{ $role->description }}</td>
							 <td>
							{!! Form::open(['method' => 'Post', 'route' => 'rbac.remove-role', 'id'=>'removeRForm'.$role->id]) !!}
				    		{{ Form::hidden('role_id', $role->id) }}
				    		{{ Form::hidden('staff_id', $staff->id) }}

				    		<button onclick="submitRForm({{$role->id}})" type="button" class="{{$role->id}} btn btn-danger" ><span class="icon-line2-trash"></span> Remove Role</button>
				    		{!! Form::close() !!}

							 </td>


							</tr>

							@endforeach

						  </tbody>



						</table>



            </div>








              <div class="card card-info">
            <div class="card-header">
                <h4 class="card-title"> Available Roles</h4>
				</div>
           </div>



             <div class="table-responsive">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
							  <th>Name</th>
							 <th>Description</th>
							  <th>Action</th>


						  </thead>


						  <tbody>

						  @foreach ($rls as $key => $rl)

							<tr>
							  <td>{{ $loop->iteration }}<input type="checkbox"></td>
							  <td>{{ $rl->name }}</td>
							 <td>{{ $rl->description }}</td>

							  <td>
							{!! Form::open(['method' => 'Post', 'route' => 'rbac.assign-role', 'id'=>'addRForm'.$rl->id]) !!}
				    		{{ Form::hidden('role_id', $rl->id) }}
				    		{{ Form::hidden('staff_id', $staff->id) }}

				    		<button onclick="submitAForm({{$rl->id}})" type="button" class="{{$rl->id}} btn btn-primary" ><span class="icon-line2-trash"></span> Assign</button>
				    		{!! Form::close() !!}

							 </td>


							</tr>

							@endforeach

						  </tbody>


						</table>


<div>
	{!! Form::open(['method' => 'Post', 'route' => 'rbac.assign-role', 'id'=>'addRForm'.$rl->id]) !!}
				    		{{ Form::hidden('role_id', $rl->id) }}
				    		{{ Form::hidden('staff_id', $staff->id) }}

				    		<button onclick="submitAForm({{$rl->id}})" type="button" class="{{$rl->id}} btn btn-primary" ><span class="icon-line2-trash"></span> Assign Roles</button>
				    		{!! Form::close() !!}</div><br>

            </div>





             <div class="card card-success">
            <div class="card-header">
                <h4 class="card-title">Staff Effective Permissions</h4>
				</div>
           </div>




             <div class="table-responsive">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
							   {{--  <th>Permission Id</th>  --}}
							  <th>Name</th>
							 <th>Description</th>


						  </thead>


						  <tbody>


							@foreach ($perms as $key => $perm)

							<tr>
							  <td>{{ $loop->iteration }}</td>
							  {{--  <td>{{ $perm->id }}</td>  --}}
							  <td>{{ $perm->name }}</td>
							 <td>{{ $perm->description }}</td>

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
                message: "<h4>Confirm you want to assign this Role</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("addRForm"+id).submit();
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

