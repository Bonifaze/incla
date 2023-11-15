@extends('layouts.adminsials')



@section('pagetitle')
    Home
@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('student-open')
    menu-open
@endsection

@section('student')
    active
@endsection

<!-- Page -->
@section('home')
    active
@endsection

<!-- End Sidebar links -->



@section('content')
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->





  </div>

@endsection


@section('pagescript')
    <!-- External JavaScripts
             ============================================= -->


    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- bootstrap datepicker -->
    <script src="{{ asset('dist/js/components/bootstrap-datepicker.js') }}"></script>
    <!-- Bootstrap File Upload Plugin -->
    <script src="{{ asset('dist/js/components/bs-filestyle.js') }}"></script>

@endsection
