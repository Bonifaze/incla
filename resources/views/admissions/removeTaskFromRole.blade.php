@extends('layouts.mini')



@section('pagetitle')
    List of Students
@endsection

@section('css')
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{ asset('v3/plugins/ekko-lightbox/ekko-lightbox.css') }}">
@endsection


<!-- Sidebar Links -->

<!-- Treeview -->
@section('bursary-open')
    menu-open
@endsection

@section('bursary')
    active
@endsection

<!-- Page -->
@section('bursary-search')
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

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-danger border">
                        Remove Task From Role
                    </h1>
                    <div class="card ">



                     <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="signup-content p-5">
                            <form method="POST" action="/adminRemoveTaskFromRole"
                                class="border border-danger shadow p-5 rounded">
                                @csrf
                                <h4 class=" h4 form-title mb-4 text-center fw-bold text-danger"> Remove Task From Role</h4>
                                @if (session('approvalMsg'))
                                    {!! session('approvalMsg') !!}
                                @endif
                                <div class="form-group">

                                    <select id="remove_role" name="role"
                                        class="form-control @error('role') is-invalid @enderror">
                                        <option value="" selected disabled>Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group">

                                    <div class="card">
                                        <div class="card-body" id="tasksdiv" style="max-height: 10rem; overflow-y: auto;">
                                            <label class="fw-bold">Select Appropriate Task(s)</label>
                                            @foreach ($tasks as $task)
                                                <div class="form-check @error('task') is-invalid @enderror">
                                                    <input class="form-check-input" type="checkbox" id="task"
                                                        name="tasks[]" value="{{ $task->id }}">
                                                    <label class="form-check-label">{{ $task->task }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>


                                <button type="submit" class="btn text-white fw-bold btn-danger my-2">
                                    {{ __('Remove Role') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>













                    </div>
                    <!-- /.box -->

                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('pagescript')
    <script>
        $(document).on('change', '#remove_role', function() {
            var id = $("#remove_role").val();
            $.ajax({
                url: '/RemoveTaskRole',
                type: 'GET',
                data: {
                    roleid: id
                },
                success: function(response) {
                    var jsonn = $.parseJSON(response.trim());
                    $('#tasksdiv').html(jsonn.msg);
                },
                error: function(response) {

                }

            });
        });
    </script>

    <!-- jQuery UI -->
    <script src="{{ asset('v3/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Ekko Lightbox -->
    <script src="{{ asset('v3/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
@endsection
