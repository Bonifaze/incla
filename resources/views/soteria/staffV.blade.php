@extends('layouts.mini')

@section('pagetitle')
    Network Manager
@endsection

@section('css')
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('dist/css/components/bootstrap-datepicker.css') }}" />
@endsection

<!-- Sidebar Links -->

<!-- Treeview -->
@section('soteria-open')
    menu-open
@endsection

@section('soteria')
    active
@endsection

<!-- Page -->
@section('soteria-add')
    active
@endsection

<!-- End Sidebar links -->





@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <h1
                    class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Voucher Code
                </h1>
                <!-- Include flash messages -->
                @include('partialsv3.flash')

                <!-- Display pin with additional styling -->
                <div style="font-size: 24px; font-weight: bold; text-align: center; padding: 20px;">
                    {{ $viewV->pin ?? NULL }}
                </div>
                <div>
                    {{--  Updated at: {{ $viewV->updated_at ?? NULL }}  --}}

                </div>
{{--
                @if ($viewV)
                    @php
                        $updatedAt = \Carbon\Carbon::parse($viewV->updated_at);
                        $now = \Carbon\Carbon::now();
                        $diffInDays = $now->diffInDays($updatedAt);
                        $daysRemaining = 14 - $diffInDays; // 14 days is 2 weeks
                    @endphp

                    @if ($daysRemaining > 0)
                        <div>
                            Days Remaining: {{ $daysRemaining }}
                        </div>
                    @else
                        <div>
                            Voucher Expired
                        </div>
                    @endif
                @endif  --}}



                <!-- Validity information -->
                <p style="text-align: center; font-size: 16px; color: #666;">
                    This voucher is valid for 2 weeks .
                </p>
            </div>
            @can('ICTOfficers', 'App\StudentResult')
                <!-- Form to add a new PIN -->
                <div class="mb-4">
                    <h3>Add New Voucher Code :</h3>
                    <form method="POST" action="{{ route('addPin') }}">
                        @csrf
                        <div class="row">
                            <div class="col-6">

                                <input type="text" placeholder="Enter Voucher Code" class="form-control" id="pin"
                                    name="pin" required>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Add </button>
                            </div>
                        </div>
                    </form>
                </div>



                <!-- Form to upload CSV file -->
                <div class="mb-4">
                    <h3>Upload CSV:</h3>
                    <form method="POST" action="{{ route('uploadCSV') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <input type="file" class="form-control-file" id="csv_file" name="csv_file" accept=".csv"
                                    required>
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-primary">Upload CSV</button>
                            </div>
                            <div class="col-3">
                                <a href="{{ route('downloadSampleCSV') }}" class="btn btn-success">Download Sample CSV</a>
                            </div>
                        </div>
                    </form>
                </div>
            @else
                <div></div>
            @endcan

        </section>
        <!-- /.content -->
    </div>
@endsection

@section('pagescript')
    <!-- External JavaScripts
         ============================================= -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- bootstrap datepicker -->
    <script src="{{ asset('dist/js/components/bootstrap-datepicker.js') }}"></script>

    <script type="text/javascript">
        //Date picker
        $('#av_expire').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            startDate: '+60d'
        })
    </script>
@endsection
