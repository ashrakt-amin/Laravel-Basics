@component('mail::message')
# Introduction

hi {{$user->name}}.

@component('mail::button', ['url' => 'www.google.com'])
go
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
