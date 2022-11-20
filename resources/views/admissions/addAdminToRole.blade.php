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
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Assign Role to admin
                    </h1>
                    <div class="card ">


   <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="signup-content p-5">
                            <form method="POST" action="/roleToAdmin" class="border border-success shadow p-5 rounded">
                                @csrf
                                {{--  <h4 class=" h4 form-title mb-4 text-center fw-bold text-success"> Assign Role(s) To Admin  --}}
                                </h4>
                                @if (session('approvalMsg'))
                                    {!! session('approvalMsg') !!}
                                @endif
                                <div class="form-group">
    
                                    <select id="admin" name="admin" class="form-control">
                                        <option value="" selected disabled>Select Admin</option>
                                        @foreach ($admin as $admin)
                                            <option value="{{ $admin->id }}">
                                                {{ $admin->surname . ' ' . $admin->first_name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group">

                                    <div class="card">
                                        <div class="card-body" id="rolediv" style="max-height: 10rem; overflow-y: auto;">
                                            <label class="fw-bold">Select Appropriate Role(s)</label>
                                            @foreach ($roles as $role)
                                                <div class="form-check @error('task') is-invalid @enderror">
                                                    <input class="form-check-input" type="checkbox" id="role"
                                                        name="roles[]" value="{{ $role->id }}">
                                                    <label class="form-check-label">{{ $role->role }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>

                                <button type="submit" class="btn text-white fw-bold btn-success my-2">
                                    {{ __('Add Role') }}
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
    <script src="{{ asset('js/bootbox.min.js') }}"></script>
 <script>
        $(document).on('change', '#admin', function() {
            var id = $("#admin").val();
            $.ajax({
                url: '/getRoles',
                type: 'GET',
                data: {
                    admin: id
                },
                success: function(response) {
                    var jsonn = $.parseJSON(response.trim());
                    $('#rolediv').html(jsonn.msg);
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
