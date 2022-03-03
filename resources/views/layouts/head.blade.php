    <head>

        <meta charset="utf-8">
        <title>{{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{ asset('html-css/images/favicon.png') }}" />

        @include('layouts.css')
        
    </head>
