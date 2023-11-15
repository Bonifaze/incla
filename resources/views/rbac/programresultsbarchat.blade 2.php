@extends('layouts.mini2')


@section('content')

            <div class="">
                <!-- left column -->
                <div class="col_full">


                    <div class="">
                        <h1
                            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">

{{--  Academic Program  --}}
                        </h1>

                        @include('partialsv3.flash')
                        <div class="table-responsive card-body">

                            <table class="table table-striped text-white">
                                <thead class="text-white">

                                    <th>#</th>
                                    <th>Department</th>
                                    <th>Program</th>


                                    <th>Action</th>



                                </thead>


                                <tbody>

                                    @foreach ($programs as $key => $program)
                                        <tr >
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $program->department->name }}</td>
                                            <td class="h4">{{ $program->name }}</td>
                                             <td><a href="{{ route('program_course.resultbarchatCourse',$program->id) }}" class="btn btn-success"><i class="fa fa-eye"></i> View </a></td>







                                        </tr>
                                    @endforeach

                                </tbody>



                            </table>
                            {{--  {!! $programs->render() !!}  --}}


                        </div>

                    </div>
                    <!-- /.box -->

                </div>
                <!--/.col (left) -->


    </div>
@endsection

@section('pagescript')
    <script src="{{ asset('dist/js/bootbox.min.js') }}"></script>

    <script>
        function approveResult(id, program, level) {
            bootbox.dialog({
                message: "<h4>Confirm you want to approve result for " + program + " " + level + " level ?</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("approveResultForm" + id).submit();
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
@endsection
