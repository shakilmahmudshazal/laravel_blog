@component('mail::message')
# Introduction

The body of your message.
hi,
this is me again.
lets rock again
@component('mail::button', ['url' => 'http://facebook.com'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
