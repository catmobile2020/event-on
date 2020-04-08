@extends('site.layouts.master')

@section('title','Account')

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 col-sm-12">
                        <div class="block-content-d">
                            <div class="block-data w-100">
                                <div class="block-name pl-3 pr-3  d-flex justify-content-between">
                                    <h4 class="pt-4">Account</h4>
                                    <a href="" class="mt-4 p-2 primary-button">Edit My Account</a>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <hr class="w-100">
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <img src="{{$auth_user->photo}}" class="p-4 m-4 img-fluid" alt="{{$auth_user->name}}">
                                    </div>
                                    <div class="col-lg-8 col-sm-12 p-3">
                                        <div class="">
                                            <span><Strong>Name : </Strong><span>{{$auth_user->name}}</span></span>
                                        </div>
                                        <hr>
                                        <div class="">
                                            <span><Strong>Phone : </Strong><span>{{$auth_user->phone}}</span></span>
                                        </div>
                                        <hr>
                                        <div class="">
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
