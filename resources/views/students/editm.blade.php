@extends('layouts.student')



@section('pagetitle')Edit Student Medical @endsection



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
                    edit Student medica Record
                    </h1>
            <div class="card ">

              <!-- /.card-header -->
            <!-- form start -->

				{!! Form::model($medical, ['method' => 'PATCH','route' => ['student-medical.update', $medical->id], 'class' => 'nobottommargin', 'files' => true]) !!}

				<div class="card-body">

                     @include('partialsv3.flash')

              <div class="box-body">




							<div class="row">


							<div class="col-md-4 form-group">
								<label for="blood_group">Blood Group :</label>
								{{ Form::select('blood_group', [
	                        		'A+' => 'A+',
	                        		'A-' => 'A-',
	                        		'B+' => 'B+',
	                        		'B-' => 'B-',
	                        		'AB+' => 'AB+',
	                        		'AB-' => 'AB-',
	                        		'O+' => 'O+',
	                       			'O-' => 'O-'],
	                        		$medical->blood_group,
	                       			 ['class' => 'form-control select2']
	                    			) }}

							</div>


							<div class="col-md-4 form-group">
								<label for="genotype">Genotype :</label>
								{{ Form::select('genotype', [
	                        		'AA' => 'AA',
	                        		'AS' => 'AS',
	                        		'SS' => 'SS'],
	                        		$medical->genotype,
	                       			 ['class' => 'form-control select2']
	                    			) }}

							</div>
							</div>






              </div>

               </div>





                <!-- /.card-body -->

                <div class="card-footer">



								{{ Form::submit('Edit Student Medical', array('class' => 'btn btn-primary')) }}




                </div>

                 </div>
               <!-- /.box-body -->


            {!! Form::close() !!}


          <!-- /.box -->

        </div>
        <!--/.col (left) -->

      </div>


      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
