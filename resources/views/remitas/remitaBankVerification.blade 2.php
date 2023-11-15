@extends('layouts.mini')



@section('pagetitle')
Staff Home
@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('staff-open')
menu-open
@endsection

@section('staff')
active
@endsection

<!-- Page -->
@section('staff-home')
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

                @include('partialsv3.flash')
                <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Remitas with Status 025
                </h1>

                <div class="card">

                    <div class="table-responsive card-body">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>RRR</th>
                                    <th>Fee type</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($remitas as $remita)
                                <tr>
                                    <td>{{ $remita->id }}</td>
                                    <td>{{ $remita->rrr }}</td>
                                    <td>{{ $remita->fee_type }}</td>
                                    <td>{{ $remita->status_code }}</td>
                                    <td>{{ $remita->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{ $remitas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection


@section('pagescript')
<script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
<!-- jQuery UI -->
<script src="{{ asset('v3/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Ekko Lightbox -->
<script src="{{ asset('v3/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
<-- DATABABE SCRIPT -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/b-2.1.1/r-2.2.9/datatables.min.js"></script>
    @endsection