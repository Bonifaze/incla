
@extends('layouts.mini')



@section('pagetitle')
    Staff Assigned Roles
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
                       Audit Record of Assigned staff Roles
                    </h1>


                    @include('partialsv3.flash')

{{--  // Search by al  --}}

<div class="table-responsive card-body">
 <div class="card-header">

                        </div>
			<table class="table table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
    <thead>
        <tr>
            <th>S/N</th>
            <th>Role</th>
            <th>Staff Name</th>
            <th>Assigned By</th>
             <th>Removed By</th>
             <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($logs as $key =>  $audit)
        <tr>
         <td>{{ $loop->iteration }}</td>
            <td>{{ $audit->role->name }}</td>
            <td>{{ $audit->staff->full_name ?? null}}</td>
          <td> {{ $audit->StaffName }}</td>
          <td> {{ $audit->StaffNameremove }}</td>
          <td>{{ \Carbon\Carbon::parse($audit->created_at)->format('l j, F Y H:i:s') }}


</td>
{{--  @if (auth()->user()->id == 506)
<td>Delect</td>
@else
    <td></td>
@endif  --}}

        </tr>
        @endforeach

    </tbody>
     {{--  {!! $modify->render() !!}  --}}
</table>




            </div>
    </div>
        </section>
    </div>
@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
     <script type="text/javascript">
        $(function() {
            // Bootstrap DateTimePicker v4
            $('#start_date').datetimepicker({
                format: 'YYYY-MM-DD',
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            // Bootstrap DateTimePicker v4
            $('#end_date').datetimepicker({
                format: 'YYYY-MM-DD',
            });
        });
    </script>
@endsection
