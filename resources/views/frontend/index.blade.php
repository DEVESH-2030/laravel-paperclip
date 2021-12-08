<html>
   <head>
     <title>DevLearn | Frontend</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://code.jquery.com/jquery.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
     <!-- CSS Code -->
     <style>
         /*@import "https://fonts.googleapis.com/css?family=Roboto:300,400,500,700";*/
        body{
            background-color: rgb(255, 255, 255);
        }

        .mt100 {
            margin-top: 100px;
        }

        .image-holder{
            height: 200px;
        }


        /*Body of the Panel when it expands*/
        .panel .panel-body {
            position: relative;
            padding: 0 !important;
            overflow: hidden;
            height: auto;
        }

        /*Image size and transition*/
        .panel .panel-body a img {
            display: block;
            margin: 0;
            width: 100%;
            height: 150px;
            transition: all 0.5s;
            -moz-transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -o-transition: all 0.5s;
        }

        /*Transform scale effect when you hover over*/
        .panel .panel-body a.zoom:hover img {
            transform: scale(1.3);
            -ms-transform: scale(1.3);
            -webkit-transform: scale(1.3);
            -o-transform: scale(1.3);
            -moz-transform: scale(1.3);
        }

        /*Zoom Button*/
        .panel .panel-body a.zoom span.overlay {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            height: 100%;
            width: 100%;
            background-color: #000;
            opacity: 0;
            transition: opacity .25s ease-out;
            -moz-transition: opacity .25s ease-out;
            -webkit-transition: opacity .25s ease-out;
            -o-transition: opacity .25s ease-out;
        }

        /*Zoom Button and Tint Overlay*/
        .panel .panel-body a.zoom:hover span.overlay {
            display: block;
            visibility: visible;
            opacity: 0.55;
            -moz-opacity: 0.55;
            -webkit-opacity: 0.55;
            filter: alpha(opacity=65);
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=65)";
        }

        /*Zoom Button*/
        .panel .panel-body a.zoom:hover span.overlay i {
            position: absolute;
            top: 45%;
            left: 0%;
            width: 100%;
            font-size: 2.25em;
            color: #fff !important;
            text-align: center;
            opacity: 1;
            -moz-opacity: 1;
            -webkit-opacity: 1;
            filter: alpha(opacity=1);
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=1)";
        }
        #lightbox .modal-content {
            display: inline-block;
            text-align: center;
        }
        </style>
    </head>
<body>

    <div class="container mt100">
        <h3>Show All Images</h3>
        <section class="row">
            @forelse ($getAllImages as $getImage)
                <div class="col-lg-3 col-sm-4 col-xs-6 image-holder">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="#" class="zoom" data-toggle="modal" data-target="#lightbox">
                                <img src="{{ url('/storage/' . $getImage->image)  }}" alt="...">
                                <span class="overlay"><i class="glyphicon glyphicon-fullscreen"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <span> No images available </span>
            @endforelse
            {{-- <div class="col-lg-3 col-sm-4 col-xs-6 image-holder">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <a href="#" class="zoom" data-toggle="modal" data-target="#lightbox">
                        <img src="https://raw.githubusercontent.com/yuliya5/image-modal-responsive/master/images/mountains2.jpg" alt="...">
                            <span class="overlay"><i class="glyphicon glyphicon-fullscreen"></i></span>
                        </a>
                    </div>
                </div>
            </div> --}}
            
            <!-- Modal -->
      <div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Image</h4>
        </div>
            <div class="modal-body">
                <img src="" alt="" />
            </div>
        </div>
    </div>
</div>
        </section> <!-- closing section -->
    </div> <!-- closing div container -->
</body>
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