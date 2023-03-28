@extends('layouts.mini')



@section('pagetitle')
{{--  {{$program_course->course_code}}   --}}
 @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('staff-open') menu-open @endsection

@section('staff') active @endsection

<!-- Page -->
 @section('staff-courses') active @endsection

 <!-- End Sidebar links -->




@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">


            <div class="card card-primary">
                   <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                       {{--  {{ $program_course->program->name }}   --}}
                       {{$program_course_name->course_code}}
                        Student List
                    </h1>


            @include('partialsv3.flash')

             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>Id</th>
							  <th>Name</th>
							  <th>Mat No</th>
							  <th>Phone</th>
							  <th>Email</th>
							  <th>Guardian Contact</th>
							  <th>Guardian Phone</th>



						  </thead>

							<tbody>

						  @foreach ($program_course as $key => $result)

							<tr>
							  <td>{{ $loop->iteration }}</td>
								<td>{{ $result->student->full_name }}</td>
							  <td>{{ $result->student->academic->mat_no }}</td>
								<td>{{ $result->student->phone }}</td>
								<td>{{ $result->student->email }}</td>
								<td>{{ $result->student->contact->name }}</td>
								<td>{{ $result->student->contact->phone }}</td>



							</tr>
							@endforeach

						  </tbody>



						</table>



            </div>

				<!-- /.card-body -->


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
