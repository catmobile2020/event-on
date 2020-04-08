@extends('site.layouts.master')

@section('title','schedule')

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <br>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <h4 class="color-dasboard p-2"><strong>Schedule</strong></h4>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-3 col-12">
                                            <select class="form-control" name="month">
                                                <option value>Month(All)</option>
                                                <option value="1" {{request()->month == 1 ? 'selected' : ''}}>January</option>
                                                <option value="2" {{request()->month == 2 ? 'selected' : ''}}>February</option>
                                                <option value="3" {{request()->month == 3 ? 'selected' : ''}}>March</option>
                                                <option value="4" {{request()->month == 4 ? 'selected' : ''}}>April</option>
                                                <option value="5" {{request()->month == 5 ? 'selected' : ''}}>May</option>
                                                <option value="6" {{request()->month == 6 ? 'selected' : ''}}>June</option>
                                                <option value="7" {{request()->month == 7 ? 'selected' : ''}}>July</option>
                                                <option value="8" {{request()->month == 8 ? 'selected' : ''}}>August</option>
                                                <option value="9" {{request()->month == 9 ? 'selected' : ''}}>September</option>
                                                <option value="10" {{request()->month== 10 ? 'selected' : ''}}>October</option>
                                                <option value="11" {{request()->month== 11 ? 'selected' : ''}}>November</option>
                                                <option value="12" {{request()->month== 12 ? 'selected' : ''}}>December</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <input type="text" name="topic" value="{{request()->topic}}" class="form-control" placeholder="Topic">
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <select class="form-control" name="speaker_id">
                                                <option value>select speaker</option>
                                                @foreach($speakers as $speaker)
                                                    <option value="{{$speaker->id}}" {{request()->speaker_id == $speaker->id ? 'selected' : ''}}>{{$speaker->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <input type="submit" class="btn primary-button" value="Filter" style=" padding-top: 12px; padding-bottom: 12px; ">
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <hr>
                    </div>
                    @foreach($rows as $row)
                        <div class="col-lg-12 col-sm-12 {{$row->status == 1 ? 'completed' : ''}}">
                            <div class="block-content-d bl-1 mb-3">
                                <div class="row no-gutters ">
                                    <div class="col-lg-1 col-sm-12 d-flex align-items-stretch">
                                        <div class="session-data block-content-d">
                                            <div class="date text-left">
                                            <h1 class="m-0">{{$row->start_date->format('d')}}</h1>
                                            <h2>{{$row->start_date->format('M')}}</h2>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-lg-11 col-sm-12">
                                        <div class="calander-data">
                                            <div class="block-name">
                                            <h1 class="m-0">{{$row->name}}</h1>
                                            <h3>
                                                {{$row->start_date->format('d-m-Y')}} : {{$row->end_date->format('d-m-Y')}}
                                                <span  class="float-right time-r">Remaining Time :{{$row->remaining_time}}</span>
                                            </h3>
                                        </div>
                                        <div class="block-data">
                                            @if ($row->end_date < today())
                                                <div class="complete-c">
                                                    Completed
                                                </div>
                                            @else
                                                <a href="{{route('site.events.show',$row->id)}}" class="go-live-now">
                                                    Go Live Now
                                                </a>
                                            @endif
                                            <p>{{Str::limit(strip_tags($row->description),250)}}</p>
                                            <a href="{{route('site.events.show',$row->id)}}" class="float-right mt-4 p-2 primary-button">Learn More</a>
                                            <br>
                                            <br>
                                            <br>
                                        </div>
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
