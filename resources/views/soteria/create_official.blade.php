@extends('layouts.mini')

@section('pagetitle')Network Manager @endsection

@section('css')
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="{{ asset('dist/css/components/bootstrap-datepicker.css')}}" />
@endsection

<!-- Sidebar Links -->

<!-- Treeview -->
@section('soteria-open') menu-open @endsection

@section('soteria') active @endsection

<!-- Page -->
 @section('soteria-create') active @endsection

 <!-- End Sidebar links -->





@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">


            <!-- form start -->

            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Create New Official System </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            @include('partialsv3.flash')

						{!! Form::open(array('route' => 'soteria.official.store', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
 			<div class="card-body">

              <div class="box-body">

              			<div class="row">
							<div class="col-md-4 form-group">
								<label for="device_name">Device Name :</label>
								{!! Form::text('device_name', null, array( 'placeholder' => 'HP 3330MT','class' => 'form-control', 'id' => 'device_name', 'required' => 'required')) !!}
								<span class="text-danger"> {{ $errors->first('device_name') }}</span>
						</div>

							<div class="col-md-4 form-group">
							<label for="status">Device Type :</label>
							{{ Form::select('device_type', [
                                'Laptop' => 'Laptop',
                                    'Phone' => 'Phone',
                                    'Tablet' => 'Tablet',
                                    'Desktop' => 'Desktop'],
                                'Phone',
                                    ['class' => 'form-control select2']
                                ) }}
							<span class="text-danger"> {{ $errors->first('device_type') }}</span>
							</div>

							<div class="col-md-4 form-group">
								<label for="serial_no">Serial No :</label>
								{!! Form::text('serial_no', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'serial_no', 'required' => 'required')) !!}
								<span class="text-danger"> {{ $errors->first('serial_no') }}</span>
							</div>

</div>


				  <div class="row">
					  <div class="col-md-4 form-group">
						  <label for="os">OS :</label>
						  {{ Form::select('os', [
                          'Microsoft' => 'Microsoft Windows',
                              'Android' => 'Android',
                              'Apple' => 'Apple OS',
                              'Linux' => 'Linux'],
                          'Microsoft',
                              ['class' => 'form-control select2']
                          ) }}
						  <span class="text-danger"> {{ $errors->first('os') }}</span>
					  </div>

					  <div class="col-md-4 form-group">
						  <label for="storage">Storage :</label>
						  {!! Form::number('storage', 500, array( 'placeholder' => '500','class' => 'form-control', 'id' => 'storage', 'required' => 'required')) !!}
						  <span class="text-danger"> {{ $errors->first('storage') }}</span>
					  </div>

					  <div class="col-md-4 form-group">
						  <label for="memory">Memory :</label>
						  {!! Form::number('memory', null, array( 'placeholder' => '2','class' => 'form-control', 'id' => 'memory', 'required' => 'required')) !!}
						  <span class="text-danger"> {{ $errors->first('memory') }}</span>
					  </div>

				  </div>

				  <div class="row">
					  <div class="col-md-4 form-group">
						  <label for="staff_id">Staff :</label>
						  {{ Form::select('staff_id', $staff, null,['class' => 'form-control', 'id' => 'staff_id']) }}
						  <span class="text-danger"> {{ $errors->first('staff_id') }}</span>
					  </div>

					  <div class="col-md-4 form-group">
						  <label for="admin_department_id">Department :</label>
						  {{ Form::select('admin_department_id', $departments, null,['class' => 'form-control', 'id' => 'admin_department_id']) }}
						  <span class="text-danger"> {{ $errors->first('admin_department_id') }}</span>
					  </div>

					 <div class="col-md-4 form-group">
						  <label for="mac_address">MAC address :</label>
						  {!! Form::text('mac_address', null, array( 'placeholder' => 'aa:bb:cc:dd:ee:ff','class' => 'form-control', 'id' => 'mac_address', 'required' => 'required')) !!}
						  <span class="text-danger"> {{ $errors->first('mac_address') }}</span>
					  </div>


				  </div>

				  <div class="row">
					  <div class="col-md-4 form-group">
						  <label for="antivirus">Antivirus :</label>
						  {{ Form::select('antivirus', [
                          'McAfee' => 'McAfee',
                              'Kaspersky' => 'Kaspersky',
                              'Norton' => 'Norton',
                          'None' => 'None'],
                          'Kaspersky',
                              ['class' => 'form-control select2']
                          ) }}
						  <span class="text-danger"> {{ $errors->first('antivirus') }}</span>
					  </div>
					  <div class="col-md-4 form-group">
						  <label for="av_expire">Antivirus Expire :</label>
						  {!! Form::text('av_expire', '', array('placeholder' => '', 'class' => 'form-control', 'id' => 'av_expire', 'name' => 'av_expire', 'required' => 'required')) !!}
						  <span class="text-danger"> {{ $errors->first('av_expire') }}</span>
					  </div>




				  </div>


              </div>
              </div>
               <!-- /.card-body -->

                <div class="card-footer">


							{{ Form::submit('Create System', array('class' => 'btn btn-primary')) }}


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
@endsection

@section('pagescript')

	<!-- External JavaScripts
	============================================= -->
	<script src="{{ asset('js/jquery.js')}}"></script>

	<!-- bootstrap datepicker -->
	<script src="{{ asset('dist/js/components/bootstrap-datepicker.js')}}"></script>

	<script type="text/javascript">
		//Date picker
		$('#av_expire').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true,
			startDate: '+60d'
		})
	</script>
@endsection
