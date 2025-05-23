@extends('layouts.mini')



@section('pagetitle') Search Network Device  @endsection


<!-- Sidebar Links -->

<!-- Treeview -->
@section('soteria-open') menu-open @endsection

@section('soteria') active @endsection

<!-- Page -->
@section('soteria-search') active @endsection

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
                <h3 class="card-title"> Search Network Device </h3>
				</div>
             @include("partialsv3.flash")
             <div class="table-responsive">

				<!-- form start -->

						{!! Form::open(array('route' => 'soteria.find', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
			<div class="card-body">
              <div class="box-body">

              			<div class="row">
              			<div class="col-md-6 form-group">
              			<div  @if($errors->has('data')) class ='has-error form-group' @endif>
								<label for="data">Surname, First Name, Student ID, Device Name:</label>
								{!! Form::search('data', null, array( 'placeholder' => 'Surname, First Name, Student ID, Device Name','class' => 'form-control', 'id' => 'data', 'required' => 'required')) !!}

								</div>
								</div>
								</div>
              </div>
             </div>


                <!-- /.card-body -->

                <div class="card-footer">

								{{ Form::submit('Search', array('class' => 'btn btn-primary')) }}

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
