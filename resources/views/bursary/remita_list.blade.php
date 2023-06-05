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
                            <tr>
                                <td></td>
                                {{--  <td> <a class="btn btn-info" target="_blank"
                                        href="{{ route('remita.find-studentunpaidrrr', $academic->student_id) }}"><i
                                            class="fas fa-eye text-white-50"></i> Show Unpaid RRR </a>
                                </td>  --}}


                            </tr>
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
