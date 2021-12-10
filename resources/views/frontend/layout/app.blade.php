<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <link rel="stylesheet" href="{{ url('/css/css-custom.css') }}"/>
        <link rel="stylesheet" href="{{ url('/css/image-show.css') }}"/>
        <title>Devlearn | Frontend</title>
        @toastr_css
    </head>
    <body>
        {{-- header  --}}
        @include('frontend.layout.header')

        {{-- container  --}}
            @yield('content')

        @include('frontend.layout.footer')
        @yield('after-scripts')
    </body>
    <script src="{{ url('/js/js-custom.js') }}"></script>
    <script src="{{ url('/js/popup-modal.js') }}"></script>
    <script src="{{ url('/js/user-register.js') }}"></script>
    <script src="{{ url('/js/filter-data-list.js') }}"></script>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

    @jquery
    @toastr_js 
    @toastr_render 

    <!-- Javascript for each modal containing a different pic. This code was written so that you don't have to write multiple modal divs -->
    <script>
        $(document).ready(function() {
            var $lightbox = $('#lightbox');
            $('[data-target="#lightbox"]').on('click', function(event) {
                var $img = $(this).find('img'), 
                    src = $img.attr('src'),
                    alt = $img.attr('alt'),
                    css = {
                        'maxWidth': $(window).width() - 100,
                        'maxHeight': $(window).height() - 100
                    };
                $lightbox.find('img').attr('src', src);
                $lightbox.find('img').attr('alt', alt);
                $lightbox.find('img').css(css);
            });
            $lightbox.on('shown.bs.modal', function (e) {
                var $img = $lightbox.find('img');
                $lightbox.find('.modal-dialog').css({'width': $img.width()});
                $lightbox.find('.close').removeClass('hidden');
            });
        });
    </script>

</html>
