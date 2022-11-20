@extends('layouts.mini')



@section('pagetitle') List of Staff  @endsection



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
                    List of Staff 
                </h1>
            <div class="card">
             
            
             <div class="table-responsive card-body">
  
						<table class="table table-striped">
						  	<thead>
						  	  <th>S/N</th>
							  {{--  <th>DB ID</th>  --}}
                                <th>Passport</th>
							  <th>Name</th>
							  <th>Email</th>
							  <th>Phone</th>
							  <th col-span="3">Action</th>
							  {{--  <th>Action</th>
							  <th>Action</th>
							  <th>Action</th>  --}}
							 
							</thead>
						  
						  
						  <tbody>
						  
						  @foreach ($staff as $key => $stf)
						 
							<tr>
							  <td>{{ $key + $staff->firstItem() }}</td>
                              <td><div class="image">
          						<img src="data:image/png;base64,{{ $stf->passport }}" class="img-circle elevation-2" height ="100" alt="{{$stf->fullName}} Image">
        						</div></td>
							  {{--  <td>{{ $stf->id }}</td>  --}}
							  <td>{{ $stf->fullName }}</td>
							   <td> {{ $stf->username }}</td>
							    <td> {{ $stf->phone}} </td>
							     <td><a href="{{ route('staff.view',$stf->id) }}" class="btn btn-default"> View </a></td>
								<td><a href="{{ route('staff.show',$stf->id) }}" class="btn btn-default"> Edit </a></td>
								{{--  <td><a href="{{ route('staff.edit',$stf->id) }}"> Edit </a></td>  --}}
							   
        						
        						@if($stf->id == Auth::guard('staff')->user()->id)
							   <td class="info"> 
							   <strong>Logged</strong>
							    </td>
							   
							    @elseif ($stf->status == 1)
							    <td> 
								{!! Form::open(['method' => 'patch', 'action' => 'StaffController@disable', 'id'=>'disableUForm'.$stf->id]) !!}
				    		{{ Form::hidden('id', $stf->id) }}
				    		{{ Form::hidden('status', 2) }}
				    		{{ Form::hidden('action', "disabled") }}
				    		
				    		
				    		<button type="submit" class="btn btn-danger" ><span class="icon-line2-trash"></span> Disable</button>
				    		{!! Form::close() !!}	
							
							 </td>
							 
				    		@elseif ($stf->status == 2)
							 <td> 
								{!! Form::open(['method' => 'patch', 'action' => 'StaffController@disable', 'id'=>'enableUForm'.$stf->id]) !!}
				    		{{ Form::hidden('id', $stf->id) }}
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
						 {!! $staff->render() !!}
						 
						
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



