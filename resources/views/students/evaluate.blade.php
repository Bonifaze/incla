@extends('layouts.student')



@section('pagetitle')
    Evaluate
@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('course-open')
    menu-open
@endsection

@section('course')
    active
@endsection

<!-- Page -->
@section('evaluation')
    active
@endsection

<!-- End Sidebar links -->



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    {!! Form::open(['method' => 'Post', 'route' => 'student.store-evaluation', 'id' => '{{ $result->id }}']) !!}
                    {{ Form::hidden('student_result_id', $result->id) }}
                    {{ Form::hidden('num', count($questions)) }}

                    <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        {{ $result->programCourse->course->code }} Course Evaluation
                    </h1>

                    <div class="card">
                        
                        <h5 class="p-3"> Any evaluation response is anonymous and confidential.</h5>
                        <div class="card-body">

                            <div class="box-body">

                                @include('partialsv3.flash')
                                <div class="row form-group">
                                    <div class="col-sm-1 bg-success p-2">#</div>
                                    <div class="col-sm-4 bg-success p-2">Question</div>
                                    <div class="col-sm-7 bg-success p-2">Options</div>
                                </div>
                                @foreach ($questions as $key => $question)
                                    <div class="row form-group">
                                        <div class="col-sm-1">{{ $loop->iteration }}.</div>
                                        <div class="col-sm-4">{!! $question->question !!}</div>
                                        <div class="col-sm-7">{!! $question->options() !!}</div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="card-footer">
                            {{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </section>
    </div>
@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
@endsection
