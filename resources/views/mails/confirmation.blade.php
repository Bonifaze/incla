@component('mail::message')
{{--  <p align='center'> <img src="{{ asset('img/letter_logo.png') }}" width='70' height='70' border='0' /></p>  --}}
<p align='center'> <img src="{{ asset('img/veritasin.jpg') }}" width='1000' height='100' border='0' /></p>


 {{ $emailData['title'] }}

Hello: {{ $emailData['surname'] }}
# {{ $emailData['msg'] }}


@component('mail::button', ['url' => $emailData['url']])
Click to activate your account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
