@extends('layouts.mini')



@section('pagetitle') {{$program_course->course->code}}  @endsection



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


            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">{{$program_course->session->name}} {{$program_course->program->name}} {{$program_course->course->code}} Students Result</h3>
				</div>

            @include('partialsv3.flash')

             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>Id</th>
							  <th>Mat No</th>
							  <th>CA 1</th>
							  <th>CA 2</th>
							  <th>CA 3</th>
							  <th>Exam</th>
							  <th>Total</th>



						  </thead>

							<tbody>

						  @foreach ($results as $key => $result)

							<tr>
							  <td>{{ $loop->iteration }}</td>
							  <td>{{ $result->student->academic->mat_no }}</td>
								<td>{{ $result->CA1 }}</td>
								<td>{{ $result->CA2 }}</td>
								<td>{{ $result->CA3 }}</td>
								<td>{{ $result->exam }}</td>
								<td>{{ $result->total }}</td>


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
