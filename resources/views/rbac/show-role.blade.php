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
                   {{ $role->name}}
                    </h1>

            <div class="card">


             <div class="table-responsive">

						<table class="table table-striped">
						  <thead>

							  {{--  <th>Data Id</th>  --}}
							  <th>Name</th>
							 <th>Description</th>
							 <th>Action</th>
							  <th>Action</th>


						  </thead>


						  <tbody>

						  <tr>
							  {{--  <td>{{ $role->id }}</td>  --}}
							  <td>{{ $role->name }}</td>
							 <td>{{ $role->description }}</td>
							  <td><a href="{{ route('rbac.edit-role',$role->id) }}" class="btn btn-default"> Edit </a></td>

							    <td>
							    {!! Form::open(['method' => 'Patch', 'route' => 'rbac.delete-role', 'id'=>'deleteRoleForm'.$role->id]) !!}
				    		{{ Form::hidden('id', $role->id) }}


				    		<button onclick="deleteRForm({{$role->id}})" type="button" class="{{$role->id}} btn btn-danger" ><span class="icon-line2-trash"></span> Delete</button>
				    		{!! Form::close() !!}

							 </td>


							</tr>

						  </tbody>



						</table>


            </div>

             <div class="card card-success">
            <div class="card-header">
                <h4 class="card-title">List of assigned permissions</h4>
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

						  @foreach ($permissions as $key => $permission)

							<tr>
							  <td>{{ $loop->iteration }} <input type="checkbox"></td>
							  <td>{{ $permission->name }}</td>
							 <td>{{ $permission->description }}</td>
							 <td>
							{!! Form::open(['method' => 'Post', 'route' => 'rbac.remove-perm', 'id'=>'removePForm'.$permission->id]) !!}
				    		{{ Form::hidden('perm_id', $permission->id) }}
				    		{{ Form::hidden('role_id', $role->id) }}

				    		<button onclick="submitRForm({{$permission->id}})" type="button" class="{{$permission->id}} btn btn-danger" ><span class="icon-line2-trash"></span> Remove</button>
				    		{!! Form::close() !!}

							 </td>


							</tr>

							@endforeach

						  </tbody>



						</table>

<div>


				    		<button onclick="submitRForm" type="button" class="btn btn-danger mb-4 ml-4" ><span class="icon-line2-trash"></span> Remove</button>
				    		</div>

            </div>









            <div class="card card-info">
            <div class="card-header">
                <h4 class="card-title">Available permissions</h4>
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

						  @foreach ($perms as $key => $perm)

							<tr>
							  <td>{{ $loop->iteration }}<input type="checkbox"></td>
							  <td>{{ $perm->name }}</td>
							 <td>{{ $perm->description }}</td>

							  <td>
							{!! Form::open(['method' => 'Post', 'route' => 'rbac.assign-perm', 'id'=>'addPForm'.$perm->id]) !!}
				    		{{ Form::hidden('perm_id', $perm->id) }}
				    		{{ Form::hidden('role_id', $role->id) }}

				    		<button onclick="submitAForm({{$perm->id}})" type="button" class="{{$perm->id}} btn btn-primary" ><span class="icon-line2-trash"></span> Assign</button>
				    		{!! Form::close() !!}

							 </td>


							</tr>

							@endforeach

						  </tbody>



						</table>
<div>{!! Form::open(['method' => 'Post', 'route' => 'rbac.assign-perm', 'id'=>'addPForm'.$perm->id]) !!}
				    		{{ Form::hidden('perm_id', $perm->id) }}
				    		{{ Form::hidden('role_id', $role->id) }}

				    		<button onclick="submitAForm({{$perm->id}})" type="button" class="{{$perm->id}} btn btn-primary" ><span class="icon-line2-trash"></span> Assign</button>
				    		{!! Form::close() !!}
</div><br>


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




 			function submitRForm(id)
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to assign remove this permission</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("removePForm"+id).submit();
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



    </script>
    @endsection

