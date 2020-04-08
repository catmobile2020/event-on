@extends('site.layouts.master')

@section('title')
    {{$event->name}}
@endsection

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-10">
                        <br>
                        <h4 class="color-dasboard p-2"><strong>Schedule / {{$event->name}}</strong></h4>
                        <hr>
                    </div>
                    <div class="col-lg-10 col-sm-12 col-md-11">
                        <div class="block-content-agenda m-0 mt-3 mb-5">
                            <div class="row no-gutters">
                                <div class="col-12">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="speakers-tab" data-toggle="tab" href="#speakers" role="tab" aria-controls="speakers" aria-selected="false">Speakers</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="agenda-tab" data-toggle="tab" href="#agenda" role="tab" aria-controls="agenda" aria-selected="false">Agenda</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="block-content-d p-2 mb-3">
                                                <div class="row no-gutters ">
                                                    <div class="col-lg-1 col-sm-12 d-flex align-items-stretch">
                                                        <div class="session-data block-content-d">
                                                            <div class="date text-left">
                                                                <h1 class="m-0">{{$event->start_date->format('d')}}</h1>
                                                                <h2>{{$event->start_date->format('M')}}</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-11 col-sm-12">
                                                        <div class="calander-data">
                                                            <div class="block-name">
                                                                <h1 class="m-0">{{$event->name}}</h1>
                                                                <h3>
                                                                    {{$event->start_date->format('d-m-Y')}} : {{$event->end_date->format('d-m-Y')}}
                                                                    <span  class="float-right time-r">Remaining Time :{{$event->remaining_time}}</span>
                                                                </h3>
                                                            </div>
                                                            <div class="block-data">
                                                                {!! $event->description !!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="speakers" role="tabpanel" aria-labelledby="speakers-tab">
                                            <div class="row">
                                                @foreach($speakers as $speaker)
                                                    <div class="col-12">
                                                    <div class="block-content-speaker">
                                                        <div class="d-flex justify-content-start " style=" background-color: #f4f6f8; ">
                                                            <div class="session-data-speaker">
                                                                <div class="date">
                                                                    <img src="{{$speaker->photo}}" alt="{{$speaker->name}}">
                                                                </div>
                                                            </div>
                                                            <div class="speaker-data">
                                                                <div class="block-name d-flex justify-content-between">
                                                                    <span class="color-text pt-2">{{$speaker->name}}</span>
                                                                    <a class="primary-button-speaker" data-toggle="modal" data-target="#more-data-speaker_{{$speaker->id}}">Learn More</a>
                                                                </div>
                                                                <div class="block-data">
                                                                    <p>{{Str::limit(strip_tags($speaker->bio),100)}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">
                                            @foreach($days as $day)
                                            <div class="row">
                                                <div class="col-12 p-2">
                                                    <div class="pl-5 pr-5">
                                                        <br>
                                                        <h4 class="color-text"><strong>{{$day->title}}</strong> {{$day->date->isoFormat('LLL')}}</h4>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="pl-5 pr-5">
                                                        <table class="table table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col">From - To</th>
                                                                <th scope="col">Session Topic</th>
                                                                <th scope="col">Description</th>
                                                                <th scope="col">Speaker</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($day->talks as $talk)
                                                            <tr>
                                                                <th scope="row" STYLE="font-family: tahoma;">{{$talk->time_from}} - {{$talk->time_to}}</th>
                                                                <td>{{$talk->title}}</td>
                                                                <td>{!! $talk->desc !!}</td>
                                                                <td>
                                                                    @foreach($talk->speakers as $speaker)
                                                                        <span>Dr: {{$speaker->name}}</span>
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="register-now-a pointer eventToRegister" data-url="{{route('site.events.registerToEvent',$event->id)}}">
                                            Register Now
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div><br><br><br><br>
            </div>
        </div>
    </main>
@endsection

@section('modals')
    @foreach($speakers as $speaker)
        <div class="modal fade" id="more-data-speaker_{{$speaker->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title color-text">{{$speaker->name}} Biography</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 text-left">
                            <img src="{{$speaker->photo}}" width="110px" alt="{{$speaker->name}}">
                            <br>
                            <br>
                            <span class="color-text weight "><strong>{{$speaker->name}}</strong></span>
                            <hr>
                            <div class="info-bio">
                                <p class="color-text weight m-0">{{$speaker->specialty}}</p>
                                <p class="color-text m-0">{{$speaker->address}}</p>
                                <p class="color-text m-0">{{$speaker->city}}</p>
                                <p class="color-text m-0">{{$speaker->phone}}</p>
                                <p class="color-text m-0">{{$speaker->email}}</p>
                            </div>
                        </div>
                        <div class="col-8">
                            {!! $speaker->bio !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('js')
    <style>
        .primary-button-speaker {
            background-color: #8e1843 !important;
            border-color: #8e1843 !important;
            color: #fff !important;
            padding: 6px;
            font-size: 12px;
            font-weight: 400;
        }
        .primary-button-speaker:hover {
            color: #fff !important;
        }
    </style>
    <script>
        $(document).on('click','.eventToRegister',function ($e) {
            $e.preventDefault();
            let ele=$(this);
            $.ajax({
                url:ele.data('url'),
                success:function (result) {
                    Swal.fire(
                        result.title,
                        result.message,
                        result.status,
                    ).then((result) => {
                        if (result.value) {
                            window.location.reload();
                        }
                    })
                },
                error:function (errors) {
                    Swal.fire(
                        'error',
                        errors,
                        'error'
                    )
                }
            });
        });
    </script>
@endsection
