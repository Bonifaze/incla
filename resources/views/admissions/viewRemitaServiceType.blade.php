
@extends('layouts.mini')



@section('pagetitle')
    List of Students
@endsection

@section('css')
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{ asset('v3/plugins/ekko-lightbox/ekko-lightbox.css') }}">
@endsection


<!-- Sidebar Links -->

<!-- Treeview -->
@section('bursary-open')
    menu-open
@endsection

@section('bursary')
    active
@endsection

<!-- Page -->
@section('bursary-search')
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
                <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        VIEW Remita Service Type
                    </h1>
               <div id="content-wrapper" class="d-flex flex-column">

            <!-- Begin Page Content -->
            <div class="container-fluid ">

                <!-- Page Heading -->

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    {{--  <h1 class="h5 mb-2 p-2 text-success fw-bold text-capitalize"> {{ $fullName }}: Admininstrator Dashboard</h1>  --}}

                    <br>
                </div>

                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <!-- Card Header - Dropdown -->
                        <div class="card m-3 shadow">
                            @if (session('signUpMsg'))
                                {!! session('signUpMsg') !!}
                            @endif
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-success">Live Remita Service Types </h6>
                                <div class="dropdown no-arrow">

                                    <a href="/addRemitaServiceType"
                                        class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                            class="fas fa-plus text-white-50"></i> Add </a>

                                </div>

                            </div>

                            <div class="card-body">
                                <div class="table-responsive card-body">
                                    <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Service Type</th>
                                                <th>Description</th>
                                                <th>Amount (₦‎)</th>
                                                {{--  <th>Total Amount</th>
                                            <th>View</th>  --}}
                                                <th colspan="2">Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            {{--  @foreach ($utmeApplicants as $utmeApplicant)  --}}
                                            @foreach ($fee_types as $key => $fee_types)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $fee_types->provider_code }}</td>
                                                    <td>{{ $fee_types->name }}</td>
                                                    <td> ₦‎{{ $fee_types->amount }}</td>
                                                    {{--  <td>Null</td>
                                            <td><a class="btn btn-primary">View</a></td>  --}}
                                                    <td><a href="/editRemitaServiceType/{{ $fee_types->provider_code }}"
                                                            class="btn btn-warning">Edit</a></td>



                                                    <td>
                                                        <form method="POST" action="/suspendRemitaServiceType">
                                                            @csrf
                                                            <input type="hidden" value="{{ $fee_types->provider_code }}"
                                                                placeholder="{{ $fee_types->provider_code }}"
                                                                name="provider_code">
                                                            <button class="btn btn-danger border mt-2">Suspend</button>
                                                        </form>
                                                    </td>
                                                    {{--  <td>{!! $fee_types->status == '1'?'<form method="POST" action="/suspendRemitaServiceType">
                                                @csrf
                                                <input type="hidden" value="{{$fee_types->provider_code}}" placeholder="{{$fee_types->provider_code}}" name = "provider_code">
                                                <button class="btn btn-danger border mt-2">Suspend</button>
                                            </form':'
                                            <form method="POST" action="/suspendRemitaServiceType">
                                                @csrf
                                                <input type="hidden" value="{{$fee_types->provider_code}}" placeholder="{{$fee_types->provider_code}}" name = "provider_code">
                                                <button class="btn btn-danger border mt-2">Activate</button>
                                            </form'!!}</td>  --}}

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <!-- Card Header - Dropdown -->
                        <div class="card m-3 shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-success mb-3">Suspended Remita Service Types</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Service Type</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                {{--  <th>Total Amount</th>
                                            <th>View</th>  --}}
                                                {{--  <th>Edit</th>  --}}
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            {{--  @foreach ($utmeApplicants as $utmeApplicant)  --}}
                                            @foreach ($fee_typess as $key => $fee_types)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $fee_types->provider_code }}</td>
                                                    <td>{{ $fee_types->name }}</td>
                                                    <td>{{ $fee_types->amount }}</td>
                                                    {{--  <td>Null</td>
                                            <td><a class="btn btn-primary">View</a></td>  --}}
                                                    {{--  <td><a class="btn btn-warning">Edit</a></td>  --}}

                                                    <td>
                                                        <form method="POST" action="/activeRemitaServiceType">
                                                            @csrf
                                                            <input type="hidden" value="{{ $fee_types->provider_code }}"
                                                                placeholder="{{ $fee_types->provider_code }}"
                                                                name="provider_code">
                                                            <button class="btn btn-success border mt-2">Activate</button>
                                                        </form>
                                                    </td>
                                                    {{--  <td>{!! $fee_types->status == '1'?'<form method="POST" action="/suspendRemitaServiceType">
                                                @csrf
                                                <input type="hidden" value="{{$fee_types->provider_code}}" placeholder="{{$fee_types->provider_code}}" name = "provider_code">
                                                <button class="btn btn-danger border mt-2">Suspend</button>
                                            </form':'
                                            <form method="POST" action="/suspendRemitaServiceType">
                                                @csrf
                                                <input type="hidden" value="{{$fee_types->provider_code}}" placeholder="{{$fee_types->provider_code}}" name = "provider_code">
                                                <button class="btn btn-danger border mt-2">Activate</button>
                                            </form'!!}</td>  --}}

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

            @include('layouts.footer')

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
    <script src="{{ asset('js/bootbox.min.js') }}"></script>



    <!-- jQuery UI -->
    <script src="{{ asset('v3/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Ekko Lightbox -->
    <script src="{{ asset('v3/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
@endsection
