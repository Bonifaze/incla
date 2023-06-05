@extends('layouts.mini')



@section('pagetitle')
    Edit Session
@endsection



@section('content')
    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">
                <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Edit Admission Session
                    </h1>
                    <div class="card">

                        @include('partialsv3.flash')

                        {!! Form::model($sessions, ['method' => 'PATCH', 'route' => ['session.updateAdmission', $sessions->id]]) !!}

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
                                    <div class="card-footer">
                                {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                            </div>

                            {!! Form::close() !!}

                                    <div class="row">


                                        <div class="table-responsive card-body">

                                            <table class="table table-striped">
                                                <thead>

                                                    <th>S/N</th>
                                                    <th>Name</th>


                                                    <th>Status</th>

                                                    <th>Action</th>





                                                </thead>


                                                <tbody>

                                                    @foreach ($admission as $key => $session)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>

                                                            <td>{{ $session->name }}</td>


                                                            @if ($session->status == 1)
                                                                <td>Admission is Open </td>
                                                            @else
                                                                <td>Admision is Close</td>
                                                            @endif

                                                            @if ($session->status == 1)
                                                            <td>
                                                                {!! Form::open([
                                                                        'method' => 'Patch',
                                                                        'route' => 'closeAdmissionType',
                                                                        'id' => 'setCurrentForm' . $session->id,
                                                                    ]) !!}
                                                                    {{ Form::hidden('id', $session->id) }}


                                                                    <button onclick="setCurrent({{ $session->id }})"
                                                                        type="submit"
                                                                        class="{{ $session->id }} btn btn-danger"> Deactive
                                                                    </button>
                                                                    {!! Form::close() !!}
                                                                    </td>
                                                            @elseif($session->status == 0)
                                                                <td>
                                                                    {!! Form::open([
                                                                        'method' => 'Patch',
                                                                        'route' => 'openAdmissionType',
                                                                        'id' => 'setCurrentForm' . $session->id,
                                                                    ]) !!}
                                                                    {{ Form::hidden('id', $session->id) }}


                                                                    <button onclick="setCurrent({{ $session->id }})"
                                                                        type="submit"
                                                                        class="{{ $session->id }} btn btn-primary"> Active
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





                            </div>



                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
<script src="{{ asset('dist/js/bootbox.min.js')}}"></script>

	<script>


		function setCurrent(id)
		{
			bootbox.dialog({
				message: "<h4>Confirm you want to set this as the current session?</h4>",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success',
						callback: function(){
							document.getElementById("setCurrentForm"+id).submit();
						}
					},
					cancel: {
						label: 'No',
						className: 'btn-danger',
					}
				},
				callback: function (result) {}

			});
			// e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
		}

	</script>
