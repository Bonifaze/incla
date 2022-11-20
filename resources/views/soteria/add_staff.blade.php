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
                <h3 class="card-title">Add Network Device for {{$staff->fullName}} </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            @include('partialsv3.flash')
           
						{!! Form::open(array('route' => 'soteria.staff.store', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
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
                                'Phone',
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
                                'Microsoft',
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
                            'Kaspersky',
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
						  {!! Form::text('av_expire', '', array('placeholder' => '', 'class' => 'form-control', 'id' => 'av_expire', 'name' => 'av_expire')) !!}
						  <span class="text-danger"> {{ $errors->first('av_expire') }}</span>
					  </div>
				  </div>
							


				  {{ Form::hidden('user_type_id', 2) }}
				  {{ Form::hidden('user_id', $staff->id) }}
				  {{ Form::hidden('full_name', $staff->fullName) }}
							
							<div class="row">
							
						
							<div class="col-md-6 form-group pull-left">
							
								
							
							</div>
							</div>
              </div>
              </div>
               <!-- /.card-body -->

                <div class="card-footer">
                  
							
							{{ Form::submit('Add Device', array('class' => 'btn btn-primary')) }}
							
						
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
