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
                  Remita Service Types Fees
                    </h1>
                    <div class=" ">


  <div id="content-wrapper" class="d-flex flex-column">

            <!-- Begin Page Content -->
            <div class="container-fluid ">



                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <!-- Card Header - Dropdown -->
                        <div class="card m-3 shadow">
                            @if (session('signUpMsg'))
                                {!! session('signUpMsg') !!}
                            @endif
                            <div class="card-header py-3">

                                {{--  <h3 class="m-0 font-weight-bold text-success mb-3">Remita Service Types Fees</h3>  --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive card-body">

                                    {{--  @include('partialsv3.flash')  --}}


                                    <table class="table table-striped">
                                        <thead>

                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Provider Code</th>
                                            <th>Provider</th>
                                            <th>Total</th>
                                            <th>Action</th>







                                        </thead>


                                        <tbody>
                                            @foreach ($feeTypes as $key => $fee)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $fee->name }}</td>
                                                    <td> &#8358;{{ number_format($fee->amount) }}</td>
                                                    <td>{{ $fee->provider_code }}</td>
                                                    <td>{{ $fee->provider }}</td>
                                                    <td> &#8358;{{ number_format($fee->paidRemitas->sum('amount')) }}</td>
                                                    <td> <a class="btn btn-success" target="_blank"
                                                            href="{{ route('remita.fee-type', $fee->id) }}"> Show </a></td>

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
