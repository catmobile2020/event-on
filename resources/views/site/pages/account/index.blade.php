@extends('site.layouts.master')

@section('title','Account')

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 col-sm-12">
                        <div class="block-content-c">
                            <div class="block-data w-100">
                                <div class="p-3">
                                    <span><strong>My Info</strong></span>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <img src="{{$auth_user->photo}}" class="p-4 m-4 img-fluid" alt="">
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <div class="p-3">
                                            <span><Strong>Name : </Strong><span>{{$auth_user->name}}</span></span>
                                        </div>
                                        <hr>
                                        <div class="p-3">
                                            <span><Strong>phone : </Strong><span>{{$auth_user->phone}}</span></span>
                                        </div>
                                        <hr>
                                        <div class="p-3">
                                            <span><Strong>Email Address : </Strong><span>{{$auth_user->email}}</span></span>
                                        </div>
                                        <hr>
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
