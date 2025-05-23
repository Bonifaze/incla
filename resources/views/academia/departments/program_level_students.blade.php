@extends('layouts.mini')



@section('pagetitle') {{ $level }} Level Students @endsection


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">

             @include('partialsv3.flash')

            <div class="card ">

                             <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                       {{ $level }} Level Students
                    </h1>



             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
                              <th>Name</th>
							 <th>Phone</th>
							 <th>Mat No</th>
                              <th>View</th>
                              {{--  <th>Course Form</th>  --}}
                              <th>Transcript</th>

						  </thead>


						  <tbody>
                          @foreach ($students as $key => $student)

						 <tr>
                             <td> {{$loop->iteration}}</td>
                             <td> {{$student->full_name}}</td>
                             <td> {{$student->phone}}</td>
                             <td> {{$student->mat_no}}</td>
                             <td><a class="btn btn-primary" target="_blank" href="{{ route('student.view',$student->student_id) }}">  Show</a></td>
                             {{--  <td><a class="btn btn-info" href="{{ route('semester.registration', [base64_encode($student->id), $session]) }}" target="_blank"> Print Form </a></td>  --}}
                             <td><a class="btn btn-info" target="_blank" href="{{ route('student.transcript',base64_encode($student->student_id)) }}"> Transcript</a></td>


                         </tr>
                          @endforeach

						  </tbody>



						</table>


            </div>

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

