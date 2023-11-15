
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
                        EDIT Remita Service Type
                    </h1>
                  <div class="container">
            <div class="signup-content">
                @if (session('signUpMsg'))
                    {!! session('signUpMsg') !!}
                @endif
                <form method="POST" action="/editRemitaServiceTypefee" id="signup-form" class="shadow p-4">
                    @csrf
                    {{--  <h2 class="form-title text-success mx-3 text-uppercase">Edit Remita Service Type</h2>  --}}
                    <div class="form-group">

                        <div class="form-group">
                                      <label for="code">Provider Code :</label>
                            <input id="provider_code" type="text" class="form-input form-control m-3"
                                name="provider_code" required value="{{ $fee_types->provider_code }}" >
                                     <label for="code">Amount(₦‎) :</label>
                            <input id="amount" type="text" class="form-input form-control m-3" name="amount" required
                                value= "{{ $fee_types->amount }}" autofocus>
                                    <label for="code">Name :</label>
                            <input id="name" type="text" class="form-input form-control m-3" name="name" required
                                value="{{ $fee_types->name }}" autofocus>
                            {{--  <select class="form-input form-control m-3" name="category">
                                <option >{{ $fee_types->category }}</option>
                                <option value="1"> Application Fee</option>
                                <option value="2">Acceptance Fee</option>
                                <option value="3">School Fee</option>
                                <option value="4">Other Fee</option>

                            </select>  --}}
                            <button type="submit" class=" btn text-white fw-bold bg-success bg-gradient mx-3 px-4">
                                {{ __('Edit Service Type') }}
                            </button>
                        </div>
                    </div>

                </form>
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
