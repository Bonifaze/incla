@extends('layouts.mini')



@section('pagetitle')
    List of Students
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
@section('list-students')
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
                        list of students
                    </h1>

                    <div class="card">


                        <div class="table-responsive card-body">

                            @include('partialsv3.flash')

                            <table class="table table-striped">
                                <thead>

                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Bank</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Details</th>
                                    <th>Action</th>







                                </thead>


                                <tbody>
                                    @foreach ($students as $key => $student)
                                        @php $payments = $student->payments; @endphp

                                        @foreach ($payments as $key => $payment)
                                            <tr>
                                                <td>{{ $loop->parent->index }}</td>
                                                <td>{{ $payment->student->fullName }}</td>
                                                <td>{{ $payment->student->phone }}</td>
                                                <td>{{ $payment->channel->name }}</td>
                                                <td>{{ $payment->date }}</td>
                                                <td> &#8358;{{ number_format($payment->amount) }}</td>
                                                <td>
                                                    <div class="col-md-3">
                                                        <a href="data:image/png;base64,{{ $payment->evidence }}"
                                                            data-toggle="lightbox" data-title="Payment Evidence">
                                                            <img src="data:image/png;base64,{{ $payment->evidence }}"
                                                                class="img elevation-2" alt="Payment Evidence"
                                                                width="80px">
                                                        </a>
                                                    </div>
                                                </td>

                                                @if ($payment->status == 1)
                                                    <td>
                                                        {!! Form::open(['method' => 'Patch', 'route' => 'bursary.confirm', 'id' => 'confirmForm' . $payment->id]) !!}
                                                        {{ Form::hidden('id', $payment->id) }}
                                                        {{ Form::hidden('status', 2) }}


                                                        <button onclick="confirm({{ $payment->id }})" type="button"
                                                            class="{{ $payment->id }} btn btn-success"> Confirm Payment
                                                        </button>

                                                        {!! Form::close() !!}



                                                    </td>
                                                @elseif ($payment->status == 2)
                                                    <td>
                                                        <strong> Payment Confirmed </strong>
                                                    </td>
                                                @endif


                                            </tr>
                                        @endforeach
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
