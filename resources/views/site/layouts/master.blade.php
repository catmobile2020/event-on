<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
    <script src="https://kit.fontawesome.com/3d22269372.js"></script>
    @yield('css')
    <title>@yield('title') | Event On</title>
</head>
<body>

<div class="grid" id="app">
    <div class="grid__content">
        @include('site.layouts.header')

        @include('site.layouts.sidebar')

            @yield('content')
        <!--                <section class="live-event-now">-->
        <!--                    <div class="event-now">-->

        <!--                    </div>-->
        <!--                </section>-->
    </div>
</div>
<script src="{{asset('assets/site/js/jquery-1.11.0.js')}}"></script>
<script src="{{asset('assets/site/js/bootstrap.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('assets/site/js/swiper.min.js')}}"></script>
<script src="{{asset('assets/site/js/main.js')}}"></script>
<style>
    .swiper-container {
        width: 100%;
        height: 100%;
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
</style>
@yield('js')
</body>
</html>
