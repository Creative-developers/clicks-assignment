@component('mail::message')
#  Welcome, {{ $client->name }}

Welcome to the App. Please click the button below to access our client listings.

@component('mail::button', ['url' => env('APP_URL')])
View Listings
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent