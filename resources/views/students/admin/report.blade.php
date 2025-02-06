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

    <hr>
    <h3>Numbers of Undergrauate :</h3>
    <p>Male Students: {{ $maleCount }}</p>
    <p>Female Students: {{ $femaleCount }}</p>
    <hr>




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
