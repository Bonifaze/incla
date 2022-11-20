@extends('layouts.mini')



@section('pagetitle') Show User Role details  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('usersb-open') menu-open @endsection

@section('usersb') active @endsection

<!-- Page -->
 @section('user-list') active @endsection
 
 <!-- End Sidebar links -->



@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">
         
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ $user->full_name }}</h3>
				</div>
            
             <div class="table-responsive">
  
						<table class="table table-striped">
						  <thead>
							
							  <th>Data Id</th>
							  <th>Name</th>
							 <th>Email</th>
							 <th>Phone</th>
							  <th>Action</th>
							  <th>Action</th>
							  
							
						  </thead>
						  
						  
						  <tbody>
						  
						  <tr>
							  <td>{{ $user->id }}</td>
							  <td>{{ $user->full_name }}</td>
							 <td>{{ $user->email }}</td>
							 <td>{{ $user->phone }}</td>
							  <td><a href="{{ route('user.edit',$user->id) }}"> Edit </td>
							    @if ($user->status == 1)
							    <td> 
								{!! Form::open(['method' => 'patch', 'action' => 'UsersController@disable', 'id'=>'disableUForm'.$user->id]) !!}
				    		{{ Form::hidden('id', $user->id) }}
				    		{{ Form::hidden('status', 2) }}
				    		{{ Form::hidden('action', "disabled") }}
				    		
				    		
				    		<button type="submit" class="btn btn-danger" ><span class="icon-line2-trash"></span> Disable</button>
				    		{!! Form::close() !!}	
							
							 </td>
							 
				    		@elseif ($user->status == 2)
							 <td> 
								{!! Form::open(['method' => 'patch', 'action' => 'UsersController@disable', 'id'=>'enableUForm'.$user->id]) !!}
				    		{{ Form::hidden('id', $user->id) }}
				    		{{ Form::hidden('status', 1) }}
				    		{{ Form::hidden('action', "enabled") }}
				    		
				    		<button type="submit" class="btn btn-success" ><span class="icon-line2-trash"></span> Enable</button>
				    		{!! Form::close() !!}	
							
							 </td>
							  
							  @endif
							</tr>
						
						  </tbody>
						  
						  
						  
						</table>
						
						
            </div>
            
             <div class="card card-teal"> 
            <div class="card-header">
                <h4 class="card-title"> List of assigned Roles</h4>
				</div>
				 </div>
           
            
              <div class="table-responsive">
  
						<table class="table table-striped">
						  <thead>
							
							  <th>#</th>
							  <th>Name</th>
							 <th>Description</th>
							  <th>Action</th>
							 
							
						  </thead>
						  
						  
						  <tbody>
						  
						  @foreach ($roles as $key => $role)
						  
							<tr>
							  <td>{{ $loop->iteration }}</td>
							  <td>{{ $role->name }}</td>
							 <td>{{ $role->description }}</td>
							 <td> 
							{!! Form::open(['method' => 'Post', 'route' => 'rbac.remove-role', 'id'=>'removeRForm'.$role->id]) !!}
				    		{{ Form::hidden('role_id', $role->id) }}
				    		{{ Form::hidden('user_id', $user->id) }}
				    		
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
							
							  <th>#</th>
							  <th>Name</th>
							 <th>Description</th>
							  <th>Action</th>
							  
							
						  </thead>
						  
						  
						  <tbody>
						  
						  @foreach ($rls as $key => $rl)
						  
							<tr>
							  <td>{{ $loop->iteration }}</td>
							  <td>{{ $rl->name }}</td>
							 <td>{{ $rl->description }}</td>
							 
							  <td> 
							{!! Form::open(['method' => 'Post', 'route' => 'rbac.assign-role', 'id'=>'addRForm'.$rl->id]) !!}
				    		{{ Form::hidden('role_id', $rl->id) }}
				    		{{ Form::hidden('user_id', $user->id) }}
				    		
				    		<button onclick="submitAForm({{$rl->id}})" type="button" class="{{$rl->id}} btn btn-primary" ><span class="icon-line2-trash"></span> Assign</button>
				    		{!! Form::close() !!}	
				    		
							 </td>
							 
				    		
							</tr>
							
							@endforeach	
							
						  </tbody>
						  
						  
						  
						</table>
						 
						 
						
            </div>
            
            
            
            
            
             <div class="card card-success"> 
            <div class="card-header">
                <h4 class="card-title">User Effective Permissions</h4>
				</div>
           </div>
            
            
            
            
             <div class="table-responsive">
  
						<table class="table table-striped">
						  <thead>
							
							  <th>#</th>
							  <th>Name</th>
							 <th>Description</th>
							 
							
						  </thead>
						  
						  
						  <tbody>
						  
						  
							@foreach ($perms as $key => $perm)
						  
							<tr>
							  <td>{{ $loop->iteration }}</td>
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

