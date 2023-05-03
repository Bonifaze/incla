@extends('layouts.student')



@section('pagetitle')
    Academic Results
@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('result-open')
    menu-open
@endsection

@section('result')
    active
@endsection

<!-- Page -->
@section('results')
    active
@endsection

<!-- End Sidebar links -->



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    @include('partialsv3.flash')

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Academic Result
                    </h1>

                    <div class="card card-success">
                         <a class="btn btn-primary"
                                                    href="{{ route('students.studentResult') }}"
                                                    target="_blank"> <i class="fa fa-eye"></i> Show Result </a>
                    </div>

                    <div class="table-responsive shadow">

                        <table class="table table-striped">
                            <thead>

                                {{--  <th>S/N</th>  --}}
                                <th>Session</th>
                                <th>Semester</th>
                                <th>Level</th>
                                {{--  <th>GPA</th>  --}}
                                {{--  <th>Details</th>  --}}
                                <th>Course Form</th>

                            </thead>


                            <tbody>

                                @foreach ($registrations as $key => $reg)
                                    <tr>
                                    @if ( $reg->semester==1 )
                                        {{--  <td>{{ $loop->iteration }}</td>  --}}
                                    <td>{{ $reg->session->name }}</td>

                                       @if ($reg->semester==1 )
                                          <td>First/Second Semester </td>
                                       @else
                                           <td>Second Semester</td>
                                       @endif
                                        <td>{{ $reg->level }}</td>
                                        {{--  <td>{{ $reg->gpa()->value }}</td>  --}}
                                        {{--  <td>
                                            @if ($reg->result()->isNotEmpty())
                                                <a class="btn btn-primary"
                                                    href="{{ route('students.studentResult') }}"
                                                    target="_blank"> <i class="fa fa-eye"></i> Show Result </a>
                                            @else
                                                Results not yet available
                                            @endif

                                        </td>  --}}
                                        <td> <a class="btn btn-info"
                                                href="{{ route('student.course-form', base64_encode($reg->id)) }}"
                                                target="_blank"> <i class="fa fa-print"></i> Print Form </a></td>  @else



@endif
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
