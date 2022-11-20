@extends('layouts.student')



@section('pagetitle') Generate RRR  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('fees-open') menu-open @endsection

@section('fees') active @endsection

<!-- Page -->
 @section('remita') active @endsection
 
 <!-- End Sidebar links -->



@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">
         
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Generate RRR (Remita Reference Number)</h3>
				</div>

                <!-- form start -->
                @include('partialsv3.flash')

                {!! Form::open(array('route' => 'student.remita-generation', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
                <div class="card-body">

                    <div class="box-body">

                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label for="fee_type_id">Fee Types :</label>
                                {{ Form::select('fee_type_id', $feeTypes, null,['class' => 'form-control', 'id' => 'fee_type_id', 'name' => 'fee_type_id']) }}
                                {{ Form::hidden('student_id', $student->id) }}
                            </div>

                        </div>




                        <div class="row">


                            <div class="col-md-6 form-group pull-left">



                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">


                    {{ Form::submit('Generate RRR', array('class' => 'btn btn-primary')) }}


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
<script src="<?php echo asset('dist/js/bootbox.min.js')?>"></script>

    @endsection

