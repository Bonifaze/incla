@extends('layouts.mini')



@section('pagetitle')
    List of Courses
@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('courses-open')
    menu-open
@endsection

@section('courses')
    active
@endsection

<!-- Page -->
@section('list-roles')
    active
@endsection

<!-- End Sidebar links -->



@section('content')
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    @include('partialsv3.flash')

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        List of active Courses
                    </h1>

                    <div class="card">

                        <div class="table-responsive card-body">

                            <table class="table table-bordered table-striped" id="dataTable2" width="100%" cellspacing="0">
                                <thead>

                                    <th>#</th>
                                    <th>Course Code</th>
                                    <th>Course Title</th>
                                    <th>Course Unit</th>
                                    {{--  <th>Description</th>  --}}
                                    {{--  <th>Status</th>  --}}
                                    {{--  <th>Action</th>  --}}
                                    <th>Action</th>
                                    {{--  <th>Action</th>  --}}

                                </thead>


                                <tbody>

                                    @foreach ($courses as $key => $course)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                         {{--    <td>{{ $course->id }}</td> --}}
                                            <td>{{ $course->course_code }}</td>
                                            <td>{{ $course->course_title }}</td>
                                            <td>{{ $course->credit_unit }}</td>
                                            {{--  <td>{{ $course->description }}</td>  --}}
                                            {{--  <td>{{ $course->course_status }}</td>  --}}
                                            <td><a href="{{ route('course.edit', $course->id) }}" class="btn btn-default"> Edit </td>

                                            <td>
                                                {!! Form::open(['method' => 'Delete', 'route' => 'course.delete', 'id' => 'deleteCourseForm' . $course->id]) !!}
                                                {{ Form::hidden('id', $course->id) }}


                                                {{--  <button onclick="deleteCourse({{ $course->id }})" type="button"
                                                    class="{{ $course->id }} btn btn-danger"><span
                                                        class="icon-line2-trash"></span> Delete</button>  --}}
                                                {!! Form::close() !!}

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>



                            </table>
                            {!! $courses->render() !!}


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('pagescript')
    <script src="{{ asset('dist/js/bootbox.min.js') }}"></script>

    <script>
        function deleteCourse(id) {
            bootbox.dialog({
                message: "<h4>Confirm you want to delete this course</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("deleteCourseForm" + id).submit();
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
