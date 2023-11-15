@extends('layouts.mini')



@section('pagetitle')
    Remita Payment
@endsection

@section('css')
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{ asset('v3/plugins/ekko-lightbox/ekko-lightbox.css') }}">
@endsection


<!-- Sidebar Links -->

<!-- Treeview -->
@section('bursary-open')
    menu-open
@endsection

@section('bursary')
    active
@endsection

<!-- Page -->
@section('remita-list')
    active
@endsection

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
                        {{--  {{ $academic->student->full_name}} ({{ $academic->mat_no}})  --}}
                        <br><br>
                        @isset($sum)
                            {{ 'Total: N' . number_format($sum) }}
                        @else
                            Remita Details
                        @endisset
                    </h1>



                    <div class="table-responsive card-body">

                        @include('partialsv3.flash')

                        <table class="table table-striped">
                            <thead>

                                <th>S/N</th>
                                <th>RRR</th>
                                <th>Student Name</th>
                                <th>Matric Number</th>
                                <th>Service Type</th>
                                <th>Amount</th>
                                <th>Generated</th>
                                <th>Action</th>
                            </thead>
                            <tbody class="">
                                @foreach ($remitas as $key => $remita)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $remita->rrr }}</td>
                                        <td>{{ $remita->student->fullname ?? null }}</td>
                                        <td>{{ $remita->student->academic->mat_no ?? null }}</td>
                                        <td>{{ $remita->feeType->name ?? null }}</td>
                                        <td>&#8358;{{ number_format($remita->amount) }}</td>
                                        <td>{{ $remita->created_at->format('d-M-Y') }}</td>
                                        <td>
                                            @if ($remita->status_code == 1)
                                                <a class="btn btn-info" target="_blank"
                                                    href="{{ route('remita.print-rrr', $remita->id) }}"><i
                                                        class="fas fa-print text-white-50"></i> Print Receipt </a>
                                            @else
                                                {{ $remita->status }}
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach

                                </tr>
                                <thead></thead>
                                <tr>
                                    <th colspan="3">School Fees</th>
                                    <th colspan="2">School Fee paid</th>
                                    <th colspan="2">School Fees Debt</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                </thead>
                            <tbody class="">
                                <tr>
                                   {{--     <td colspan="3">
                                        @if ($balance === '<i class="fas fa-spinner fa-spin"></i>')
                                            <i class="fa fa-spinner fa-spin"></i>
                                        @else
                                            &#8358;{{ number_format($totalAmountPaid + (int) $balance, 2) }}
                                        @endif
                                    </td>
                                    <td colspan="2" class=" text-success">₦{!! $totalAmountPaid != 0 ? $totalAmountPaid : html_entity_decode('<i class="fa fa-spinner fa-spin"></i>') !!}</td>
                                    <td colspan="2" class="text-bold  text-success">₦{!! html_entity_decode($balance) !!}</td>
                                    <td>
                                        <a class="btn btn-info edit-button" data-toggle="modal" data-target="#editModal">
                                            <i class="fas fa-edit text-white-50"></i> Edit
                                        </a>
                                    </td> --}}

                                </tr>
                            </tbody>
                        </table>


                    </div>
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Debt Entry</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="editDebtForm" action="{{ route('remita.update-debt') }}" method="POST">
                                        @csrf
                                        <!-- Form inputs for editing debt and amount paid -->
                                        <input type="hidden" name="student_id" value="{{ $remita->student->id }}">
                                        <input type="hidden" name="staff_id" value="{{ auth()->user()->id }}">
                                        <div class="form-group">
                                            <label for="debt">Debt:</label>
                                              {{--  <input type="text" class="form-control" id="debt" name="debt"
                                                value="{{ $balance }}">
                                            <input type="hidden" class="form-control" id="debt" name="old_debt"
                                                value="{{ $balance }}"> --}}
                                        </div>
                                        <div class="form-group">
                                            <label for="amountPaid">Amount Paid:</label>
                                               {{-- <input type="text" class="form-control" id="amountPaid" name="amount_paid"
                                                value="{{ $totalAmountPaid }}">
                                            <input type="hidden" class="form-control" id="amountPaid"
                                                name="old_amount_paid" value="{{ $totalAmountPaid / 2 }}"> --}}
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" id="saveChangesButton">Save
                                        Changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                                                    <div class="dropdown no-arrow  btn btn-sm shadow-sm">

                                        <a href="{{ route('remita.find-studentdebt', $remita->student->id) }}}"
                                            class="nav-link @yield('results')">
                                            <i class="fa fa-eye nav-icon"></i>Show Payment History
                                        </a>
                                    </div>

                                    <div><a class="btn btn-warning" target="_blank"
                                                        href="{{ route('remita.find-studentunpaidrrr', $remita->student->id) }}"> <i
                                                            class="fa fa-eye"></i> Unpaid RRR </a>
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
    <script src="{{ asset('js/bootbox.min.js') }}"></script>

    <script>
        function confirm(id) {
            bootbox.dialog({
                message: "<h4>You are about to confirm a payment</h4> <h5>Note: Are you sure? </h5>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("confirmForm" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }
    </script>

    <!-- jQuery UI -->
    <script src="{{ asset('v3/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Ekko Lightbox -->
    <script src="{{ asset('v3/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
@endsection
