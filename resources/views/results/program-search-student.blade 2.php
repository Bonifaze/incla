
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">






                    <div class="card card-primary">
                        <h1
                            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                            Student Result Management
                        </h1>
                        @include('partialsv3.flash')
                        <div class="table-responsive">

                            <!-- form start -->

                            {!! Form::open(['route' => 'result.program_find_student', 'method' => 'POST', 'class' => 'nobottommargin']) !!}
                            <div class="card-body">
                                <div class="box-body">

                                    <div class="row">

                                        <div class="col-md-6 form-group">
                                            <label for="mat_no">Student Id or Matric Number :</label>
                                            {!! Form::text('mat_no', null, [
                                                'placeholder' => '',
                                                'class' => 'form-control',
                                                'id' => 'mat_no',
                                                'required' => 'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('mat_no') }}</span>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="program">Program :</label>
                                            {{ Form::select('program', $programs, null, ['class' => 'form-control', 'id' => 'program', 'name' => 'program']) }}
                                            <span class="text-danger"> {{ $errors->first('program') }}</span>
                                        </div>


                                    </div>



                                </div>
                            </div>


                            <!-- /.card-body -->

                            <div class="card-footer">

                                {{ Form::submit('Search', ['class' => 'btn btn-primary']) }}

                            </div>

                        </div>
                        <!-- /.box-body -->


                        {!! Form::close() !!}

                    </div>
























                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->

  {{--  OLD RESULT BEGINS  --}}
            <div class="card card-primary">
                <h1
                    class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Download Old Result <span class="text-primary">
                    </span>
                </h1>

                @include('partialsv3.flash')
                <div class="table-responsive">

                    <!-- form start -->

                    {!! Form::open([
                        'route' => 'academia.department.export_view_oldresult',
                        'method' => 'GET',
                        'class' => 'nobottommargin',
                    ]) !!}
                    <div class="card-body">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-md-6  form-group">
                                    <label for="session_id">Session :</label>
                                    {{ Form::select('session_id', $sessions, null, ['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id']) }}
                                    <span class="text-danger"> {{ $errors->first('session_id') }}</span>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="session_id">Session :</label>
                                    {{ Form::select('program_id', $programs, null, ['class' => 'form-control', 'id' => 'program_id', 'name' => 'program_id']) }}
                                    <span class="text-danger"> {{ $errors->first('program_id') }}</span>
                                </div>

                                <div class="col-md-6  form-group">
                                    <label for="semester">Semester :</label>
                                    {{ Form::select(
                                        'semester',
                                        [
                                            '1' => 'First Semester',
                                            '2' => 'Second Semester',
                                        ],
                                        1,
                                        ['class' => 'form-control select2'],
                                    ) }}
                                    <span class="text-danger"> {{ $errors->first('semester') }}</span>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="level">Level :</label>
                                    {{ Form::select(
                                        'level',
                                        [
                                            '100' => '100 Level',
                                            '200' => '200 Level',
                                            '300' => '300 Level',
                                            '400' => '400 Level',
                                            '500' => '500 Level',
                                            '600' => '600 Level',
                                            '700' => 'PGD',
                                            '800' => 'MSc',
                                            '900' => 'PhD',
                                        ],
                                        100,
                                        ['class' => 'form-control select2'],
                                    ) }}
                                    <span class="text-danger"> {{ $errors->first('level') }}</span>
                                </div>

                            </div>


                        </div>
                    </div>


                    <!-- /.card-body -->

                    <div class="card-footer">

                        {{ Form::submit('Download', ['class' => 'btn btn-primary float-right']) }}

                    </div>

                </div>
                <!-- /.box-body -->


                {!! Form::close() !!}

            </div>
            {{--  THE END  --}}


            {{--  result Audit  --}}
              <div
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm  text-success border">
                       Result Audit
                                                    <a href="/program-courses/results/resultBarchat"
                                                        class="float-right btn btn-outline-info">VIEW BAR CHAT</a>

                    </div>
            <div class="table-responsive card-body">

                            <h3 class="card-title">  </h3>
                        </div>
						<table class="table table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
						  <thead>

							  <th>S/N</th>
						    {{--  <th>Staff Id</th>  --}}
                            <th>Staff Name</th>
                              <th>Course </th>
							 <th>session</th>
							 <th>Semester</th>
                             <th>Level</th>
                                <th>Old Score</th>
                             <th>New Score</th>
                            {{--  <th>Program</th>  --}}
                            <th>Student MatNo.</th>
                            <th>Student Name</th>
                            <th>Date</th>
						  </thead>


						  <tbody>

						  @foreach ($modify as $key => $audit)

							<tr>
							  <td>{{ $loop->iteration }}</td>
							  <td>{{  $audit->staff->full_name ?? null}}</td>
                              {{--  <td>{{ $audit->modifiedBy->full_name ?? null}}</td>  --}}
                                <td>{{ $audit->course->course_code}} ({{ $audit->course->course_title}})</td>

							 <td>{{ $audit->sessions->name }}</td>

                              @if($audit->semester==1)
                                        <td>First</td>
                                        @else
                                        <td>Second</td>
                                        @endif
                             <td>{{ $audit->level}}</td>
                               <td class="text-warning h2">{{ $audit->old_total ?? null}}</td>
                             <td class="text-success h1">{{ $audit->total ?? null}}</td>
                             <td>{{ $audit->student->academic->mat_no ?? null}}</td>
                             <td>{{ $audit->full_name}}</td>
                                   <td>{{ $audit->updated_at}}</td>



							</tr>

							@endforeach


						  </tbody>


						</table>



            </div>
{{--  end of result audit  --}}
    </div>
    <!-- /.row -->

    <!-- /.content -->
    </div>

