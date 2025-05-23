@extends('layouts.mini')



@section('pagetitle')Edit User @endsection


@section('css')


<!-- Bootstrap File Upload CSS -->
<link rel="stylesheet" href="{{ asset('dist/css/components/bs-filestyle.css')}}" />


@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('usersb-open') menu-open @endsection

@section('usersb') active @endsection


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
                <h3 class="card-title">Edit User: {{ $user->full_name }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

						{!! Form::model($user, ['method' => 'PATCH','route' => ['user.update', $user->id], 'files' => true]) !!}
					<div class="card-body">
              <div class="box-body">

              			<div class="row">
              			<div class="col-md-6 form-group">
								<label for="surname">Surname :</label>
								{!! Form::text('surname', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'surname')) !!}
							 <span class="text-danger"> {{ $errors->first('surname') }}</span>
							</div>


							<div class="col-md-6 form-group">
							<div  @if($errors->has('other_names')) class ='has-error form-group' @endif>
								<label for="other_names">Other Names :</label>
								{!! Form::text('other_names', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'other_names')) !!}

							</div>
							</div>


							</div>

							<div class="row">
							<div class="col-md-6 form-group">
								<label for="phone">Phone :</label>

                                {!! Form::text('phone', null, array('placeholder' => '080', 'class' => 'form-control', 'id' => 'phone', 'name' => 'phone')) !!}
							<span class="text-danger"> {{ $errors->first('phone') }}</span>
							</div>

							<div class="col-md-6 form-group">
								<label for="email">Email :</label>

                                {!! Form::email('email', null, array('placeholder' => 'john@doe.com', 'class' => 'form-control', 'id' => 'email', 'name' => 'email')) !!}
							<span class="text-danger"> {{ $errors->first('email') }}</span>
							</div>
							</div>


							<div class="row">
							<div class="col-md-6 form-group">


								<label for="passport">Passport :</label>
								{!! Form::file('passport', array('class' => 'form-control file-loading', 'id' => 'passport', 'placeholder'=>'Choose profile pic', 'name' => 'passport',  'accept' => 'image/*')) !!}
								<span class="text-danger"> {{ $errors->first('passport') }}</span>
							</div>



							<div class="col-md-6 form-group pull-left">



							</div>
							</div>
              </div>
               <!-- /.card-body -->


            </div>

				<div class="card-footer">


							{{ Form::submit('Edit '.$user->full_name, array('class' => 'btn btn-primary')) }}



                </div>



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

<!-- Bootstrap File Upload Plugin -->
	<script src="{{ asset('dist/js/components/bs-filestyle.js')}}"></script>

<script  type="text/javascript">
		$(document).on('ready', function() {

			$("#passport").fileinput({
				mainClass: "input-group-md",
				showUpload: false,
				previewFileType: "image",
				browseClass: "btn btn-success",
				browseLabel: "Pick Image",
				browseIcon: "<i class=\"fa fa-address-book\"></i>",
				removeClass: "btn btn-danger",
				removeLabel: "Delete",
				removeIcon: "<i class=\"icon-trash\"></i> ",
				allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
				elErrorContainer: "#errorBlock"



			});



		});

	</script>



@endsection

