@extends('layouts.mini')



@section('pagetitle')
    List of Academic Departments
@endsection




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
                        List of Academic Departments
                    </h1>

                    <div class="card">

                        <div class="table-responsive card-body">

                            <table class="table table-striped">
                                <thead>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>College</th>
                                    <th>Programs</th>
                                    <th>Action</th>
                                    {{--  <th>Action</th>  --}}
                                </thead>

                                <tbody>

                                    @foreach ($departments as $key => $department)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $department->name }}</td>
                                            <td>{{ $department->college->name }}</td>

                                            <td>{{ $department->programs->count() }}</td>

                                            @can('edit', 'App\AcademicDepartment')
                                                <td><a class="btn btn-primary"
                                                        href="{{ route('academia.department.edit', $department->id) }}"> Edit
                                                    </a></td>
                                            @else
                                                <td> </td>
                                            @endcan
                                            @can('delete', 'App\AcademicDepartment')
                                                {{--  <td>
                                                    {!! Form::open([
                                                        'method' => 'Delete',
                                                        'route' => 'academia.department.delete',
                                                        'id' => 'deleteDepartmentForm' . $department->id,
                                                    ]) !!}
                                                    {{ Form::hidden('id', $department->id) }}
                                                    <button onclick="deleteDepartment({{ $department->id }})" type="button"
                                                        class="{{ $department->id }} btn btn-danger"><span
                                                            class="icon-line2-trash"></span> Delete</button>
                                                    {!! Form::close() !!}
                                                </td>  --}}
                                            @else
                                                <td> </td>
                                            @endcan

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {!! $departments->render() !!}
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
        function deleteDepartment(id) {
            bootbox.dialog({
                message: "<h4>Confirm you want to delete this Department</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("deleteDepartmentForm" + id).submit();
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
