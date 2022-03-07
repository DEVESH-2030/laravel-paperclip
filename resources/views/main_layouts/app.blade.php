<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('main_layouts.head')

    <body>
        <ul class="circles">
            <li></li>
        </ul>
        @include('main_layouts.sections')
    </body>

    @include('main_layouts.js')
    @yield('after-js')
</html>
