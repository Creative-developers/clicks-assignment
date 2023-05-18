@component('mail::message')
#  Hello,  {{ $click->client->name }}

You receive a click of {{ $click->click_number }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent