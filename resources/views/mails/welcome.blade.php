@component('mail::message')
<p align='center'> <img src="{{ asset('img/logs.png') }}" width='1000' height='100' border='0' /></p>

 {{ $emailData['title'] }}

<h4>Dear {{ $emailData['surname'] }}</h4>
 {{ $emailData['msg'] }}
 <br><br>
 <center> <strong>{{ $emailData['name_no'] }} {{ $emailData['identity_no'] }}  </strong>  </center>
<br>
<center> <strong> LOGIN DETAILS </strong> </center>
<center> <strong> MatricNo.: </strong> {{ $emailData['identity_no'] }}  </center>

<center> <strong> PASSWORD: </strong> {{ $emailData['password'] }} </center>


@component('mail::button', ['url' => $emailData['url']])
Click to Login your account
@endcomponent
{{ $emailData['note'] }}
<br>Thank you.<br>
 {{--  <p align='left'> <img src="{{ asset('img/icthead2.png') }}" width='100' height='60' border='0' /></p>

  <strong>Mr. Calistus C. Chimezie</strong>
  <br>(Supervising Head, ICT UNIT)
   --}}
   <strong>Institute of Consecrated Life in Africa (InCLA)</strong>

 {{--  {{ config('app.name') }}  --}}
@endcomponent
