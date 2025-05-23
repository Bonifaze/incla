@extends('layouts.student')



@section('pagetitle') Fees @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('fees-open') menu-open @endsection

@section('fees') active @endsection

<!-- Page -->
 @section('debt') active @endsection

 <!-- End Sidebar links -->



@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">


            <div class="card ">
              <div class="card-header">
                <h3 class="card-title"> Outstanding Debt</h3>
				</div>

             <div class="table-responsive">

				 @include('partialsv3.flash')

				 <br />

				 <h3>
				 Outstanding fees as at 30 September 2020 : &#8358;0
				 </h3>


If the debt above is not correct, kindly call Bursary immediately.<br />
Call Bursary on 0803-703-7148 or 0803-473-3044.


					<br />
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
<script src="<?php echo asset('dist/js/bootbox.min.js')?>"></script>

    @endsection

