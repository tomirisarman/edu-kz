@component('mail::message')
# Форма регистрации с EDU.KZ

@foreach($email_data as $data)
    {{ htmlspecialchars_decode($data)}}
@endforeach

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

С уважением,<br>
{{ config('app.name') }}
@endcomponent
