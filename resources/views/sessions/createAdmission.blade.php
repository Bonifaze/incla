@extends('layouts.mini')



@section('pagetitle')Create session Admission @endsection


<!-- Sidebar Links -->

<!-- Treeview -->
@section('rbac-open') menu-open @endsection

@section('rbac') active @endsection

<!-- Page -->
 @section('create-perm') active @endsection

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
                     CREATE SESSION Admission
                    </h1>

            <!-- form start -->

            <div class="card card-primary">
              {{--  <div class="card-header">
                <h3 class="card-title">Create User Permission</h3>
              </div>  --}}
              <!-- /.card-header -->
              <!-- form start -->


						{!! Form::open(array('route' => 'session.storeAdmission', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
<div class="card-body">
              <div class="box-body">

              			<div class="row">
              			<div class="col-md-12 form-group">
								<label for="name">Name :</label>
								{!! Form::text('name', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'name')) !!}
							 <span class="text-danger"> {{ $errors->first('name') }}</span>
							</div>
		<div class="col-md-12 form-group">
								<label for="dob">Date of Birth :</label>
								{!! Form::text('start_date', '2023-07-01', array('placeholder' => '', 'class' => 'form-control', 'id' => 'start_date', 'name' => 'start_date')) !!}
								<span class="text-danger"> {{ $errors->first('start_date') }}</span>
							</div>
              	<div class="col-md-12 form-group">
								<label for="dob">Date of Birth :</label>
								{!! Form::text('end_date', '2023-12-01', array('placeholder' => '', 'class' => 'form-control', 'id' => 'end_date', 'name' => 'end_date')) !!}
								<span class="text-danger"> {{ $errors->first('end_date') }}</span>
							</div>





							</div>





              </div>
              <!-- /.box-body -->
</div>
               <!-- /.card-body -->

                <div class="card-footer">


							{{ Form::submit('Create Session', array('class' => 'btn btn-success')) }}



                </div>
              <!-- /.box-body -->

            {!! Form::close() !!}



          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <script src="{{ asset('js/jquery.js')}}"></script>

	<!-- bootstrap datepicker -->
	<script src="{{ asset('dist/js/components/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap File Upload Plugin -->
	<script src="{{ asset('dist/js/components/bs-filestyle.js')}}"></script>

<script type="text/javascript">
	//Date picker
	    $('#start_date').datepicker({
	    	format: 'yyyy-mm-dd',
		      autoclose: true
	    })
  </script>

  <script type="text/javascript">
	//Date picker
	    $('#end_date').datepicker({
	    	format: 'yyyy-mm-dd',
		      autoclose: true
	    })
  </script>


@endsection

