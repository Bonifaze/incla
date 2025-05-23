@extends('layouts.mini')



@section('pagetitle') List of Students  @endsection

@section('css')
<!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{asset('v3/plugins/ekko-lightbox/ekko-lightbox.css')}}">
@endsection


<!-- Sidebar Links -->

<!-- Treeview -->
@section('bursary-open') menu-open @endsection

@section('bursary') active @endsection

<!-- Page -->
 @section('bursary-search') active @endsection

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
                <h3 class="card-title">List of Students</h3>
				</div>

             <div class="table-responsive card-body">

             @include('partialsv3.flash')

						<table class="table table-striped">
						  <thead>

							  <th>#</th>
							  <th>Name</th>
							  <th>Phone</th>
                              <th>Matric</th>
                              <th>Contact Name</th>
                              <th>Contact Phone</th>
							   <th>Debt</th>

						  </thead>


						  <tbody>
						    @foreach ($students as $key => $student)
							<tr>
							  <td>{{ $key + 1 }}</td>
							  <td>{{ $student->fullName }}</td>
							   <td>{{ $student->phone }}</td>
							   <td>{{ $student->academic->mat_no }}</td>
							   <td>{{ $student->contact->name }}</td>
							   <td>{{ $student->contact->phones }}</td>
							   @if(isset($student->debt))
                                <td> &#8358;{{ number_format($student->debt->debt) }}</td>
                                @else
                                <td>  </td>
                                @endif


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

