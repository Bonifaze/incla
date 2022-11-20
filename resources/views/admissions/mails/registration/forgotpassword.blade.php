@component('mail::message')
 {{ $emailData['title'] }}

Hello: {{ $emailData['surname'] }}
# {{ $emailData['msg'] }}


@component('mail::button', ['url' => $emailData['url']])
Click to Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
