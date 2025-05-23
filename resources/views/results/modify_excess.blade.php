@extends('layouts.mini')



@section('pagetitle') Student Result Management  @endsection

<!-- Sidebar Links -->

<!-- Treeview -->
@section('results-open') menu-open @endsection

@section('results') active @endsection

<!-- Page -->
@section('exam-remark') active @endsection

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
                <h3 class="card-title"> Modify Excess Credit </h3>
				</div>
             @include("partialsv3.flash")
             <div class="table-responsive">

				<!-- form start -->

			{!! Form::model($registration, ['method' => 'PATCH','route' => ['semester.registration.update-excess', base64_encode($registration->id)], 'class' => 'nobottommargin']) !!}
			<div class="card-body">
              <div class="box-body">

              		<div class="row">

              			<div class="col-md-4 form-group">
								<label for="excess_credit">Excess Credit Approved : </label>
								{!! Form::text('excess_credit', $registration->excess_credit, array( 'placeholder' => '','class' => 'form-control', 'id' => 'excess_credit', 'required' => 'required')) !!}

							</div>
                        {{ Form::hidden("registration_id", $registration->id) }}


					</div>



              </div>
             </div>


                <!-- /.card-body -->

                <div class="card-footer">

								{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

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
