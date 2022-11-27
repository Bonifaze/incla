{{--  @php

if(!session('adminId'))
{

  header('location: /adminLogin');
  exit;
}
@endphp  --}}
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
                        UNDERGRADUATE Applicants Payments
                    </h1>
                    <div class=" ">



                        <!-- Content Wrapper -->
                    <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <!-- Card Header - Dropdown -->
                        <div class="card m-3 shadow">
                            <div class="card-header py-3">
                                {{--  <h6 class="m-0 font-weight-bold text-success mb-3">UTME Applicants Payments</h6>  --}}
                                <hr class="sidebar-divider">

                                @if (session('approvalMsg'))
                                    {!! session('approvalMsg') !!}
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <hr class="sidebar-divider">
                                    <form action="/adminUtmeFilter" method="POST">
                                        @csrf
                                        <label for="start"><b class="text-success">Apllied From:</b></label>
                                        <input type="date" id="start" name="start_date" value=""
                                            class="mr-5 rounded">
                                        <input type="hidden" name="applicant_type" value="UTME">
                                        <label for="start"><b class="text-success">To:</b></label>
                                        <input type="date" id="start" name="end_date" value=""
                                            class="mr-5 rounded">
                                        <input type="submit" value="Filter" class="btn btn-success px-4 m-1">
                                    </form>
                                    <hr class="sidebar-divider">
                                    <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>

                                                <th>First Name</th>
                                                <th>Surname</th>
                                                <th>Phone Number</th>
                                                <th>RRR</th>
                                                <th>Fee Type</th>
                                                <th>Amount</th>
                                                <th>Transaction Date</th>
                                                <th>Full Details</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($utmePayments as $utmeApplicant)
                                                <tr>
                                                    <td>{{ $utmeApplicant->first_name }}</td>
                                                    <td>{{ $utmeApplicant->surname }}</td>
                                                    <td>{{ $utmeApplicant->phone }}</td>
                                                    <td>{{ $utmeApplicant->rrr }}</td>
                                                    <td>{{ $utmeApplicant->fee_type }}</td>
                                                    <td>{{ $utmeApplicant->amount }}</td>
                                                    <td>{{ $utmeApplicant->transaction_date }}</td>
                                                    <td><a href="/adminView/{{ $utmeApplicant->applicant_type }}/{{ urlencode(base64_encode($utmeApplicant->id)) }}"
                                                            class="btn btn-primary border mt-2">View </a></td>
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
