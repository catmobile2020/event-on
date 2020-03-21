@extends('site.layouts.master')

@section('title','Calender')

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row">
                    @foreach($rows as $row)
                        <div class="col-lg-6 col-sm-12">
                            <div class="block-content-c">
                                <div class="d-flex justify-content-start">
                                    <div class="session-data">
                                        <div class="date">
                                            <p>{{$row->start_date}}</p>
                                            @if($row->start_date != $row->end_date)
                                                <p>{{$row->end_date}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="calander-data">
                                        <div class="block-name">
                                            <a href="{{route('site.events.show',$row->id)}}">{{$row->name}}</a>
                                        </div>
                                        <div class="block-data">
                                            <p>{{Str::limit(strip_tags($row->description),50)}}</p>
                                        </div>

                                    </div>
                                    @if ($row->end_date > today())
                                        <div class="session-data gray pointer">
                                            <div class="date">
                                                Ended
                                            </div>
                                        </div>
                                    @elseif($row->start_date > today())
                                        <div class="session-data gray pointer">
                                            <div class="date">
                                                Not Start Yet
                                            </div>
                                        </div>
                                    @else
                                        <div class="session-data yellow pointer">
                                            <a href="{{route('site.events.show',$row->id)}}">
                                                <div class="date" >
                                                    Live Now
                                                </div>
                                            </a>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
