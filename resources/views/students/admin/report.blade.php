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
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Student Report
                    </h1>
                    @include('partialsv3.flash')

                    <!-- Display counts -->
<div>
    <h3>Numbers of </h3>
    <p>Graduated Students : {{ $graduatedCount }}</p>
    <p>Postgraduate Students: {{ $postgraduateCount }}</p>
    <p>Undergraduate Students: {{ $undergraduateCount }}</p>
    <hr>
    <h3>Numbers of Undergrauate :</h3>
    <p>Male Students: {{ $maleCount }}</p>
    <p>Female Students: {{ $femaleCount }}</p>
    <hr>
    <h3>Numbers of PostGraduate :</h3>
    <p>Male Students: {{ $maleCountPost }}</p>
    <p>Female Students: {{ $femaleCountPost }}</p>
    <hr>
    <h3>Numbers of Undergrauate :</h3>
    <p>Catholic Students: {{ $catholicCount }}</p>
    <p>Non-Catholic Students: {{ $nonCatholicCount }}</p>
    <p>Muslim Students: {{ $muslimCount }}</p>
    <p>Other Religions: {{ $otherReligionCount }}</p>
    <hr>
      <h3>Numbers of Postgraduate :</h3>
    <p>Catholic Students: {{ $catholicCountPost }}</p>
    <p>Non-Catholic Students: {{ $nonCatholicCountPost }}</p>
    <p>Muslim Students: {{ $muslimCountPost }}</p>
    <p>Other Religions: {{ $otherReligionCountPost }}</p>

    <Hr>
    <p> 2013/2014 Undergraute Students: {{ $undergratedCount6 }}</p>
</div>

/*
<div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">{{ $graduatedCount }}</span></span>
                        <p>Graduated Students</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">{{ $undergraduateCount }}</span></span>
                        <p>Undergraduate Students</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">{{ $postgraduateCount }}</span></span>
                        <p>Postgraduate Students</p>
                    </div> <!-- singel counter -->
                </div>

            </div>

             <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">{{ $maleCount }}</span></span>
                        <p>Male Students</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">{{ $femaleCount }}</span></span>
                        <p>Female Students</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">{{ $postgraduateCount }}</span></span>
                        <p>Postgraduate Students</p>
                    </div> <!-- singel counter -->
                </div>

            </div> <!-- row -->
        </div> <!-- container --> */
    </div>



                </div>
            </div>
        </section>
    </div>




@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>


    <script>
        // Function to show the modal on page load
        // function showModalOnLoad() {
        //     $('#reloadModal').modal('show');
        //   }

        // Call the function when the page is ready
        // $(document).ready(function () {
        //      showModalOnLoad();
        // });
    </script>
@endsection
