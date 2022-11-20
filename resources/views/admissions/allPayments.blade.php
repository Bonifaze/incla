@php
    
    if (!session('adminId')) {
        header('location: /adminLogin');
        exit();
    }
@endphp
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
                       All Applicants Payment
                    </h1>
                    <div class=" ">



                        <!-- Content Wrapper -->

                          <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">

                        <!-- Card Header - Dropdown -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                {{--  <h6 class="m-0 font-weight-bold text-success">All Applicants Payment</h6>  --}}
                            </div>
                            <div class="card-body">

                                @if (session('approvalMsg'))
                                    {!! session('approvalMsg') !!}
                                @endif
                                <div class="table-responsive">

                                    <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                {{--  <th>Passport</th> --}}
                                                <th>First Name</th>
                                                <th>Surname</th>
                                                <th>Phone Number</th>
                                                <th>RRR</th>
                                                <th>Fee Type</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                {{--  <th>Full Details</th>  --}}
                                                <th>Verify Payment</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($allApplicants as $allApp)
                                                <tr>
                                                    <td>{{ $allApp->surname }}</td>
                                                    <td>{{ $allApp->first_name }}</td>
                                                    <td>{{ $allApp->phone }}</td>
                                                    <td>{{ $allApp->rrr }}</td>
                                                    <td>{{ $allApp->fee_type }}</td>
                                                    <td>{{ $allApp->amount }}</td>
                                                    <td>{{ $allApp->status }}</td>
                                                    <td>
                                                        <form method="POST" action="/verifypayment">
                                                            @csrf
                                                            <input type="hidden" value="{{ $allApp->rrr }}"
                                                                placeholder="{{ $allApp->rrr }}" name="rrr">
                                                            <button class="btn btn-primary border mt-2">Verify
                                                                Payment</button>
                                                        </form>
                                                    </td>

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
