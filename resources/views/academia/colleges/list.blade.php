@extends('layouts.mini')

@section('pagetitle')
    Faculty
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
                        Faculties
                    </h1>

                    <div class="card">

                        <div class="table-responsive card-body">

                            <table class="table table-striped">
                                <thead>
                                    <th>S/N</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    {{--  <th>Action</th>  --}}
                                </thead>


                                <tbody>

                                    @foreach ($colleges as $key => $college)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $college->code }}</td>
                                            <td>{{ $college->name }}</td>
                                            <td>{{ $college->state }}</td>

                                            <td><a class="btn btn-primary"
                                                    href="{{ route('academia.college.edit', $college->id) }}"> Edit </a></td>
                                            {{--  <td>
							{!! Form::open(['method' => 'Delete', 'route' => 'academia.college.delete', 'id'=>'deleteCollegeForm'.$college->id]) !!}
				    		{{ Form::hidden('id', $college->id) }}
				    		<button onclick="deleteCollege({{$college->id}})" type="button" class="{{$college->id}} btn btn-danger" ><span class="icon-line2-trash"></span> Delete</button>
				    		{!! Form::close() !!}
							</td>  --}}
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {!! $colleges->render() !!}
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
        function deleteCollege(id) {
            bootbox.dialog({
                message: "<h4>Confirm you want to delete this College</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("deleteCollegeForm" + id).submit();
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
