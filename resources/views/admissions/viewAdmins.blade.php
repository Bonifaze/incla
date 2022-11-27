{{--  @php

if(!session('adminId'))
{

  header('location: /adminLogin');
  exit;
}
@endphp  --}}
@extends('layouts.app')

@section('content')


<!-- Page Wrapper -->
<div id="wrapper">

    @include('layouts.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Begin Page Content -->
        <div class="container-fluid ">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h5 mb-2 p-2 text-success fw-bold text-capitalize"> {{ $fullName }}: Admininstrator Dashboard</h1>
            </div>

            <div class="row">
                <!-- Area Chart -->
                <div class="col-12">
                    <!-- Card Header - Dropdown -->
                    <div class="card m-2 shadow">
                        @if (session('approvalMsg'))
                        {!! session('approvalMsg') !!}
                        @endif
                        <div class="card-header py-2">
                            <h6 class="fw-bold text-success mb-3">All Administrators List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Surname</th>
                                            <th>First Name</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($allAdmins as $allAdmin)

                                        <tr>
                                            <td>{{$allAdmin -> surname}}</td>
                                            <td>{{$allAdmin -> first_name}}</td>
                                            <td>{{$allAdmin -> phone}}</td>
                                            <td>{{$allAdmin -> email}}</td>
                                            <td>{{$allAdmin -> department}}</td>
                                            <td> <form method="POST" action="resetadminpassword">
                                                @csrf
                                                <input type="hidden" value="{{$allAdmin -> email}}" placeholder="{{$allAdmin -> email}}" name = "email">
                                                <button class="btn btn-warning">Reset Password</button>
                                            </form></td>
                                            <td><a class="btn btn-danger" type="button" href="/viewAdmins/{{$allAdmin -> id}}">Delete Admin</a></td>
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
<!-- End of Content Wrapper -->

@endsection
