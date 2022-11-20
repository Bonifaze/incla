@extends('layouts.student')



@section('pagetitle') RRR Payment  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('fees-open') menu-open @endsection

@section('fees') active @endsection

<!-- Page -->
 @section('remita') active @endsection
 
 <!-- End Sidebar links -->



@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">
         
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Payment for {{$remita->rrr}}</h3>
				</div>

                <!-- form start -->
                @include('partialsv3.flash')

               <form action=”http://remitademo.net/remita/ecomm/finalize.reg” method="POST">
                   <input name="merchantId" value="1509328648353" type="hidden">
                   <input name="hash" value="ABCED12D3E1476DEFA12" type="hidden">
                   <input name="rrr" value="{{$remita->rrr}}" type="hidden">
                   <input name="responseurl" value="http://www.yourwebsite.com/response.php" type="hidden">
                   <input type ="submit" name="submit_btn" value="Pay Via Remita">
               </form>


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

