<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ url('/css/css-custom.css') }}"/>
        @toastr_css
    </head>
    <body>
        {{-- header  --}}
        @include('layout.header')

        {{-- container  --}}
        <div class="main">
        <div class="container">
            @yield('content')
            </div>
        </div>

        @include('layout.footer')
    </body>
    <script src="{{ url('/js/js-custom.js') }}"></script>
    <script src="{{ url('/js/popup-modal.js') }}"></script>
    <script src="{{ url('/js/user-register.js') }}"></script>
    <script src="{{ url('/js/filter-data-list.js') }}"></script>
    @jquery <br />
    @toastr_js <br />
    @toastr_render <br/>
</html>
