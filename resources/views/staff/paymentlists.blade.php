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
                            STUDENTS PAYMENT Dashboard FOR bursary clearance
                        </h1>
            @include('partialsv3.flash')
                        <div class="card shadow border border-success">
                            <div class="row">
                                <!-- Area Chart -->
                                <div class="col-xl-12 col-lg-12">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
   <a class="btn btn-success"href="/staff/paymentConfirmlists">View all Approved RRR</a>
                                        </div>
                                        <div class="card-body">

                                            <div class="table-responsive">
                                                <div class="mb-3">
                                                    <form method="GET" action="{{ route('paymentlists') }}"
                                                        class="form-inline">
                                                        <div class="form-group mr-2">
                                                            <label for="searchField">Search:</label>
                                                            <input type="text" class="form-control" id="searchField"
                                                                name="search" value="{{ request('search') }}">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Search</button>
                                                    </form>
                                                </div>

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
                                                            <th>Date of Payment</th>
                                                            <th>Action</th>
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
                                                                <td>{{ $payment->transaction_date }}</td>
                                                                <td>
                                                                    <form action="/staff/remitasverification"
                                                                        enctype="multipart/form-data" method="post">
                                                                        @csrf

                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ $payment->user_id }}"
                                                                            class="form-control">
                                                                        <input type="hidden" name="student_id"
                                                                            value="{{ $payment->student_id }}"
                                                                            class="form-control">
                                                                        <input type="hidden" name="rrr"
                                                                            value="{{ $payment->rrr }}"
                                                                            class="form-control">
                                                                        <input type="hidden" name="amount"
                                                                            value="{{ $payment->amount }}"
                                                                            class="form-control">
                                                                        <input type="hidden" name="staff_id"
                                                                            value="{{ $staff->id }}"
                                                                            class="form-control">
                                                                        <input type="hidden" name="session_id"
                                                                            value="{{ $sessionBus->id }}"
                                                                            class="form-control">

                                                                        <input type="hidden" name="percentage"
                                                                            value="{{ $payment->feeType->percentage }}"
                                                                            class="form-control">


                                                                        <button type="submit"
                                                                            class="btn btn-success">Approve</button>

                                                                    </form>
                                                                    {{--  <form action="{{ route('approvePayment', ['id' => $payment->id]) }}" method="POST">  --}}
                                                                    {{--  @csrf  --}}
                                                                    {{--  <button type="submit" class="btn btn-success">Approve</button>  --}}
                                                                    {{--  <button type="submit" class="btn btn-success" id="approveButton">Approve</button>  --}}

                                                                    {{--  </form>  --}}

                                                                    {{--  @if ($payment->feeType->installment == 1)  --}}
                                                                    {{--  Display the button again for amount < 600000  --}}
                                                                    {{--  <form action="{{ route('approvePayment', $payment->id) }}" method="POST">  --}}
                                                                    {{--  @csrf
                                                                    <button type="submit" class="btn btn-success">Approve</button>  --}}
                                                                    {{--  </form>  --}}

                                                                    {{--  @elseif ($payment->feeType->installment == 2)  --}}
                                                                    {{--  <form action="{{ route('approvePayment', ['id' => $payment->id]) }}" method="POST">  --}}
                                                                    {{--  @csrf  --}}
                                                                    {{--  <button type="submit" class="btn btn-success">Approve 75% </button>
                                                                <br>
                                                                 <button type="submit" class="btn btn-success">Approve 50% </button>
                                                                 <br>
                                                                 <button type="submit" class="btn btn-success">Approve 25% </button>  --}}

                                                                    {{--  </form>  --}}


                                                                    {{--  @endif  --}}
                                                                </td>
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
