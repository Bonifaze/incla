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
                       Audit Record of all the Event Made
                    </h1>


                    @include('partialsv3.flash')

    <div class="table-responsive card-body">


                        </div>
						<table class="table table-striped"
                        id="dataTable"
                        width="100%"
                                        cellspacing="0">
						  <thead>

							  <th>S/N</th>
                             {{--  <th>Staff ID</th>  --}}
                              <th>Staff Name</th>
							 <th>Event</th>
							 <th>Audited Model</th>
                             <th>Old Values</th>
							<th>New Values</th>
                            <th>URL</th>
                            <th>IP Address</th>
                            <th>User PC/ Browser</th>
						    <th>Audit Id</th>
                            {{--  <th>Tags</th>  --}}
                            {{--  <th>Created at</th>  --}}
                            <th>Date</th>





						  </thead>


						  <tbody>

						  @foreach ($article as $audit)

							<tr>
							  <td>{{ $loop->iteration }}</td>
                                {{--  <td>{{ $audit->staff_id}}</td>  --}}
                              <td>{{ $audit->staff->full_name ?? null}}</td>
							 <td>{{ $audit->event}}</td>
                             <td>{{ $audit->auditable_type}}</td>
                             <td>
                              <table class="table">
                    @foreach($audit->old_values as $attribute => $value)
                      <tr>
                        <td><b>{{ $attribute }}</b></td>

                        <td>{{ $value }}</td>


                      </tr>
                    @endforeach
                  </table>
                  </td>
                       <td>
                              <table class="table">
                    @foreach($audit->new_values as $attribute => $value)
                      <tr>
                        <td><b>{{ $attribute }}</b></td>
                        <td>{{ $value  }}</td>
                      </tr>
                    @endforeach
                  </table>
                  </td>
                             {{--  <td>{{ $audit->old_values}}</td>  --}}
                              {{--  <td>{{ $audit->new_values}}</td>  --}}
                               <td>{{ $audit->url}}</td>
                                <td>{{ $audit->ip_address}}</td>
                                 <td>{{ $audit->user_agent}}</td>
                                  {{--  <td>{{ $audit->tags}}</td>  --}}
                                   {{--  <td>{{ $audit->created_at}}</td>  --}}
							  <td>{{ $audit->auditable_id }}</td>
                                    <td>{{ $audit->updated_at}}</td>

							 {{--  <td><a class="btn btn-warning" href="{{ route('rbac.edit-perm',$perm->id) }}"> <i class="fa fa-edit"></i> Edit </td>  --}}


							</tr>

							@endforeach
<p  class="text-danger text-bold mb-3 mt-3 float-right">Loads 100 record(s) per page</p>
						  </tbody>


{!! $article->render() !!}
						</table>





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
