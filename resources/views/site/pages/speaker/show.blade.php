@extends('site.layouts.master')

@section('title')
    {{$speaker->name}}
@endsection

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-8">
                        <div class="block-content-speaker">
                            <div class="d-flex justify-content-start">
                                <div class="session-data-speaker">
                                    <div class="date">
                                        <img src="{{$speaker->photo}}" alt="{{$speaker->name}}">
                                    </div>
                                </div>
                                <div class="speaker-data">
                                    <div class="block-name">
                                        <span>{{$speaker->name}}</span>
                                    </div>
                                    <div class="block-data">
                                        {!! $speaker->bio !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group p-3">
                            <a href="{{route('site.speakers.vote',$speaker->id)}}" class="btn btn-submit w-100 text-white">Vote Speaker</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
