@extends('layouts.mini')



@section('pagetitle')
    List Students
@endsection

@section('css')
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{ asset('v3/plugins/ekko-lightbox/ekko-lightbox.css') }}">
@endsection


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
 @isset($sum)
                        {{($sum)}}
                    @else
                        List Students
                    @endisset
                    </h1>
                    <div class="card ">


                        <div class="table-responsive card-body">

                            <table class="table table-striped">
                                <thead>

                                    <th>S/N</th>
                                    {{--  <th>DB ID</th>
                                     <th>USER ID</th>  --}}
                                      <th>Passport</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Usernameame</th>
                                    <th>Matric No</th>
                                    <th>Parents Name</th>
                                    <th>Parents Email</th>
                                    <th>Parents Phone</th>
                                     @can('viewcourseform', 'App\StudentResult')
                                        <th>Registered Courses</th>
                                    @else
                                        <th></th>
                                    @endcan
                                      @can('view', 'App\Student')
                                        <th colspan="2">Action</th>
                                    @else
                                        <th></th>
                                    @endcan
                                    @can('transcript', 'App\Student')
                                        <th>Transcript</th>
                                    @else
                                        <th></th>
                                    @endcan
                                     {{--  @can('search', 'App\Bursary')
                                        <th colspan="2">
                                            RRR</th>
                                    @else
                                        <th></th>
                                    @endcan  --}}
                                </thead>


                                <tbody>

                                    @foreach ($students as $key => $student)
                                        <tr>


                                            {{--  <td>{{$student->id}}</td>
                                             <td>{{$student->user_id}}</td>  --}}
                                                   <td>{{ $key + $students->firstItem() }}.</td>
                                               <td>
                                                <a href="data:image/png;base64,{{ $student->passport }}"
                                                    data-toggle="lightbox" data-title="Passport">
                                                    <img src="data:image/png;base64,{{ $student->passport }}"
                                                        class="img elevation-2" alt="Passport" width="50px">
                                                </a>
                                            </td>
                                            <td>{{ $student->full_name }}</td>
                                            <td>{{ $student->phone }}</td>
                                             <td>{{ $student->username }}</td>
                                            @if ($student->academic)
                                                <td>{{ $student->academic->mat_no }}</td>
                                            @endif
                                            <td>{{ $student->contact->surname }} {{ $student->contact->other_names }}</td>
                                            <td>{{ $student->contact->email }}</td>
                                            <td>{{ $student->contact->phone }}</td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ route('result.coursesReg_student', $student->id) }}"> Show
                                                    Courses</a></td>
                                                      @can('view', 'App\Student')
                                                <td><a class="btn btn-default" href="{{ route('student.view', $student->id) }}">
                                                        <i class="fa fa-eye"></i>View</a></td>
                                            @else
                                                <td></td>
                                            @endcan
                                            @can('show', 'App\Student')
                                                <td><a class="btn btn-primary" href="{{ route('student.show', $student->id) }}">
                                                        <i class="fa fa-eye"></i>Edit</a></td>
                                            @else
                                                <td></td>
                                            @endcan

                                            @can('transcript', 'App\Student')
                                                <td><a class="btn btn-info"
                                                        href="{{ route('student.transcript', base64_encode($student->id)) }}"
                                                        target="_blank"> <i class="fa fa-eye"></i> Transcript</a></td>
                                            @else
                                                <td></td>
                                            @endcan

                                            {{--  @can('search', 'App\Bursary')
                                                <td> {!! Form::open(['route' => 'remita.find-student', 'method' => 'POST', 'class' => 'nobottommargin']) !!}

                                                    {!! Form::hidden('data', $student->id, [
                                                        'placeholder' => 'Student Matric',
                                                        'class' => 'form-control',
                                                        'id' => 'data',
                                                        'required' => 'required',
                                                    ]) !!}

                                                    <button type="submit" class="btn btn-success"><span
                                                            class="icon-line2-trash"></span><i class="fa fa-eye"></i> Paid
                                                    </button>

                                                    {!! Form::close() !!}
                                                </td>
                                                <td> <a class="btn btn-warning" target="_blank"
                                                        href="{{ route('remita.find-studentunpaidrrr', $student->id) }}"> <i
                                                            class="fa fa-eye"></i> Unpaid </a>
                                                </td>
                                            @else
                                                <td></td>
                                            @endcan  --}}

                                        </tr>
                                    @endforeach

                                </tbody>



                            </table>
                            {!! $students->render() !!}


                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <!-- /.box -->


        </section>
        <!-- /.content -->
    </div>
@endsection

@section('pagescript')
    <script src="<?php echo asset('js/bootbox.min.js'); ?>"></script>

    <!-- Ekko Lightbox -->
    <script src="{{ asset('v3/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

    <script>
        function deleteOption(id) {
            bootbox.dialog({
                message: "<h4>You are about to delete a Patient</h4> <h5>Note: This action is permanent and irreversible? </h5>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("deleteForm" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }
    </script>

    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
@endsection
