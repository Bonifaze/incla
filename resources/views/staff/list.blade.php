@extends('layouts.mini')

@section('pagetitle')
    List of Staff
@endsection

<!-- Sidebar Links -->
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
</style>

@section('staff')
    active
@endsection

<!-- Page -->
@section('list-staff')
    active
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <!-- Page Title -->
                    <h1 class="app-page-title text-uppercase h6 font-weight-bold p-3 mb-3 shadow-sm text-center text-white bg-success border rounded">
                        Welcome to the List of InCLA Staff Page
                    </h1>

                    <!-- Staff Avatars (Top Row) -->
                    <div class="card-body ps-0" style="overflow-x: auto; white-space: nowrap; padding-bottom: 1rem;">
                        <div class="d-flex">
                            @foreach ($staff as $key => $stf)
                                <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center mb-3">
                                    <a href="{{ route('staff.view', $stf->id) }}" class="avatar avatar-sm rounded-circle border border-primary">
                                        <img alt="{{ $stf->fullName }}" title="{{ $stf->fullName }}" class="avatar-img" src="data:image/png;base64,{{ $stf->passport }}">
                                    </a>
                                    <p class="text-sm">{{ explode(',', $stf->fullName)[0] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Staff Table -->
                    <div class="card">
                        <div class="table-responsive card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Passport</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staff as $key => $stf)
                                        <tr>
                                            <td>{{ $key + $staff->firstItem() }}</td>
                                            <td>
                                                <div class="image">
                                                    <img src="data:image/png;base64,{{ $stf->passport }}" class="img-circle elevation-2" height="100" alt="{{ $stf->fullName }} Image">
                                                </div>
                                            </td>
                                            <td>{{ $stf->fullName }}</td>
                                            <td>{{ $stf->username }}</td>
                                            <td>{{ $stf->phone }}</td>
                                            <td>
                                                <a href="{{ route('staff.view', $stf->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('staff.show', $stf->id) }}" class="btn btn-default">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                            </td>
                                            @if ($stf->id == Auth::guard('staff')->user()->id)
                                                <td class="info">
                                                    <strong>Logged</strong>
                                                </td>
                                            @elseif ($stf->status == 1)
                                                <td>
                                                    {!! Form::open(['method' => 'patch', 'action' => 'StaffController@disable', 'id' => 'disableUForm' . $stf->id]) !!}
                                                    {{ Form::hidden('id', $stf->id) }}
                                                    {{ Form::hidden('status', 2) }}
                                                    {{ Form::hidden('action', 'disabled') }}
                                                    <button type="submit" class="btn btn-danger">
                                                        <span class="icon-line2-trash"></span>
                                                        <i class="fas fa-user-slash"></i> Disable
                                                    </button>
                                                    {!! Form::close() !!}
                                                </td>
                                            @elseif ($stf->status == 2)
                                                <td>
                                                    {!! Form::open(['method' => 'patch', 'action' => 'StaffController@disable', 'id' => 'enableUForm' . $stf->id]) !!}
                                                    {{ Form::hidden('id', $stf->id) }}
                                                    {{ Form::hidden('status', 1) }}
                                                    {{ Form::hidden('action', 'enabled') }}
                                                    <button type="submit" class="btn btn-success">
                                                        <span class="icon-line2-trash"></span>
                                                        <i class="fas fa-door-open"></i> Enable
                                                    </button>
                                                    {!! Form::close() !!}
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $staff->render() !!}
                        </div>
                    </div>
                    <!-- End of Staff Table -->

                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
