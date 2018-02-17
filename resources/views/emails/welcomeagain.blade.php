@component('mail::message')
# Introduction

The body of your message.

- 1
- 2
- 3
<h1>Mher</h1>
@component('mail::button', ['url' => 'https://laravel.com/'])
Go To Laravel.com
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
