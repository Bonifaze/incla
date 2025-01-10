@extends('layouts.mini')



@section('pagetitle')
    Search Staff
@endsection




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
                        Staff Report
                    </h1>

                    <div class="card ">

                        @include('partialsv3.flash')
                        <div class="ml-5 mt-5">

                            <h3>Numbers of </h3>
                            <p>All staff : {{ $allstaff }}</p>
                            <p>All Active staff : {{ $activestaff }}</p>
                            <p>Academic Staff : {{ $acdstaff }}</p>
                            <p>Non-Academic Staff : {{ $Nacdstaff }}</p>
                            <hr>
                        </div>

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
