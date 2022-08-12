@component('mail::message')
# Introduction

<h1>using laravel built in event</h1>
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
