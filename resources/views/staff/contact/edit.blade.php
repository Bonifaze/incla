@extends('layouts.mini')



@section('pagetitle')Edit Staff Contact @endsection


@section('css')


<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{ asset('dist/css/components/bootstrap-datepicker.css')}}" />

<!-- Bootstrap File Upload CSS -->
<link rel="stylesheet" href="{{ asset('dist/css/components/bs-filestyle.css')}}" />


@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('staff-open') menu-open @endsection

@section('staff') active @endsection


<!-- Page -->
 @section('staff-list') active @endsection

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
                    Edit Emergency Contact
                </h1>
            <div class="card ">

              <!-- /.card-header -->
            <!-- form start -->

						{!! Form::model($contact, ['method' => 'PATCH','route' => ['staff-contact.update', $contact->id], 'class' => 'nobottommargin', 'files' => true]) !!}
				<div class="card-body">

                     @include('partialsv3.flash')

              <div class="box-body">

							 <div class="box-header">
              {{--  <h3 class="box-title">Emergency Contact </h3>  --}}
            </div>
							<div class="row">

							<div class="col-md-4 form-group">
              			<div  @if($errors->has('name')) class ='has-error form-group' @endif>
								<label for="esurname">Surname :</label>
								{!! Form::text('name', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'name', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('name') }}</span>
							 </div>
							</div>

							 <div class="col-md-4 form-group">
              			<div  @if($errors->has('relationship')) class ='has-error form-group' @endif>
								<label for="relationship">Relationship with Contact / Sponsor :</label>
								{!! Form::text('relationship', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'relationship', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('relationship') }}</span>
							 </div>
							</div>

							<div class="col-md-4 form-group">
							<div  @if($errors->has('email')) class ='has-error form-group' @endif>
								<label for="email">Email :</label>
							 {!! Form::email('email', null, array('placeholder' => 'john@doe.com', 'class' => 'form-control', 'id' => 'email')) !!}
							<span class="text-danger"> {{ $errors->first('email') }}</span>
							</div>
							</div>


							</div>


							<div class="row">


							<div class="col-md-4 form-group">
							<div  @if($errors->has('phone')) class ='has-error form-group' @endif>
								<label for="phone">Phone :</label>
							 {!! Form::text('phone', null, array('placeholder' => '080xxxxx', 'class' => 'form-control', 'id' => 'phone', 'required' => 'required')) !!}
							<span class="text-danger"> {{ $errors->first('phone') }}</span>
							</div>
							</div>

							<div class="col-md-4 form-group">
              			<div  @if($errors->has('state')) class ='has-error form-group' @endif>
								<label for="state">State of Residence :</label>
								{!! Form::text('state', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'state', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('state') }}</span>
							 </div>
							</div>

							</div>



							<div class="row">
							<div class="col-md-12 form-group">
							<div  @if($errors->has('address')) class ='has-error form-group' @endif>

								<label for="address">Address :</label>
								 {!! Form::textarea('address', null, array('placeholder' => '','rows'=>'4', 'class' => 'form-control', 'id' => 'address', 'required' => 'required')) !!}
								<span class="text-danger"> {{ $errors->first('address') }}</span>
								</div>
							</div>

							</div>







              </div>

               </div>





                <!-- /.card-body -->

                <div class="card-footer">



								{{ Form::submit('Edit Contact', array('class' => 'btn btn-primary')) }}




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

@section('pagescript')

<!-- External JavaScripts
	============================================= -->
	<script src="{{ asset('js/jquery.js')}}"></script>

	<!-- bootstrap datepicker -->
	<script src="{{ asset('dist/js/components/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap File Upload Plugin -->
	<script src="{{ asset('dist/js/components/bs-filestyle.js')}}"></script>

<script type="text/javascript">
	//Date picker
	    $('#dob').datepicker({
	    	format: 'yyyy-mm-dd',
		      autoclose: true
	    })
  </script>

  <script type="text/javascript">
	//Date picker
	    $('#appointment_date').datepicker({
	    	format: 'yyyy-mm-dd',
		      autoclose: true
	    })
  </script>

  <script type="text/javascript">
	//Date picker
	    $('#assumption_date').datepicker({
	    	format: 'yyyy-mm-dd',
		      autoclose: true
	    })
  </script>

 <script  type="text/javascript">
		$(document).on('ready', function() {

			$("#passport").fileinput({
				mainClass: "input-group-md",
				showUpload: false,
				previewFileType: "image",
				browseClass: "btn btn-success",
				browseLabel: "Pick Image",
				browseIcon: "<i class=\"fas fa-user\"></i>",
				removeClass: "btn btn-danger",
				removeLabel: "Delete",
				removeIcon: "<i class=\"icon-trash\"></i> ",
				allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
				elErrorContainer: "#errorBlock"



			});



		});

	</script>

	<script  type="text/javascript">
		$(document).on('ready', function() {

			$("#signature").fileinput({
				mainClass: "input-group-md",
				showUpload: false,
				previewFileType: "image",
				browseClass: "btn btn-success",
				browseLabel: "Pick Image",
				browseIcon: "<i class=\"fas fa-signature\"></i>",
				removeClass: "btn btn-danger",
				removeLabel: "Delete",
				removeIcon: "<i class=\"icon-trash\"></i> ",
				allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
				elErrorContainer: "#errorBlock"



			});



		});

	</script>
@endsection

