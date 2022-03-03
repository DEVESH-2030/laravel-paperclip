<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')

    <body>
        @include('layouts.sections')
    </body>

    @include('layouts.js')

</html>
