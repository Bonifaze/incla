@extends('layouts.mini')



@section('pagetitle') Upload Excel Sheet  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('bursary-open') menu-open @endsection

@section('bursary') active @endsection

<!-- Page -->
 @section('bursary-upload') active @endsection

 <!-- End Sidebar links -->



@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">


            <div class="card ">
              <div class="card-header">
                <h3 class="card-title"> Upload Excel Sheet </h3>
				</div>
             @include("partialsv3.flash")
             <div class="table-responsive">

				<!-- form start -->

						{!! Form::open(array('route' => 'bursary.import', 'method'=>'POST', 'class' => 'nobottommargin', 'files' => true)) !!}
			<div class="card-body">
              <div class="box-body">

              			<div class="row">
              			<div class="col-md-6 form-group">
								<label for="gender">Excel File :</label>

                               {{Form::file('excel')}}
                              <span class="text-danger"> <br /> {{ $errors->first('excel') }}</span>
							 @if ($fileError = Session::get('fileError')) <span class="text-danger"> <br /> {!! $fileError !!}</span>@endif
							</div>





				</div>


              </div>
             </div>





                <!-- /.card-body -->

                <div class="card-footer">



								{{ Form::submit('Upload', array('class' => 'btn btn-primary')) }}




                </div>

                 </div>
               <!-- /.box-body -->


            {!! Form::close() !!}






            </div>


























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
<script src="<?php echo asset('dist/js/bootbox.min.js')?>"></script>

    @endsection

