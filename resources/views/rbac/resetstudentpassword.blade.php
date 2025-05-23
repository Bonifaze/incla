@extends('layouts.mini')



@section('pagetitle') Reset All Students Password  @endsection



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


            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Reset All Students Password</h3>
				</div>

             <div class="table-responsive card-body">


						<table class="table table-striped">
						  <thead>

							  <th>#</th>

						  </thead>


						  <tbody>


							<tr>

							    <td>
							    {!! Form::open(['method' => 'POST', 'route' => 'rbac.resetstudentpassword', 'id'=>'resetStudentsForm']) !!}

				    		<button onclick="resetSForm()" type="button" class="btn btn-warning" ><span class="icon-line2-trash"></span> Reset</button>
				    		{!! Form::close() !!}

							 </td>


							</tr>


						  </tbody>



						</table>
					@if ($reset = Session::get('reset'))

			<div style="color:#090; font-weight:bolder;"> {!! $reset !!}</div>

					@endif


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




 			function resetSForm()
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to reset all students password</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("resetStudentsForm").submit();
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


