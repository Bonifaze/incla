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
                            {{ $sum }}
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
                                {{--  <th>Student Name</th>
							  <th>Matric Number</th>  --}}
                                <th>Amout Paid</th>
                                <th>Debt</th>
                                <th>Date</th>

                                <th>Action</th>
                            </thead>
                            @foreach ($remitas as $key => $remita)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $remita->rrr }}</td>
                                    {{--  <td>{{$remita->student->fullname?? null}}</td>  --}}
                                    {{--  <td>{{$remita->student->academic->mat_no?? null}}</td>  --}}
                                    <td>&#8358;{{ number_format($remita->amount_paid) }}</td>
                                    <td>&#8358;{{ number_format($remita->debt) }}</td>
                                    <td>{{ $remita->created_at }}</td>

                                    <td>
                                        <a class="btn btn-info edit-button" data-toggle="modal" data-target="#editModal">
                                            <i class="fas fa-edit text-white-50"></i> Edit
                                        </a>
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
                                        <input type="hidden" name="student_id" value="{{ $remita->student_id }}">
                                        <input type="hidden" name="staff_id" value="{{ auth()->user()->id }}">
                                        <div class="form-group">
                                            <label for="debt">Debt:</label>
                                            <input type="text" class="form-control" id="debt" name="debt"
                                                value="{{$remita->debt}}">
                                            <input type="hidden" class="form-control" id="debt" name="old_debt"
                                                value="{{$remita->debt}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="amountPaid">Amount Paid:</label>
                                            <input type="text" class="form-control" id="amountPaid" name="amount_paid"
                                                value="{{$remita->amount_paid}}">
                                            <input type="hidden" class="form-control" id="amountPaid"
                                                name="old_amount_paid" value="{{$remita->amount_paid}}">
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
                                    </td>
                                    <td>
                                         {!! Form::open([
                                                            'method' => 'patch',
                                                            'action' => 'RemitaController@disable',
                                                            'id' => 'disableUForm' . $remita->id,
                                                        ]) !!}
                                                        {{ Form::hidden('id', $remita->id) }}
                                                        {{ Form::hidden('status', 0) }}
                                                        {{ Form::hidden('action', 'disabled') }}


                                                        <button type="submit" class="btn btn-danger"><span
                                                                class="icon-line2-trash"></span><i
                                                                class="fas fa-solid fa-trash"></i> Disable</button>
                                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach

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
