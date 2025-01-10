@extends('layouts.student')

@section('pagetitle')Network Manager @endsection

@section('css')
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="{{ asset('dist/css/components/bootstrap-datepicker.css')}}" />
@endsection

<!-- Sidebar Links -->

<!-- Treeview -->
@section('soteria-open') menu-open @endsection

@section('soteria') active @endsection

<!-- Page -->
 @section('soteria-add') active @endsection

 <!-- End Sidebar links -->





@section('content')

 <section class="content">
    <div class="container-fluid">
        <!-- left column -->
        <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
           Voucher Code
        </h1>
        <!-- Include flash messages -->
        @include('partialsv3.flash')

        <!-- Display pin with additional styling -->
        <div style="font-size: 24px; font-weight: bold; text-align: center; padding: 20px;">
            {{ $viewV->pin }}
        </div>

        <!-- Validity information -->
        <p style="text-align: center; font-size: 16px; color: #666;">
            This voucher is valid for 2 weeks from the date of issuance.
        </p>
    </div>
</section>

@section('pagescript')

	<!-- External JavaScripts
	============================================= -->
	<script src="{{ asset('js/jquery.js')}}"></script>

	<!-- bootstrap datepicker -->
	<script src="{{ asset('dist/js/components/bootstrap-datepicker.js')}}"></script>

	<script type="text/javascript">
		//Date picker
		$('#av_expire').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true,
			startDate: '+60d'
		})
	</script>
@endsection
