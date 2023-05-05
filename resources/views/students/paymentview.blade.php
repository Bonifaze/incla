@extends('layouts.student')



@section('pagetitle')
    Home
@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('student-open')
    menu-open
@endsection

@section('student')
    active
@endsection

<!-- Page -->
@section('home')
    active
@endsection

<!-- End Sidebar links -->


@section('content')
    <div class="content-wrapper bg-white">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        View Remita Reciept
                    </h1>




                    <div id="content">
                        <!DOCTYPE html>
                        <html lang="en">

                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <title>Document</title>
                            <!-- CSS only -->
                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
                                rel="stylesheet"
                                integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
                                crossorigin="anonymous">

                        </head>

                        <body>
                            <div class="container p-4">
                                @include('partialsv3.flash')
                                <div class="table-responsive">
                                    <table class="table table-hover shadow m-1 mb-5">

                                        <thead></thead>
                                            <tr>
                                                <th scope="col">S/N</th>
                                                <th scope="col">RRR</th>
                                                <th colspan="2">Action</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Date</th>
                                                {{--  <th scope="col">Payment</th>  --}}
                                                {{--  <th scope="col">Action</th>  --}}
                                                {{--  <th scope="col">Verify</th>  --}}

                                            </tr>
                                        </thead>
                                        <tbody class="">
                                        @php
$totalPaid = 0;
$paidRRNs = [];
@endphp
                                            @foreach ($viewpayment as $key => $utm)
                                                <tr></tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $utm->rrr }}</td>
                                                <td>{!! $utm->status_code == '01'
                                                    ? '<a href="/students/receipt/' .
                                                        $utm->rrr .
                                                        '" button class="btn btn-success "><i class="fas fa-print text-white-50"></i> Print Receipt</a>'
                                                    : '
                                                         <form onsubmit="makePayment()" id="payment-form">
                                                       <div class="btn btn-success px-3"> <i class="fas fa-credit-card text-white-50"></i>
                                                      <input type="hidden" class="form-control" id="js-rrr" value="' .
                                                        $utm->rrr .
                                                        '" name="rrr" />
                                                         <input type="button" onclick="makePayment(' .
                                                        $utm->rrr .
                                                        ')" value="Pay" button class="btn btn-success"/>
                                                 </div>
                                                 </form>' !!}
                                                 </td>
                                                  @if ($utm->status_code == '01')
                                                    <td class="text-bold"> PAID </td>
                                                     @php
            $totalPaid += $utm->amount;
            array_push($paidRRNs, $utm->rrr);
            @endphp
                                                @else

                                                <td>
                                                    {!! Form::open(['method' => 'Post', 'route' => 'student.remita-verify', 'id' => 'verifyRemita' . $utm->id]) !!}
                                                    {{ Form::hidden('remita_id', $utm->id) }}
                                                    <button type="submit"
                                                        class=" {{ $utm->id }} btn btn-primary ">
                                                        NOT PAID
                                                        Verify</button>
                                                    {!! Form::close() !!}
                                                </td>
                                                @endif
                                                <td>&#8358;{{ number_format($utm->amount, 2) }}</td>
                                                <td>{{ $utm->status }}</td>
                                                <td>{{ $utm->fee_type }}</td>
                                                <td>{{ \Carbon\Carbon::parse($utm->created_at)->format('d/m/Y') }}</td>
                                                {{--  <td>{{ $utm->status_code == '01' ? 'PAID' : 'NOT PAID' }}  --}}
                                                </td>


                                            @endforeach
                                            </tr>
<tr>
    <td colspan="4" class="text-right text-bold">Total Paid Amount:</td>
    <td class="text-bold">&#8358;{{ number_format($totalPaid, 2) }}</td>
    {{--  <td>RRNs: {{ implode(', ', $paidRRNs) }}</td>  --}}
</tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>




                            <!-- JavaScript Bundle with Popper -->
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
                                integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
                            </script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/http-client/4.3.1/http-client.min.js"></script>
                            <script></script>

                        </body>

                        </html>
                    </div>





                </div>
            </div>

    </div>
    </section>
    </div>
    </div>
@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
      // Iterate through all buttons with class name 'check-payment-status-btn' and trigger click event for each button
      $('.check-payment-status-btn').each(function() {
         var button = $(this);
         button.trigger('click');
         setTimeout(function() {
            button.off('click'); // Disable the click event after 30 seconds
         }, 30000); // 30 seconds
      });
   });
</script>





@endsection
