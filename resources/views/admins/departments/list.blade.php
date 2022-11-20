@extends('layouts.mini')



@section('pagetitle') List of Admin Departments  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('school-open') menu-open @endsection

@section('school') active @endsection

<!-- Page -->
 @section('list-admins') active @endsection

 <!-- End Sidebar links -->



@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">

          @include('partialsv3.flash')
                 <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                       List of Administrative Departments
                    </h1>

            <div class="card ">


             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
							  <th>Name</th>
							  <th>Parent</th>
							 <th>Action</th>
                              <th>Action</th>
							 {{--  <th>Action</th>  --}}



						  </thead>


						  <tbody>

						  @foreach ($departments as $key => $department)

							<tr>
							  <td>{{ $loop->iteration }}</td>
							  <td>{{ $department->name }}</td>
							 <td>{{ $department->parent->name }}</td>

							 <td><a class="btn btn-info" href="{{ route('admin.department.staff_list',$department->id) }}"> Staff List </td>
                             <td><a class="btn btn-warning" href="{{ route('admin.department.edit',$department->id) }}"> <i class="fa fa-edit"></i> Edit </td>

                                {{--  <td>
							{!! Form::open(['method' => 'Delete', 'route' => 'admin.department.delete', 'id'=>'deleteDepartmentForm'.$department->id]) !!}
				    		{{ Form::hidden('id', $department->id) }}
				    		<button onclick="deleteDepartment({{$department->id}})" type="button" class="{{$department->id}} btn btn-danger" ><span class="icon-line2-trash"></span> Delete</button>
				    		{!! Form::close() !!}
							</td>  --}}
							</tr>

							@endforeach

						  </tbody>



						</table>
						 {!! $departments->render() !!}


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




 			function deleteDepartment(id)
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to delete this Department</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("deleteDepartmentForm"+id).submit();
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


