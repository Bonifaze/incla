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


            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ $remita->rrr }} Remita Details</h3>
				</div>

             <div class="table-responsive card-body">

             @include('partialsv3.flash')

						<table class="table table-striped">
						  <tr>
							  <td>Student Name</td>
							  <td>Matric Number</td>
                              <td>Service Type</td>
							   <td>Amount</td>
							   <td>RRR</td>
							   <td>Generated On</td>
						  </tr>
                            <tr>
                                {{--  <td>{{$student->fullname}}</td>
                                <td>{{$academic->mat_no}}</td>
                                <td>{{$feeType->name}}</td>
                                <td>N{{$remita->amount}}</td>
                                <td>{{$remita->rrr}}</td>
                                <td>{{$remita->created_at->format('d-M-Y')}}</td>  --}}
                            </tr>
                            {{--  @if($remita->status_code == 1)  --}}
                            <tr>
                                <td>Payment Date</td>
                                <td>Bank</td>
                                <td>Bank Branch</td>
                                <td>Updated On</td>
                                <td>Channel</td>
                                <td>Action</td>
                            </tr>
                            <tr>
                                {{--  <td>{{$remita->transaction_date}}</td>
                                <td>{{$remita->bankName($remita->bank_code) }}</td>
                                <td>{{$remita->branch_code}}</td>
                                <td>{{$remita->updated_at->format('d-M-Y')}}</td>
                                <td>{{$remita->channel}}</td>
                                <td> <a class="btn btn-info" target="_blank" href="{{route("remita.print-rrr",$remita->id)}}" > Print Receipt </a></td>  --}}
                            </tr>
                            {{--  @endif  --}}
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

