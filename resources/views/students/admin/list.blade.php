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
                        List Students
                    </h1>

                    <div class="card ">


                        <div class="table-responsive card-body">

                            <table class="table table-striped">
                                <thead>

                                    <th>S/N</th>
                                    <th>Passport</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Matric No</th>
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
                                    @can('viewcourseform', 'App\StudentResult')
                                        <th>Registered Courses</th>
                                    @else
                                        <th></th>
                                    @endcan
                                    @can('disable', 'App\Student')
                                        <th>Action</th>
                                    @else
                                        <th></th>
                                    @endcan

                                </thead>


                                <tbody>

                                    @foreach ($students as $key => $student)
                                        <tr>
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
                                            @if ($student->academic)
                                                <td>{{ $student->academic->mat_no }}</td>
                                            @endif

                                            @can('view', 'App\Student')
                                                <td><a class="btn btn-default" href="{{ route('student.view', $student->id) }}">
                                                        View</a></td>
                                            @else
                                                <td></td>
                                            @endcan
                                            @can('show', 'App\Student')
                                                <td><a class="btn btn-default" href="{{ route('student.show', $student->id) }}">
                                                        Edit</a></td>
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
                                            @can('viewcourseform', 'App\StudentResult')
                                                <td><a class="btn btn-primary"
                                                        href="{{ route('result.coursesReg_student', $student->id) }}"> Show
                                                        Course Form</a></td>
                                            @else
                                                <td></td>
                                            @endcan
                                            @can('disable', 'App\Student')
                                                @if ($student->status == 1)
                                                    <td>
                                                        {!! Form::open([
                                                            'method' => 'patch',
                                                            'action' => 'AdminStudentsController@disable',
                                                            'id' => 'disableUForm' . $student->id,
                                                        ]) !!}
                                                        {{ Form::hidden('id', $student->id) }}
                                                        {{ Form::hidden('status', 2) }}
                                                        {{ Form::hidden('action', 'disabled') }}


                                                        <button type="submit" class="btn btn-danger"><span
                                                                class="icon-line2-trash"></span> Disable</button>
                                                        {!! Form::close() !!}

                                                    </td>
                                                @elseif ($student->status == 2)
                                                    <td>
                                                        {!! Form::open([
                                                            'method' => 'patch',
                                                            'action' => 'AdminStudentsController@disable',
                                                            'id' => 'enableUForm' . $student->id,
                                                        ]) !!}
                                                        {{ Form::hidden('id', $student->id) }}
                                                        {{ Form::hidden('status', 1) }}
                                                        {{ Form::hidden('action', 'enabled') }}

                                                        <button type="submit" class="btn btn-success"><span
                                                                class="icon-line2-trash"></span> Enable</button>
                                                        {!! Form::close() !!}

                                                    </td>
                                                @endif
                                            @else
                                                <td> </td>
                                            @endcan

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
