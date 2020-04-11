@extends('site.layouts.master')

@section('title','Home')

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="swiper-container p-1">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="upcoming.html" class="p-0 m-0 w-100">
                                        <img src="https://live.staticflickr.com/3420/3883836687_9616e12db2.jpg" width="100%"  alt="">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://live.staticflickr.com/3420/3883836687_9616e12db2.jpg" width="100%"  alt="">
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    @if ($event)
                    <div class="col-6">
                         <div class="p-1">
                                <style>
                                    .data-event-remin {
                                        position: absolute;
                                        margin-top: 50px;
                                        text-align: center;
                                        width: 80%;
                                        margin: auto;
                                        left: 0;
                                        right: 0;
                                        bottom: 0;
                                        top: 0;
                                        height: 100px;
                                    }
                                    .data-event-remin p {
                                        color: #fff;
                                        font-weight: bold;
                                    }
                                </style>
                                <div class="data-event-remin">
                                    <p>{{$event->name}}
                                        time remaining:{{$event->remaining_time}}</p>

                                    <a href="{{route('site.events.live',$event->id)}}" class="btn primary-button mt-3 w-100 p-3">
                                        <strong>Show Now</strong>
                                    </a>
                                </div>
                                <img src="{{$event->photo}}" width="100%"  alt="">
                            </div>
                    </div>
                    @endif
                    <div class="col-12">
                        <div class="video p-1">
                            <video width="100%" height="" controls >
                                <source src="{{$video}}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="banner p-1">
                            <img src="https://i.pinimg.com/originals/fa/b6/fe/fab6fe0ed339baa6eb6ce33085ee715e.jpg" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
