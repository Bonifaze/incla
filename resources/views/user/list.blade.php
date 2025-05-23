@extends('layouts.mini')



@section('pagetitle') List Users  @endsection



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


            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">List of all Users: Inactive users listed last</h3>
				</div>

             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>#</th>
							  <th>Name</th>
							 <th>Email</th>
							 <th>Phone</th>
							  <th>Action</th>
							  <th>Action</th>
							  <th>Action</th>


						  </thead>


						  <tbody>

						  @foreach ($users as $key => $user)

							<tr>
							  <td>{{ $loop->iteration }}</td>
							  <td>{{ $user->full_name }}</td>
							 <td>{{ $user->email }}</td>
							 <td>{{ $user->phone }}</td>
							  <td><a href="{{ route('user.show',$user->id) }}"> Show</td>
							   <td><a href="{{ route('user.edit',$user->id) }}"> Edit </td>

							   @can('disable', Auth::user())

							   @if($user->id == Auth::user()->id)
							   <td class="info">
							   <strong>Logged</strong>
							    </td>

							    @elseif ($user->status == 1)
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

							 @endcan

							</tr>

							@endforeach

						  </tbody>



						</table>
						 {!! $users->render() !!}


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



