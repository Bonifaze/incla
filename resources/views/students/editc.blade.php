@extends('layouts.student')



@section('pagetitle')Edit Student Contact @endsection



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
                        edit Student Sponsor
                    </h1>
            <div class="card">

              <!-- /.card-header -->
            <!-- form start -->

				{!! Form::model($contact, ['method' => 'PATCH','route' => ['student-contact.updateedit', $contact->id], 'class' => 'nobottommargin', 'files' => true]) !!}

				<div class="card-body">

                     @include('partialsv3.flash')

              <div class="box-body">



							<div class="row">


							<div class="col-md-4 form-group">
              			<div  @if($errors->has('surname')) class ='has-error form-group' @endif>
								<label for="surname">Surname :</label>
								{!! Form::text('surname', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'surname', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('surname') }}</span>
							 </div>
							</div>


							<div class="col-md-4 form-group">
							<div  @if($errors->has('other_names')) class ='has-error form-group' @endif>
								<label for="other_names">Other Names :</label>
								{!! Form::text('other_names', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'other_names')) !!}
							 <span class="text-danger"> {{ $errors->first('other_names') }}</span>
							</div>
							</div>


							</div>


							<div class="row">







							</div>

							<div class="row">
							<div class="col-md-6 form-group">
							<div  @if($errors->has('email')) class ='has-error form-group' @endif>
								<label for="email">Email :</label>

                                {!! Form::email('email', null, array('placeholder' => 'john@doe.com', 'class' => 'form-control', 'id' => 'email', 'name' => 'email')) !!}
							<span class="text-danger"> {{ $errors->first('email') }}</span>
							</div>
							</div>


							<div class="col-md-3 form-group">
							<div  @if($errors->has('phone')) class ='has-error form-group' @endif>
								<label for="phone">Phone :</label>

                                {!! Form::text('phone', null, array('placeholder' => '080xxxxx', 'class' => 'form-control', 'id' => 'phone', 'name' => 'phone', 'required' => 'required')) !!}
							<span class="text-danger"> {{ $errors->first('phone') }}</span>
							</div>
							</div>
                            	<div class="col-md-3 form-group">
							<div  @if($errors->has('phone_2')) class ='has-error form-group' @endif>
								<label for="phone_2">Phone :</label>

                                {!! Form::text('phone_2', null, array('placeholder' => '080xxxxx', 'class' => 'form-control', 'id' => 'phone_2', 'name' => 'phone_2')) !!}
							<span class="text-danger"> {{ $errors->first('phone_2') }}</span>
							</div>
							</div>
							</div>





							<div class="row">
							<div class="col-md-12 form-group">
							<div  @if($errors->has('address')) class ='has-error form-group' @endif>

								<label for="address">Address :</label>
								 {!! Form::textarea('address', null, array('placeholder' => '','rows'=>'4', 'class' => 'form-control', 'id' => 'address')) !!}
								<span class="text-danger"> {{ $errors->first('address') }}</span>
								</div>
							</div>

							</div>






              </div>

               </div>





                <!-- /.card-body -->

                <div class="card-footer">



								{{ Form::submit('Edit Student Contact', array('class' => 'btn btn-primary')) }}




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
