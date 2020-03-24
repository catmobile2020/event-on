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
@yield('js')
</body>
</html>
