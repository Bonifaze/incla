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
                       Audit Record of Modified Result
                    </h1>


                    @include('partialsv3.flash')

{{--  // Search by al  --}}

<div class="table-responsive card-body">

                            <h3 class="card-title">  </h3>
                        </div>
						<table class="table table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
						  <thead>

							  <th>S/N</th>
						    {{--  <th>Staff Id</th>  --}}
                            <th>Staff Name</th>
                              <th>Course </th>
							 <th>session</th>
							 <th>Semester</th>
                             <th>Level</th>
                             <th>Score</th>
                            {{--  <th>Program</th>  --}}
                            <th>Student MatNo.</th>
                            <th>Student Name</th>
                            <th>Date</th>
						  </thead>


						  <tbody>

						  @foreach ($modify as $key => $audit)

							<tr>
							  <td>{{ $loop->iteration }}</td>
							  <td>{{  $audit->staff->full_name ?? null}}</td>
                              {{--  <td>{{ $audit->modifiedBy->full_name ?? null}}</td>  --}}
                                <td>{{ $audit->course->course_code}} ({{ $audit->course->course_title}})</td>

							 <td>{{ $audit->sessions->name }}</td>

                              @if($audit->semester==1)
                                        <td>First</td>
                                        @else
                                        <td>Second</td>
                                        @endif
                             <td>{{ $audit->level}}</td>
                             <td>{{ $audit->total ?? null}}</td>
                             <td>{{ $audit->student->academic->mat_no ?? null}}</td>
                             <td>{{ $audit->full_name}}</td>
                                   <td>{{ $audit->updated_at}}</td>



							</tr>

							@endforeach


						  </tbody>


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
