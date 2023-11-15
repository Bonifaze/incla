@extends('layouts.mini')



@section('pagetitle')
    Staff Home
@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('staff-open')
    menu-open
@endsection

@section('staff')
    active
@endsection

<!-- Page -->
@section('staff-home')
    active
@endsection

<!-- End Sidebar links -->



@section('content')
    <div class="content-wrapper bg-white">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Compute Result
                    </h1>

                    <div class="card shadow border border-success">

                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="body">
                                            <h4 class="card-title mb-4">
                                                Compute Result
                                            </h4>
                                            @if ($errors->any())
                                                @foreach ($errors->all() as $error)
                                                    <div class="alert alert-danger">
                                                        {{ $error }}
                                                    </div>
                                                @endforeach
                                            @endif
                                            @if (session()->has('success'))
                                                <div class="alert alert-success">
                                                    {{ session()->get('success') }}
                                                </div>
                                            @endif
                                            <form action="" method="post" id="compute-form">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="program">Program</label>
                                                    <select name="program_id" id="program" class="form-control">
                                                        <option value="">Select Programme</option>
                                                        @foreach ($programs as $program)
                                                            <option value="{{ $program->id }}">{{ $program->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="session">Session</label>
                                                    <select name="session" id="session" class="form-control">
                                                        <option value="">Select Session</option>
                                                        @foreach ($sessions as $session)
                                                            <option value="{{ $session->id }}"
                                                                {{ $session->status == 1 ? 'selected' : '' }}>
                                                                {{ $session->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="level">Level</label>
                                                    <select name="level" id="level" class="form-control">
                                                        <option value="">Select Level</option>
                                                        @for ($i = 100; $i <= 600; $i += 100)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="semester">Semester</label>
                                                    <select name="semester" id="semester" class="form-control">
                                                        <option value="">Select Semester</option>
                                                        @for ($i = 1; $i < 3; $i++)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="text-center">
                                                    <p class="text-center compute-progress"></p>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit"  class="btn btn-success compute-btn">Compute</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@section('pagescript')
<script>
    $('#compute-form').submit(function (e) {
        e.preventDefault()
        let data = $(this).serialize()
        let btn = $('.compute-btn')
        $.ajax({
            url: "{{ route('admin.compute') }}",
            type: "POST",
            data: data,
            beforeSend: () => {
                btn.html('computing..')
                btn.attr('disabled', 'true')
            },
            success: res => 
            {
                let batch_id = res.batch_id
                const interval = setInterval(() => {
                    $.ajax({
                        url: "{{ route('admin.show_progress') }}",
                        type: "post",
                        data: {batch_id: batch_id},
                        success: resp => {
                            if (resp.progress < 100)
                            {
                                $('.compute-progress').html(resp.progress + '%');
                            }else
                            {
                                clearInterval(interval)
                            }
                        }
                    })
                }, 3000);
            }
        })
    })
</script>
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
@endsection
