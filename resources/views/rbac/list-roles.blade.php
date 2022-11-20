@extends('layouts.mini')



@section('pagetitle') List Security Roles  @endsection



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
                   LIST OF ALL ROLES
                    </h1>
            <div class="card ">
              {{--  <div class="card-header">
                <h3 class="card-title">List of all active Security Roles</h3>
				</div>  --}}

             <div class="table-responsive card-body">


						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
							  <th>Name</th>
							 <th>Description</th>
							  <th>Action</th>
							  <th>Action</th>
							  <th>Action</th>


						  </thead>


						  <tbody>

						  @foreach ($roles as $key => $role)

							<tr>
							  <td>{{ $loop->iteration }}</td>
							  <td>{{ $role->name }}</td>
							 <td>{{ $role->description }}</td>
							 <td><a href="{{ route('rbac.show-role',$role->id) }}" class="btn btn-default"> Show </td>

							 <td><a href="{{ route('rbac.edit-role',$role->id) }}" class="btn btn-default"> Edit </td>

							    <td>
							    {!! Form::open(['method' => 'Patch', 'route' => 'rbac.delete-role', 'id'=>'deleteRoleForm'.$role->id]) !!}
				    		{{ Form::hidden('id', $role->id) }}


				    		<button onclick="deleteRForm({{$role->id}})" type="button" class="{{$role->id}} btn btn-danger" ><span class="icon-line2-trash"></span> Delete</button>
				    		{!! Form::close() !!}

							 </td>


							</tr>

							@endforeach

						  </tbody>



						</table>
						 {!! $roles->render() !!}


           </div>
            </div>
              <!-- /.card-body -->
            </div>

          </div>
          <!-- /.box -->


    </section>
    <!-- /.content -->
  </div>
@endsection

@section('pagescript')
<script src="{{ asset('dist/js/bootbox.min.js')}}"></script>

 <script>




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


