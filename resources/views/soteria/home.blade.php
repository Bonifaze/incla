@extends('layouts.mini')



@section('pagetitle')Network Manager @endsection


<!-- Sidebar Links -->

<!-- Treeview -->
@section('soteria-open') menu-open @endsection

@section('soteria') active @endsection

<!-- Page -->
 @section('soteria-add') active @endsection

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
                <h3 class="card-title">Add Network Device </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            @include('partialsv3.flash')

						{!! Form::open(array('route' => 'soteria.add', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
 			<div class="card-body">

              <div class="box-body">

              			<div class="row">
                            <div class="col-md-4 form-group">
                                <label for="type">User Type :</label>
                                {{ Form::select('type', [
                                    '1' => 'Student',
                                     '2' => 'Staff',
                                    '3' => 'Official'],
                                    '2',
                                        ['class' => 'form-control select2']
                                    ) }}

                            </div>

							<div class="col-md-4 form-group">
								<label for="id">Identification :</label>
								{!! Form::text('id', null, array( 'placeholder' => 'Staff Id, Student Id or Phone','class' => 'form-control', 'id' => 'id')) !!}
							 <span class="text-danger"> {{ $errors->first('id') }}</span>
							</div>
							</div>
            </div>
               <!-- /.card-body -->

                <div class="card-footer">


							{{ Form::submit('Add User', array('class' => 'btn btn-primary')) }}


                </div>
              <!-- /.box-body -->


            {!! Form::close() !!}



          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
          @can('soteriaAdmin','App\Staff')
            <a class="btn btn-success" href="{{ route('soteria.dhcp') }}"> <i class="fa fa-plus-circle"></i> Download DHCP</a>
            @endcan
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
