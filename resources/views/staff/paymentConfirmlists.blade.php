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
        <!-- Main content -->

    @section('content')
        <div class="content-wrapper bg-white">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <!-- left column -->
                    <div class="col_full">
                        <h1
                            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                            APPROVED STUDENTS PAYMENT
                        </h1>
            @include('partialsv3.flash')
                        <div class="card shadow border border-success">
                            <div class="row">
                                <!-- Area Chart -->
                                <div class="col-xl-12 col-lg-12">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">

                                        </div>
                                        <div class="card-body">



                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>RRR</th>
                                                            <th>Student Name</th>
                                                            <th>Matric No.</th>
                                                            {{--  <th>Email</th>  --}}
                                                            <th colspan="2">Applicant Name</th>
                                                            {{--  <th>Email</th>  --}}
                                                            <th>Amount(₦)</th>
                                                            <th>Payment Description</th>
                                                            <th>Approved Date</th>
                                                           {{--  <th>Staff</th> --}}
                                                            {{--  <th>Action</th>  --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($paidRRRs as $payment)
                                                            <tr>
                                                                <td>{{ $payment->rrr }}</td>
                                                                <td class="text-uppercase">
                                                                    {{ $payment->student->fullname ?? '' }}</td>
                                                                <td>{{ $payment->student->academic->mat_no ?? ' ' }}</td>
                                                                {{--  <td>{{ $payment->student->email ?? ''}}</td>  --}}
                                                                <td colspan="2" class="text-uppercase">
                                                                    {{ $payment->users->surname ?? ' ' }}
                                                                    {{ $payment->users->first_name ?? ' ' }}</td>
                                                                {{--  <td>{{ $payment->users->email ?? ''}}</td>  --}}
                                                                {{--  <td>{{ $payment->students->email}}</td>  --}}
                                                                <td> &#8358;{{ number_format($payment->amount) }}</td>
                                                                <td>{{ $payment->fee_type }}</td>
                                                                <td>{{ $payment->updated_at }}</td>
                                                         {{--  <td>{{ $payment->authenticate_by }}</td>  --}}                                                             {{--  <td>{{ $payment->authenticate_by }}</td>  --}}

                                                                                                                           </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="align-items-center align-content-center">
                                                    {{ $paidRRRs->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Payment Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="modalMessage"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection


</div>
@endsection

@section('pagescript')
<script>
    @if (isset($message))
        $(document).ready(function() {
            $('#modalMessage').text("{{ $message }}");
            $('#myModal').modal('show');
        });
    @endif

    // Add this script to handle the button click
    $(document).on('click', '#approveButton', function(e) {
        e.preventDefault(); // Prevent the form from submitting
        var form = $(this).closest('form'); // Find the parent form
        var action = form.attr('action'); // Get the form's action attribute

        // Perform an AJAX request to approve the payment
        $.ajax({
            type: 'POST',
            url: action,
            data: form.serialize(),
            success: function(response) {
                // Update the modal message with the response
                $('#modalMessage').text(response.message);
                $('#myModal').modal('show');
            },
            error: function(error) {
                // Handle any errors here
                console.error(error);
            }
        });
    });
</script>
<script src="{{ asset('dist/js/bootbox.min.js') }}"></script>
@endsection
