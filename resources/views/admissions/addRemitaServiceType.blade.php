
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
                      Add Remita Service Type
                    </h1>
                    <div class=" ">


<div class="container">
            <div class="signup-content">
                @if (session('signUpMsg'))
                    {!! session('signUpMsg') !!}
                @endif
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    {{--  <h6 class="m-0 font-weight-bold text-success">Add Remita Service Type </h6>  --}}
                    <div class="dropdown no-arrow">

                        <a href="/viewRemitaServiceType" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-eye text-white-50"></i> View </a>

                    </div>

                </div>
                <form method="POST" action="/addRemitaServiceType" id="signup-form" class="shadow p-4">
                    @csrf

                    <div class="form-group">

                        <div class="form-group">
                            <input id="provider_code" type="number" class="form-input form-control m-3"
                                name="provider_code" required placeholder="Service Type" autofocus>
                            <input id="amount" type="text" class="form-input form-control m-3" name="amount" required
                                placeholder="Amount" autofocus>
                            <input id="name" type="text" class="form-input form-control m-3" name="name" required
                                placeholder="Description" autofocus>





                            <select class="form-input form-control text-uppercase m-3" name="category">
                                <option>Select Fee Type Category</option>
                                <option value="1"> Application Fee</option>
                                <option value="2">Acceptance Fee</option>
                                <option value="3">School Fee</option>
                                <option value="4">Other Fee</option>

                            </select>

                              <select class="form-input form-control text-uppercase m-3" name="installment">
                                <option>Select Payment Type Instalment</option>
                                <option value="1"> Full Payment </option>
                                <option value="2">Part Payment</option>


                            </select>

                                <select class="form-input form-control text-uppercase m-3" name="college_id">
                                <option  value="0">Select College </option>
                                 
                                  <option value="1"> Management ,Science, Arts and Technology</option>
                                <option value="2"> Natural and Applied Science</option>
                                  <option value="3"> Faculty of Education</option>
                                   <option value="4"> Humanities </option>
                                  <option value="5"> MANAGEMENT SCIENCES </option>
                                   <option value="6"> SOCIAL SCIENCES </option>
                                  <option value="7"> Engineering</option>
                                    <option value="8"> LAW FACULTY</option>
                                    <option value="9"> HEALTH SCIENCES</option>
                                    <option value="8"> Pharmaceutical Sciences</option>
                                         <option value="9"> Ecclesiastical  Faculty of Theology</option>
                                     <option  value=" ">None of the Above </option>


                            </select>


                            <button type="submit" class=" btn text-white fw-bold bg-success bg-gradient mx-3 px-4">
                                {{ __('Add Service Type') }}
                            </button>
                        </div>
                    </div>

                </form>
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
