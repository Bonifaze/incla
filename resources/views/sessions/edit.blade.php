@extends('layouts.mini')



@section('pagetitle')
    Edit Program
@endsection



@section('content')
    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">
                <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Edit Session
                    </h1>
                    <div class="card">

                        @include('partialsv3.flash')

                        {!! Form::model($sessions, ['method' => 'PATCH', 'route' => ['session.update', $sessions->id]]) !!}

                        <div class="card-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="name">Session Name :</label>
                                        {!! Form::text('name', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'name',
                                            'required' => 'required',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                                    </div>



                                </div>

                    <h3
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-warning border">
                        Set Semester
                    </h3>
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label for="degree">Semester:</label>
                                        {{ Form::select(
                                            'semester',
                                            [
                                                '1' => 'First Semester',
                                                '2' => 'Second Semester',

                                            ],
                                            $sessions->semester,
                                            ['class' => 'form-control select2'],
                                        ) }}
                                        <span class="text-danger"> {{ $errors->first('degree') }}</span>
                                    </div>



                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
                <div class="row">


                                        <div class="table-responsive card-body">

                                            <table class="table table-striped">
                                                <thead>

                                                    <th>S/N</th>
                                                    <th>Name</th>


                                                    {{--  <th>Status</th>  --}}

                                                    <th>Action</th>





                                                </thead>


                                                <tbody>

                                                    @foreach ($courseReg as $key => $session)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>

                                                            <td>{{ $session->name }}</td>


                                                            {{--  @if ($session->status == 1)
                                                                <td>Course Registrstion is Available </td>
                                                            @else
                                                                <td>Course Registration iS CLose</td>
                                                            @endif  --}}

                                                            @if ($session->status == 1)

	                                                            <td>Current Status</td>
                                                            @elseif($session->status == 0)
                                                                <td>
                                                                    {!! Form::open([
                                                                        'method' => 'Patch',
                                                                        'route' => 'session.setcourseReg',
                                                                        'id' => 'session.setcourseReg' . $session->id,
                                                                    ]) !!}
                                                                    {{ Form::hidden('id', $session->id) }}


                                                                    <button onclick="setCurrent({{ $session->id }})"
                                                                        type="submit"
                                                                        class="{{ $session->id }} btn btn-primary"> Set
                                                                    </button>
                                                                    {!! Form::close() !!}

                                                                </td>
                                                            @endif

                                                        </tr>
                                                    @endforeach

                                                </tbody>



                                            </table>


                                        </div>


                                    </div>
        </section>
    </div>
@endsection
