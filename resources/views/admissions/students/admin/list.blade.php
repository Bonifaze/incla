@extends('layouts.mini')



@section('pagetitle')
    Staff Home
@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('staff-open')
    menu-open
@endsection
<style>
  /* Styling for the small avatar container */
  .avatar-sm {
    width: 40px;  /* Set the container size to 40px */
    height: 40px; /* Same height as width to keep it circular */
    display: inline-flex; /* Ensure it stays inline */
    justify-content: center;
    align-items: center;
  }

  /* Styling for the image inside the avatar */
  .avatar-img {
    width: 100%;  /* Ensure the image fills the container */
    height: 100%; /* Maintain aspect ratio within the container */
    object-fit: cover; /* Ensure the image is properly cropped to fit */
    border-radius: 50%; /* Ensure the image stays round */
  }
  {{--  src="{{ asset('img/logs.png') }}  --}}
</style>
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


  <h1 class="app-page-title text-uppercase h6 font-weight-bold p-3 mb-3 shadow-sm text-center text-white bg-success border rounded">
                    Welcome to the  Registered Users Page
                </h1>




                <div class="card-body ps-0" style="overflow-x: auto; white-space: nowrap; padding-bottom: 1rem;">
                    <div class="d-flex">
                        <!-- Avatar items with responsive grid classes -->
                      @foreach ($users as $allApp)

                        <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center mb-3">
                            <a href="" class="avatar avatar-sm rounded-circle border border-primary">
                                <img alt="{{ $allApp->surname }}" title="{{ $allApp->surname }}" class="avatar-img" src="{{ asset('img/logs.png') }}">
                            </a>
                            <p class="mb-0 text-sm" >{{ $allApp->surname }}</p>
                            {{--  <small class="mb-0 text-sm">{{ $allApp->surname }}</small>  --}}
                        </div>
                        @endforeach

                        <!-- More avatars can be added here -->
                    </div>
                </div>

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
