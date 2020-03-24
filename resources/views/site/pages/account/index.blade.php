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
                                        <img src="https://cdn.iconscout.com/icon/free/png-512/avatar-370-456322.png" class="p-4 m-4 img-fluid" alt="">
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <div class="p-3">
                                            <span><Strong>Name : </Strong><span>{{$auth_user->name}}</span></span>
                                        </div>
                                        <hr>
                                        <div class="p-3">
                                            <span><Strong>UserName : </Strong><span>Cairo</span></span>
                                        </div>
                                        <hr>
                                        <div class="p-3">
                                            <span><Strong>Email Address : </Strong><span>Nabil.elsheikh@cat.com.eg</span></span>
                                        </div>
                                        <hr>
                                        <div class="p-3">
                                            <span><Strong>Status : </Strong><span class="badge badge-success">Active</span></span>
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
