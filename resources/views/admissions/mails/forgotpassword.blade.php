<!DOCTYPE html>
<html>
<head>
    <title>Veritas Univeristy Abuja Admisssion Letter </title>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
 {{--  <h2 class="form-title text-success">Institute of Consecrated Life in Africa (InCLA)</h2>  --}}

@component('mail::message')

<p align='center'> <img src="{{ asset('img/letter_logo.png') }}" width='70' height='70' border='0' /></p>


 {{--  {{ $emailData['title'] }}  --}}

Hi: {{ $emailData['surname'] }}
# {{ $emailData['msg'] }}

There was a request to change your password!
<br><br>
                If you did not make this request then please ignore this emial.
<br><br>
                Otherwise Please Click this Button below to Reset your password:

@component('mail::button', ['url' => $emailData['url']])
Click to Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
</body>
</head>
</html>
