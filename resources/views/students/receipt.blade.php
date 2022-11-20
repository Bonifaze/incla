{{--  @php

if(!session('userid'))
{

  header('location: /');
  exit;
}
@endphp  --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--  Favicon   --}}
<link rel="shortcut icon" href="{{ asset('img/letter_logo.png') }}" >
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid m-1">

        <div class="d-inline-flex">

                    <img src="data:image/png;base64,{{ Auth::guard('student')->user()->passport }}"
                        class="card-img-top mb-2 mx-3" alt="User Image" style="width: 50px;">

            {{--  <img class="card-img-top mb-2 mx-3" src="data:image/{{$receipt -> passport_type}};base64,{{base64_encode($receipt -> passport)}}" alt="Applicant Image" style="height: 70px; width:70px;">  --}}
            <h3 class="text-nowrap mx-5">Remita Payment Receipt</>
        </div>

        <div class="mb-2">
            <div class="d-flex">
                <ul class="m-2">
                    <li><b>Name: </b> {{ $receipt->first_name." ".$receipt->middle_name." ".$receipt->surname}} </li>
                    <li><b>Phone: </b>{{ $receipt->phone}}</li>
                </ul>
                <ul class="m-2">
                    <li><b>Email: </b> {{ $receipt->email}}</li>
                    <li><b>Gender: </b>{{ $receipt->gender}}</li>
                    {{--  <li><b>Programme: </b></li>  --}}
                </ul>
            </div>
        </div>

        <table class="table table-bordered d-inline-flex p-2" cellspacing="0" width="60%">

            <tbody>
                <tr>
                    <td><b>RRR: </b>{{ $receipt->rrr}}</td>
                    <td><b>Service: </b>{{ $receipt->fee_type}}</td>
                    <td><b>Amount: </b>{{ $receipt->amount}} </td>
                    <td><b>Bank: </b> Unknown</td>

                </tr>
                <tr>
                    <td><b>Channel: </b>{{ $receipt->channel}} </td>
                    <td><b>Order: </b> {{ $receipt->order_ref}}</td>
                    <td><b>RRR Date: </b> {{ $receipt->created_at}}</td>
                    <td><b>Payment Date: </b> {{ $receipt->transaction_date}}</td>
                </tr>
            </tbody>
        </table>

    </div>
    <script>
      window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
