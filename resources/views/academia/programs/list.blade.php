@extends('layouts.mini')



@section('pagetitle')
    List of Academic Programs
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
                        List of Academic Programs
                    </h1>

                    <div class="card">

                        <div class="table-responsive card-body">
                            <table class="table table-striped">
                                <thead>
                                    <th>S/N</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    {{--  <th>Department</th>  --}}
                                    <th>Under Graduates</th>
                                    {{--  <th>Post Graduates</th>  --}}
                                    <th>Action</th>
                                </thead>

                                <tbody>
                                    @foreach ($programs as $key => $program)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $program->code }}</td>
                                            <td>{{ $program->name }}</td>
                                            {{--  <td>{{ $program->colleg->name }}</td>  --}}

                                            <td>{{ $program->undergraduates->count() }}</td>

                                            {{--  <td>{{ $program->postgraduates->count() }}</td>  --}}

                                            <td><a class="btn btn-primary"
                                                    href="{{ route('academia.program.edit', $program->id) }}"> Edit </a></td>

                                            {{--  <td>
                                                {!! Form::open([
                                                    'method' => 'Delete',
                                                    'route' => 'academia.program.delete',
                                                    'id' => 'deleteProgramForm' . $program->id,
                                                ]) !!}
                                                {{ Form::hidden('id', $program->id) }}
                                                <button onclick="deleteProgram({{ $program->id }})" type="button"
                                                    class="{{ $program->id }} btn btn-danger"><span
                                                        class="icon-line2-trash"></span> Delete</button>
                                                {!! Form::close() !!}
                                            </td>  --}}

                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                            {!! $programs->render() !!}
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
        function deleteProgram(id) {
            bootbox.dialog({
                message: "<h4>Confirm you want to delete this Program</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("deleteProgramForm" + id).submit();
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
