@extends('layouts.mini')



@section('pagetitle') Remita Payment  @endsection

@section('css')
<!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{asset('v3/plugins/ekko-lightbox/ekko-lightbox.css')}}">
@endsection


<!-- Sidebar Links -->

<!-- Treeview -->
@section('bursary-open') menu-open @endsection

@section('bursary') active @endsection

<!-- Page -->
 @section('remita-search') active @endsection

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
                      Applicant  {{ $remita->rrr }} Remita Details
                    </h1>

            <div class="card ">


             <div class="table-responsive card-body">

             @include('partialsv3.flash')
                   @if (session('approvalMsg'))
                            {!! session('approvalMsg') !!}
                            @endif

						<table class="table table-striped">
						  <tr>

							  <th> Name</th>
							  <th>Phone</th>
                              <th>Service Type</th>
							   <th>Amount</th>
							   <th>RRR</th>
							   <th>Generated On</th>
                               <th>Staus</th>
                                <th>Action</th>

						  </tr>
                            <tr>

                                <td>{{$users->first_name ?? null}}  {{$users->surname ?? null}}</td>
                                <td>{{$users->phone ?? null}}</td>
                                <td>{{$feeType->name ?? null}}</td>
                                <td>N{{$remita->amount ?? null}}</td>
                                <td>{{$remita->rrr}}</td>
                                <td>{{$remita->created_at->format('d-M-Y')}}</td>
                                 <td>{{$remita->status}}</td>

                            @if($remita->status_code == 25)
                            <td> <form method="POST" action="/bursary/remita/verifypayment">
                                                            @csrf
                                                            <input type="hidden" value="{{ $remita->rrr }}"
                                                                placeholder="{{ $remita->rrr }}" name="rrr">
                                                            <button class="btn btn-primary border mt-2">Verify
                                                                Payment</button>
                                                        </form></td>
                            @endif
                            </tr>
                            @if($remita->status_code == 01)
                            <tr>
                                <th>Payment Date</th>
                                <th>Bank</th>
                                <th>Bank Branch</th>
                                <th>Updated On</th>
                                <th>Channel</th>
                                <th>Ip Address</th>
                                <th>Action</td>
                                  <th>Verify_by</th>
                            </tr>
                            <tr>
                                <td>{{$remita->transaction_date}}</td>
                                <td>{{$remita->bankName($remita->bank_code) }}</td>
                                <td>{{$remita->branch_code}}</td>
                                <td>{{$remita->updated_at->format('d-M-Y')}}</td>
                                <td>{{$remita->channel}}</td>
                                <td>{{$remita->request_ip}}</td>

                                <td> <a class="btn btn-info" target="_blank" href="{{route("remita.print-rrr",$remita->id)}}" ><i class="fas fa-print text-white-50"></i> Print Receipt </a></td>
                                  <td>{{ $staff->full_name ?? null }}</td>
                            </tr>
                            @endif

						</table>


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

<script src="{{asset('js/bootbox.min.js')}}"></script>

 <script>



        	function confirm(id)
        	{
             bootbox.dialog({
                message: "<h4>You are about to confirm a payment</h4> <h5>Note: Are you sure? </h5>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("confirmForm"+id).submit();
                        	}
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                        }
                },
                callback: function (result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }



	</script>

<!-- jQuery UI -->
<script src="{{asset('v3/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Ekko Lightbox -->
<script src="{{asset('v3/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>

 <script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>


@endsection

