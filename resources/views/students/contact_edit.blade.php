@extends('layouts.student')



@section('pagetitle') Contact Update @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('course-open') menu-open @endsection

@section('course') active @endsection

<!-- Page -->
 @section('evaluation') active @endsection

 <!-- End Sidebar links -->



@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">

            {!! Form::open(['method' => 'Post', 'route' => 'student.contact-update']) !!}


            <div class="card ">
              <div class="card-header">
                <h3 class="card-title"> </h3>
				</div>
 <h1> You must provide a valid email and phone number for your parent, guardian, sponsor or benefactor. <br />
 This information must be correct and may be used in the future to activate services such as school fees payment by them. </h1>
                <div class="card-body">

                    <div class="box-body">

             @include('partialsv3.flash')

                            <div class="row form-group">
                                <div class="col-sm-5">
                                    <div  @if($errors->has('phone_2')) class ='has-error form-group' @endif>
                                        <label for="phone_2">Parents/Contact valid Phone :</label>
                                        {!! Form::text('phone_2', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'phone_2', 'required' => 'required')) !!}
                                        <span class="text-danger"> {{ $errors->first('phone_2') }}</span>
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div  @if($errors->has('email_2')) class ='has-error form-group' @endif>
                                        <label for="email_2">Parents/Contact valid Email :</label>
                                        {!! Form::email('email_2', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'email_2', 'required' => 'required')) !!}
                                        <span class="text-danger"> {{ $errors->first('email_2') }}</span>
                                    </div>
                                </div>

                            </div>

                           </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.-card body -->

                    <div class="card-footer">


                        {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}


                    </div>

            </div>
            <!-- /.-card primary -->

            {!! Form::close() !!}

        </div>
          <!-- /.left colum col_full -->

        </div>
        <!--/.container fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('pagescript')
<script src="<?php echo asset('dist/js/bootbox.min.js')?>"></script>

    @endsection

