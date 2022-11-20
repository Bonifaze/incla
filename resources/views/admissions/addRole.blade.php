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
                        Add New Role
                    </h1>
                    <div class="card ">



                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="signup-content p-5">
                            <form method="POST" action="/adminRole" class="border border-success shadow p-5 rounded">
                                @csrf
                                {{--  <h4 class=" h4 form-title mb-4 text-center fw-bold text-success"> Add New Role</h4>  --}}
                                @if (session('signUpMsg'))
                                    {!! session('signUpMsg') !!}
                                @endif
                                <div class="form-group">
                                    <div class="form-group">
                                        <input id="role" type="text"
                                            class="form-control @error('role') is-invalid @enderror" name="role"
                                            value="{{ old('role') }}" required autocomplete="role" placeholder="Role"
                                            autofocus>

                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <input id="role_description" type="text"
                                            class="form-control @error('role_description') is-invalid @enderror"
                                            name="role_description" value="{{ old('role_description') }}" required
                                            placeholder="Role Description" autocomplete="role_description" autofocus>

                                        @error('role_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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


    <!-- jQuery UI -->
    <script src="{{ asset('v3/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Ekko Lightbox -->
    <script src="{{ asset('v3/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
@endsection
