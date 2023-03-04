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

                    </h1>
            <div class="card ">

				@include('partialsv3.flash')

             <div class="card card-info">


                <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                  List of Roles Assigned to Staff
                    </h1>

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

							  <td>{{ $loop->iteration }} </td>
							  <td>{{ $role->name }}</td>
							 <td>{{ $role->description }}</td>

                       				 <td><a href="{{ route('rbac.show-staff',$role->id) }}" class="btn btn-default"> show </td>





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

