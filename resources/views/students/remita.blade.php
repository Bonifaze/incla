@extends('layouts.student')



@section('pagetitle') Remita Payments  @endsection



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


            <div class="card ">
              <div class="card-header">
                <h3 class="card-title"> Remita Payments</h3>
				</div>

             <div class="table-responsive">

				 @include('partialsv3.flash')

                   @if ($update = Session::get('update'))

                     <div style="color:#090; font-weight:bolder;"> {!! $update !!}</div>

                 @endif

             </div>

                <div class="table-responsive">
                   <h1>
                    <a class="btn btn-info" href="{{route("student.remita-generate")}}" > Generate New Remita Reference </a>
                    </h1>

                        <h1> Current debt: </h1>
                    <h1> Payment: </h1>

                    <div class="card-body">
                        <div class="box-body">

                           <div class="row" style="font-weight: bold">
                                 <div class="col-md-3 form-group">
                                        Remita RRR
                                 </div>
                               <div class="col-md-2 form-group">
                                   Amount
                               </div>
                               <div class="col-md-2 form-group">
                                   Status
                               </div>
                               <div class="col-md-2 form-group">
                                   Description
                               </div>
                               <div class="col-md-1 form-group">
                                   Action
                               </div>
                               <div class="col-md-2 form-group">
                                   Payment
                               </div>
                           </div>
                           @foreach ($remitas as $key => $remita)
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        {{ $remita->rrr }}
                                    </div>
                                    <div class="col-md-2 form-group">
                                        &#8358;{{ number_format($remita->amount) }}
                                    </div>
                                    <div class="col-md-2 form-group">
                                        {{ $remita->status }}
                                    </div>
                                    <div class="col-md-2 form-group">
                                        {{ $remita->feeType->name }}
                                    </div>

                                    @if($remita->status_code !== 1)
                                    <div class="col-md-1 form-group">
                                        {!! Form::open(['method' => 'Post', 'url' => config('app.REMITA_DOMAIN').'/remita/ecomm/finalize.reg', 'id'=>'payForm'.$remita->id]) !!}
                                        {{ Form::hidden('rrr', $remita->rrr) }}
                                        {{ Form::hidden('hash', hash('sha512',config('app.REMITA_MERCHANT_ID').$remita->rrr.config('app.REMITA_API_KEY'))) }}
                                        {{ Form::hidden('merchantId', config('app.REMITA_MERCHANT_ID')) }}
                                        {{ Form::hidden('responseurl', "https://ecampus.veritas.edu.ng/students/remita/response") }}
                                        <button onclick="pay({{$remita->id}})" type="button" class="{{$remita->id}} btn btn-success" > Pay </button>
                                        {!! Form::close() !!}

                                    </div>
                                    <!--
                                    <div class="col-md-2 form-group">
                                        {!! Form::open(['method' => 'Post', 'route' => 'student.remita-verify', 'id'=>'verifyRemita'.$remita->id]) !!}
                                        {{ Form::hidden('remita_id', $remita->id) }}
                                        <button type="submit" class="{{$remita->id}} btn btn-outline-warning" > Verify Payment</button>
                                        {!! Form::close() !!}
                                    </div>
                                    -->
                                    @elseif($remita->status_code == 1)
                                        <div class="col-md-1 form-group">
                                            <a class="btn btn-info" target="_blank" href="{{route("student.remita-print",$remita->id)}}" > Print Receipt </a>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            Payment Received
                                        </div>
                                    @endif
                                </div>
                            @endforeach
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
<script src="<?php echo asset('dist/js/bootbox.min.js')?>"></script>

    <script>

        function pay(id)
        {
            document.getElementById("payForm"+id).submit();
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }


    </script>

    @endsection

