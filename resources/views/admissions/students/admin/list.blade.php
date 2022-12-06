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
    <div class="content-wrapper bg-white">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                      Registered Users
                    </h1>

                    <div class="card shadow border border-success">

                         <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">

                        <!-- Card Header - Dropdown -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                {{--  <h6 class="m-0 font-weight-bold text-success">All Registered Users</h6>  --}}
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
                                                <th>Surname</th>
                                                <th>First Name</th>
                                                <th>Phone Number</th>
                                                <th>Email</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($users as $allApp)
                                                <tr>

                                                    <td>{{ $allApp->surname }}</td>
                                                    <td>{{ $allApp->first_name }}</td>
                                                    <td>{{ $allApp->phone }}</td>
                                                    <td>{{ $allApp->email }}</td>
                                                    <td><a href="/editusers/{{ $allApp->email }}"
                                                            class="btn btn-warning">Edit</a></td>

                                                    <td>
                                                        <form method="POST" action="/resetuserspassword">
                                                            @csrf
                                                            <input type="hidden" value="{{ $allApp->email }}"
                                                                placeholder="{{ $allApp->email }}" name="email">
                                                            <button class="btn btn-danger">Reset Password</button>
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
                </div>

            </div>
        </section>
    </div>
@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
@endsection
