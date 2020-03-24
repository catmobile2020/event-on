@extends('site.layouts.master')

@section('title')
    {{$event->name}} Speakers
@endsection

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    @foreach($rows as $row)
                        <div class="col-lg-4 col-sm-6">
                        <div class="block-content-speaker">
                            <div class="d-flex justify-content-start">
                                <div class="session-data-speaker">
                                    <div class="date">
                                        <img src="{{$row->photo}}" alt="{{$row->name}}">
                                    </div>
                                </div>
                                <div class="speaker-data">
                                    <div class="block-name">
                                        <a href="{{route('site.speakers.show',$row->id)}}">{{$row->name}}</a>
                                    </div>
                                    <div class="block-data">
                                        <p>{{Str::limit(strip_tags($row->bio),50)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
