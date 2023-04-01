@component('mail::message')
<p align='center'> <img src="{{ asset('img/veritasin.jpg') }}" width='1000' height='100' border='0' /></p>

 {{ $emailData['title'] }}

<h4>{{ $emailData['surname'] }}</h4>
 {{ $emailData['msg'] }}
 <br><br>
 <center> <strong>{{ $emailData['name_no'] }} {{ $emailData['identity_no'] }}  </strong>  </center>
<br>
<center> <strong> LOGIN DETAILS </strong> </center>
<center> <strong> USERNAME: </strong> {{ $emailData['email'] }}  </center>

<center> <strong> PASSWORD: </strong> {{ $emailData['password'] }} </center>


@component('mail::button', ['url' => $emailData['url']])
Click to Login your account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
