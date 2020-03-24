@extends('site.layouts.master')

@section('title','About Us')

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 col-sm-12">
                        <div class="block-content-c">
                            <div class="">
                                <div class="calander-data w-100">
                                    <div class="block-name">
                                        <a href="{{$company->website}}">{{$company->name}}</a>
                                    </div>
                                    <div class="block-data">
                                        <img src="{{$company->logo}}" alt="{{$company->name}}">
                                        {!! $company->description !!}
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
