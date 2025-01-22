@extends('layouts.mini')



@section('pagetitle')
Staff Home
@endsection

 <style>
    #multi-filter-select {
        table-layout: fixed;
        width: 100%;
    }

    #multi-filter-select td, #multi-filter-select th {
        white-space: nowrap; /* Prevent text from wrapping */
        overflow: hidden; /* Hide overflowed text */
        text-overflow: ellipsis; /* Show ellipsis (...) when text overflows */
        padding: 5px 10px;
    }

    /* Set fixed width for columns */
  /
    #multi-filter-select td:nth-child(4) {
        width: 150px;
    }

    #multi-filter-select td:nth-child(6),
    #multi-filter-select td:nth-child(5) {
        width: 1px;
    }

    /
</style>

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
                <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    All Registered Users
                </h1>

                <div class="card shadow border border-success">

                    <div class="container">
                        <div class="page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="multi-filter-select" class=" table table-striped table-hover" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Surname</th>
                                                            <th>First Name</th>
                                                            <th>Phone Number</th>
                                                            <th>Email</th>
                                                            <th>Edit Action</th>
                                                            <th>Reset Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Surname</th>
                                                            <th>First Name</th>
                                                            <th>Phone Number</th>
                                                            <th>Email</th>
                                                            <th>Edit</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @foreach ($allApplicants as $allApp)
                                                        <tr>
                                                            <td>{{ $allApp->surname }}</td>
                                                            <td>{{ $allApp->first_name }}</td>
                                                            <td>{{ $allApp->phone }}</td>
                                                            <td>{{ $allApp->email }}</td>
                                                            <td><a href="/editusers/{{ $allApp->email }}" class="btn btn-warning">Edit</a></td>
                                                            <td>
                                                                <form method="POST" action="resetuserspassword">
                                                                    @csrf
                                                                    <input type="hidden" value="{{ $allApp->email }}" placeholder="{{ $allApp->email }}" name="email">
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



            </div>
        </div>

</div>


</section>
</div>
@endsection
<script>
    $(document).ready(function() {
        $('#multi-filter-select').DataTable();
    });

</script>
@section('pagescript')
<script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
@endsection

