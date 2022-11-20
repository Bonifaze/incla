@extends('layouts.mini')

@section('pagetitle')Edit Device @endsection

@section('css')
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="{{ asset('dist/css/components/bootstrap-datepicker.css')}}" />
@endsection

<!-- Sidebar Links -->

<!-- Treeview -->
@section('soteria-open') menu-open @endsection

@section('soteria') active @endsection

<!-- Page -->
 @section('soteria-add') active @endsection
 
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
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Device for {{$device->full_name}} </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            @include('partialsv3.flash')

				{!! Form::model($device, ['method' => 'PATCH','route' => ['soteria.update', $device->id], 'class' => 'nobottommargin', 'files' => true]) !!}
				 			<div class="card-body">
                
              <div class="box-body">
              			
              			<div class="row">
              			<div class="col-md-4 form-group">
							<label for="status">Device Type :</label>
							{{ Form::select('device_type', [
                                'Laptop' => 'Laptop',
                                    'Phone' => 'Phone',
                                    'Tablet' => 'Tablet',
                                    'Desktop' => 'Desktop'],
                                $device->device_type,
                                    ['class' => 'form-control select2']
                                ) }}
							<span class="text-danger"> {{ $errors->first('device_type') }}</span>
							</div>
							
							<div class="col-md-4 form-group">
								<label for="os">OS :</label>
								{{ Form::select('os', [
                                'Microsoft' => 'Microsoft Windows',
                                    'Android' => 'Android',
                                    'Apple' => 'Apple OS',
                                    'Linux' => 'Linux'],
                                $device->os,
                                    ['class' => 'form-control select2']
                                ) }}
							 <span class="text-danger"> {{ $errors->first('os') }}</span>
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
                            $device->antivirus,
                                ['class' => 'form-control select2']
                            ) }}
							 <span class="text-danger"> {{ $errors->first('antivirus') }}</span>
							</div>


								<div class="col-md-4 form-group">
									<label for="mac_address">MAC address :</label>
									{!! Form::text('mac_address', null, array( 'placeholder' => 'aa:bb:cc:dd:ee:ff','class' => 'form-control', 'id' => 'mac_address', 'required' => 'required')) !!}
									<span class="text-danger"> {{ $errors->first('mac_address') }}</span>
								</div>

								</div>

				  <div class="row">
					  <div class="col-md-4 form-group">
						  <label for="av_expire">Antivirus Expire :</label>
						  {!! Form::text('av_expire', '2021-10-01', array('placeholder' => '', 'class' => 'form-control', 'id' => 'av_expire', 'name' => 'av_expire')) !!}
						  <span class="text-danger"> {{ $errors->first('av_expire') }}</span>
					  </div>
				  </div>
							


				  {{ Form::hidden('id', $device->id) }}
				  		<div class="row">
							
						
							<div class="col-md-6 form-group pull-left">
							
								
							
							</div>
							</div>
              </div>
              </div>
               <!-- /.card-body -->

                <div class="card-footer">
                  
							
							{{ Form::submit('Update Device', array('class' => 'btn btn-primary')) }}
							
						
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
			startDate: '+30d'
		})
	</script>
@endsection
