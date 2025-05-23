@extends('layouts.mini')



@section('pagetitle') Student Fees  @endsection

@section('css')
<!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{asset('v3/plugins/ekko-lightbox/ekko-lightbox.css')}}">
@endsection


<!-- Sidebar Links -->

<!-- Treeview -->
@section('bursary-open') menu-open @endsection

@section('bursary') active @endsection

<!-- Page -->
 @section('remita-fees') active @endsection

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
                <h3 class="card-title">Student Fees</h3>
				</div>

             <div class="table-responsive card-body">

             @include('partialsv3.flash')

						<table class="table table-striped">
						  <thead>

							  <th>#</th>
							  <th>Name</th>
							  <th>Amount</th>
							   <th>Provider Code</th>
							   <th>Provider</th>
							   <th>Total</th>
							   <th>Action</th>







						  </thead>


						  <tbody>
						    @foreach ($feeTypes as $key => $fee)

						<tr>
							  <td>{{ $key+1 }}</td>
							  <td>{{ $fee->name }}</td>
                              <td> &#8358;{{ number_format($fee->amount) }}</td>
							   <td>{{ $fee->provider_code }}</td>
							   <td>{{ $fee->provider }}</td>
							   <td> &#8358;{{ number_format($fee->paidRemitas->sum('amount')) }}</td>
                               <td> <a class="btn btn-info" target="_blank" href="{{route("remita.fee-type",$fee->id)}}" > Show </a></td>

							</tr>

							@endforeach

						  </tbody>



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

