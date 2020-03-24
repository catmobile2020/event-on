@extends('site.layouts.master')

@section('title','Home')

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-12">
                        <div class="upcoming-event">
                            <a href="{{route('site.events.upcoming')}}">
                                <img src="https://ca-times.brightspotcdn.com/dims4/default/caa259e/2147483647/strip/true/crop/1800x843+0+0/resize/840x393!/quality/90/?url=https%3A%2F%2Fcalifornia-times-brightspot.s3.amazonaws.com%2F91%2Ffa%2F0b2a98804a4ba411cd26c5a3f264%2Fupcoming-events.jpg" class="img-fluid w-100" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="video">
                            <video width="100%" height="" controls >
                                <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="banner">
                            <img src="https://i.pinimg.com/originals/fa/b6/fe/fab6fe0ed339baa6eb6ce33085ee715e.jpg" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
