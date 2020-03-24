@extends('site.layouts.master')

@section('title','Home')

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-12">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($sliders as $slider)
                                    <div class="swiper-slide">
                                        @if ($slider->is_image)
                                            <img src="{{$slider->photo}}" class="img-fluid w-100" alt="">
                                        @else
                                            <div class="video">
                                                <video width="100%" height="" controls >
                                                    <source src="{{$slider->video_url}}" type="video/mp4">
                                                </video>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
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
