@extends('layouts.mini')



@section('pagetitle')Change Password @endsection


<!-- Sidebar Links -->

<!-- Treeview -->
@section('usersb-open') menu-open @endsection

@section('usersb') active @endsection

<!-- Page -->
 @section('user-password') active @endsection

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
                <h3 class="card-title">Change password</h3>
              </div>
              <!-- /.card-header -->
            <!-- form start -->

						{!! Form::open(array('route' => 'user.change', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
	 <div class="card-body">

              <div class="box-body">

              			<div class="row">
              			<div class="col-md-4">
								<label for="current">Current Password:</label>
								{!! Form::password('current', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'current')) !!}
							 <span class="text-danger"> {{ $errors->first('current') }}</span>
							</div>

							<div class="col-md-4 ">
								<label for="password">New Password:</label>
								{!! Form::password('password', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'password')) !!}
							 <span class="text-danger"> {{ $errors->first('password') }}</span>
							</div>

							<div class="col-md-4">
								<label for="password-confirm">Confirm:</label>
								{!! Form::password('password_confirmation', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'password_confirmation')) !!}
							 <span class="text-danger"> {{ $errors->first('password_confirmation') }}</span>
							</div>




							</div>




							<div class="row">



							</div>
              </div>
              <!-- /.box-body -->




          </div>

           <div class="card-footer">



								{{ Form::submit('Change Password', array('class' => 'btn btn-success')) }}



                </div>


            {!! Form::close() !!}

          <!-- /.box -->

        </div>
        <!--/.col (left) -->

      </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
