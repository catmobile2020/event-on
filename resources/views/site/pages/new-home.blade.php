<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <title>Home</title>
</head>
<body>
<style>
    body {
        margin: 0px;
        padding: 0px;
        overflow: hidden;
    }
    #myVideo {
        position: absolute;
        width: 100%;
        z-index: 1;
    }
    .button-video {
        width: 100%;
        position: absolute;
        z-index: 2;
        float: left;
        display: none;
        padding: 3rem;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto;
        height: 50px;
    }
    .button-video.show {
        display: flex;
        transition: all 0.5s ease;
    }
    .button-list {
        padding: 10px;
        width: 100%;
    }
    .button-list-action {
        text-align: center;

    }
    .button-list-action a {
        cursor: pointer;
        position: relative;
        padding: 1.5rem 3.5rem;
        border-radius: 3.75rem;
        line-height: 2.5rem;
        font-size: 2rem;
        font-weight: 600;
        border: 1px solid rgba(1, 40, 128, 0);
        background-image: linear-gradient(-180deg, #FF89D6 0%, #C01F9E 100%);
        box-shadow: 0 0.1rem 0.25rem 0 #b82ea7, 0 -0.25rem 1.5rem rgba(110, 15, 155, 1) inset, 0 0.75rem 0.5rem rgba(255,255,255, 0.4) inset, 0 0.25rem 0.5rem 0 rgba(180, 70, 207, 1) inset;
        margin: 21px;
        text-decoration: none;
        color: #fff;
    }
    .button-list-action a span {
        olor: transparent;
        background-image: linear-gradient(0deg, #EE82DA 0%, #FEFAFD 100%);
        -webkit-background-clip: text;
        background-clip: text;
        filter: drop-shadow(0 2px 2px hsla(290, 100%, 20%, 1));
    }
    .button-list-action a::before {
        content: "";
        display: block;
        height: 0.25rem;
        position: absolute;
        top: 0.5rem;
        left: 50%;
        transform: translateX(-50%);
        width: calc(100% - 7.5rem);
        background: #fff;
        border-radius: 100%;

        opacity: 0.7;
        background-image: linear-gradient(-270deg, rgba(255,255,255,0.00) 0%, #FFFFFF 20%, #FFFFFF 80%, rgba(255,255,255,0.00) 100%);
    }
    .button-list-action a::after {
        content: "";
        display: block;
        height: 0.25rem;
        position: absolute;
        bottom: 0.75rem;
        left: 50%;
        transform: translateX(-50%);
        width: calc(100% - 7.5rem);
        background: #fff;
        border-radius: 100%;

        filter: blur(1px);
        opacity: 0.05;
        background-image: linear-gradient(-270deg, rgba(255,255,255,0.00) 0%, #FFFFFF 20%, #FFFFFF 80%, rgba(255,255,255,0.00) 100%);
    }
</style>
<div class="button-video">
    <div class="button-list">
        <div class="button-list-action animated">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-sm-4 col-12">
                        @if ($event)
                        <a href="{{route('site.events.live',$event->id)}}" class="button-c">
                            <span>Go To Session</span>
                        </a>
                        @endif
                    </div>
                    <div class="col-sm-4 col-12">
                        <a class="button-c" data-toggle="modal" data-target="#showdata">
                            <span>Show Data</span>
                        </a>
                    </div>
                    <div class="col-sm-4 col-12">
                        <a href="#" class="button-c">
                            <span>Play Game</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<video id="myVideo" autoplay>
    <source src="{{ asset('assets/site/video/video2.mp4') }}" type="video/mp4">
</video>
<div class="modal fade" id="showdata" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Example Data
            </div>

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
    var video = document.getElementById("myVideo");
    video.onended = function() {
        var el = document.getElementsByClassName("button-video")[0];
        el.classList.add("show");
        var elbutton = document.getElementsByClassName("button-list-action")[0];
        elbutton.classList.add('animated', 'bounceInUp');
    };
</script>
</body>
</html>
