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
                        RRR FEES
                    </h1>
                    <div class=" ">



                         <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Begin Page Content -->
            <div class="container-fluid ">

                <!-- Page Heading -->

        

                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <!-- Card Header - Dropdown -->
                        <div class="card m-3 shadow">
                            @if (session('signUpMsg'))
                                {!! session('signUpMsg') !!}
                            @endif
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                {{--  <h5 class="m-0 font-weight-bold text-success">Remita Service Types Fees </h5>  --}}
                                <div class="dropdown no-arrow">
                                    <h3 class="card-title text-success">

                                        @isset($sum)
                                            {{ 'Total: ₦' . number_format($sum) }}
                                        @else
                                            Remita Details
                                        @endisset
                                    </h3>

                                </div>

                            </div>

                            <div class="card-body">
                                <div class="table-responsive card-body">

                                    <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <th>S/N</th>
                                            <th>RRR</th>
                                            <th colspan="2">Applicant Name</th>
                                            <th>Email</th>
                                            <th>Student Name</th>
                                            <th>Matric Number</th>
                                            <th>Service Type</th>
                                            <th>Amount</th>
                                            <th>Generated</th>
                                            {{--  <th>Action</th>  --}}
                                        </thead>
                                        @foreach ($remitas as $key => $remita)
                                            <tr>

                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $remita->rrr }}</td>
                                                <td>{{ $remita->users->surname ?? ' ' }}</td>
                                                <td>{{ $remita->users->first_name ?? ' ' }}</td>
                                                {{--  <td>{{$remita->users->surname.' '.$remita->users->first_name ?? ' '}}</td>  --}}
                                                <td>{{ $remita->users->email ?? ' ' }}</td>
                                                <td>{{ $remita->student->fullname ?? ' ' }}</td>

                                                <td>{{ $remita->student->academic->mat_no ?? ' ' }}</td>



                                                {{--  <td>{{$remita->student->fullname}}</td>  --}}
                                                {{--  <td>{{$remita->student->academic->mat_no}}</td>  --}}
                                                <td>{{ $remita->feeType->name }}</td>
                                                <td>&#8358;{{ number_format($remita->amount) }}</td>
                                                <td>{{ $remita->created_at->format('d-M-Y') }}</td>


                                                {{--  <td>
                                              @if ($remita->status_code == 1)
                                                  <a class="btn btn-info" target="_blank" href="{{route("remita.print-rrr",$remita->id)}}" > Print Receipt </a>
                                              @else
                                                  {{$remita->status}}
                                              @endif
                                          </td>  --}}
                                            </tr>
                                        @endforeach

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
