@component('mail::message')
 {{--  {{ $emailData['title'] }}  --}}
<p align='center'> <img src="{{ asset('img/letter_logo.png') }}" width='70' height='70' border='0' /></p>

Hello: Sir/ Madem <br>

This is  {{ $emailData['surname'] }} i am applying for admission at Veritas Univeristy School of Postgraduate.
<br> <br>i kindly request for you to be one of my referee. <br><br>
If my request is acceptanced please kindly fill the form.


@component('mail::button', ['url' => $emailData['url']])
Click to Fill The Form
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
