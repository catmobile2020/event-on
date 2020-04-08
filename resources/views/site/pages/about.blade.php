@extends('site.layouts.master')

@section('title','About Us')

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-10 col-sm-12">
                        <div class="block-content-d">
                            <div class="">
                                <div class="calander-data w-100 p-4">
                                    <div class="block-name">
                                        <h4 class="pt-2 pb-2">About</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="block-data">
                                                {!! $row->value !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12 d-flex align-items-center">
                                            <div class="logo-about ">
                                                <img src="{{$row->photo}}" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
