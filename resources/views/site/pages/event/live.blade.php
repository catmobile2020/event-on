@extends('site.layouts.master')

@section('title')
{{$event->name}}
@endsection

@section('content')
    <main class="content__main" style="height: 100%;">
        <div class="live-event">
            <div class="container-live-event">
                <div class="bannar-left">
                    <img src="{{asset('assets/site/images/branding.jpg')}}" class="w-100 h-100 d-block" alt="">
                </div>
                <div class="video-center d-flex justify-content-between">
                    <div class="video-call w-100">
                        <span>Live</span>
                        <iframe src="" frameborder="0" class="webinar"></iframe>
                        <a class="mini pointer"><i class="fas fa-compress-arrows-alt"></i></a>
                        <div class="footer-video">
                            <ul>
                                <li>
                                    <button data-toggle="modal" data-target="#vote-att">
                                        Vote
                                    </button>
                                </li>
                                <li>
                                    <button data-toggle="modal" data-target="#ask-att">
                                        Ask
                                    </button>
                                </li>
                                <li>
                                    <button data-toggle="modal" data-target="#answer-att">
                                        Answer
                                    </button>
                                </li>
                                <li>
                                    <button data-toggle="modal" data-target="#rate-att">
                                        Rate
                                    </button>
                                </li>
                                <li>
                                    <button data-toggle="modal" data-target="#agenda-att">
                                        Agenda
                                    </button>
                                </li>
                                <li>
                                    <button data-toggle="modal" data-target="#feedback-att">
                                        Feedback
                                    </button>
                                </li>
                                <li>
                                    <button data-toggle="modal" class="fullscreen">
                                        Full Screen
                                    </button>
                                </li>
                                <li>
                                    <button>
                                        Exit
                                    </button>
                                </li>
                            </ul>
                            <p class="time">00:00</p>
                        </div>
                    </div>
                    <!--                        <div class="speaker-details"></div>-->
                </div>
                <div class="bannar-right">
                    <img src="{{asset('assets/site/images/branding.jpg')}}" class="w-100 h-100 d-block" alt="">
                </div>
            </div>
            <div class="data-event_name_speaker d-flex justify-content-start">
                <div class="info_event_page">
                    <h1>Event Name:</h1>
                    <br>
                    <h2>Session Name, from to,</h2>
                    <br>
                    <h2>Speaker</h2>
                </div>
                <div class="branding-footer">

                </div>
            </div>
        </div>
        <img src="{{asset('assets/site/images/Stage.jpg')}}" class="background-event " alt="">

        <div class="modal fade" id="vote-att" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Vote</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="block-content p-4 pt-0 mt-0">
                                <p>
                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                                </p>
                                <div class="inputGroup">
                                    <input id="bad" name="radio" type="radio"/>
                                    <label for="bad">BAD</label>
                                </div>
                                <div class="inputGroup">
                                    <input id="good" name="radio" type="radio"/>
                                    <label for="good">GOOD</label>
                                </div>
                                <div class="inputGroup">
                                    <input id="verygood" name="radio" type="radio"/>
                                    <label for="verygood">Very Good</label>
                                </div>
                                <div class="inputGroup">
                                    <input id="excellent" name="radio" type="radio"/>
                                    <label for="excellent">Excellent</label>
                                </div>
                                <input type="submit" VALUE="VOTE NOW" class="btn btn-submit">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ask-att" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ask</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="block-content p-4">
                                <div class="col-12 p-0 m-0">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Ask"></textarea>
                                    </div>
                                </div>
                                <input type="submit" VALUE="Submit" class="btn btn-submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="answer-att" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Answer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="block-content p-4">
                                <p>
                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                                </p>
                                <div class="col-12 p-0 m-0">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Answer"></textarea>
                                    </div>
                                </div>
                                <input type="submit" VALUE="Submit" class="btn btn-submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($talks->where('time_from', '<=', date('H:i:s'))->where('time_to', '>=', date('H:i:s'))->first())
        <div class="modal fade" id="rate-att" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Rate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="speaker-tab" data-toggle="tab" href="#speaker" role="tab" aria-controls="speaker" aria-selected="true">Rate Speaker</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="session-tab" data-toggle="tab" href="#session" role="tab" aria-controls="profile" aria-selected="false">Rate Session</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="speaker" role="tabpanel" aria-labelledby="speaker-tab">
                                <div class="d-flex justify-content-start" style=" background-color: #f4f6f8; margin-top: 20px">
                                    @foreach($talks->where('time_from', '<=', date('H:i:s'))->where('time_to', '>=', date('H:i:s'))->first()->speakers as $speaker)
                                        <div class="session-data-speaker">
                                            <div class="date">
                                                <img src="{{$speaker->photo}}" alt="{{$speaker->name}}">
                                            </div>
                                        </div>
                                        <div class="speaker-data">
                                            <div class="block-name d-flex justify-content-between">
                                                <span class="color-text pt-2">DR {{ $speaker->name }}</span>
                                                <a href="{{ $speaker->id }}" class="primary-button-speaker" data-toggle="modal" data-target="#rate-speaker">Rate Speaker</a>
                                            </div>
                                            <div class="block-data">
                                                <p>{{$speaker->specialty}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="session" role="tabpanel" aria-labelledby="session-tab">
                                <div class="block-content">
                                    <p><strong>Session Name : {{$talks->where('time_from', '<=', date('H:i:s'))->where('time_to', '>=', date('H:i:s'))->first()->title }}</strong></p>
                                    <p>
                                        {!!  $talks->where('time_from', '<=', date('H:i:s'))->where('time_to', '>=', date('H:i:s'))->first()->desc !!}
                                    </p>
                                    <div class="col-12">
                                        <fieldset class="rating">
                                            <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                            <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                            <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                            <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                            <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                            <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                            <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                            <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                            <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                            <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                        </fieldset>
                                    </div>

                                    <div class="col-12 p-0 m-0">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" placeholder="Your Feedback"></textarea>
                                        </div>
                                    </div>
                                    <input type="submit" VALUE="Submit" class="btn btn-submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="modal fade" id="rate-speaker" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Rate Speaker</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="block-content p-4">
                                <p><strong>Speaker Name : Nabil Elsheikh</strong></p>
                                <div class="col-12">
                                    <fieldset class="rating">
                                        <input type="radio" id="speakerstar5" name="rating" value="5" /><label class = "full" for="speakerstar5"></label>
                                        <input type="radio" id="speakerstar4half" name="rating" value="4.5" /><label class="half" for="speakerstar4half" title="Pretty good - 4.5 stars"></label>
                                        <input type="radio" id="speakerstar4" name="rating" value="4" /><label class = "full" for="speakerstar4" title="Pretty good - 4 stars"></label>
                                        <input type="radio" id="speakerstar3half" name="rating" value="3.5" /><label class="half" for="speakerstar3half" title="Meh - 3.5 stars"></label>
                                        <input type="radio" id="speakerstar3" name="rating" value="3" /><label class = "full" for="speakerstar3" title="Meh - 3 stars"></label>
                                        <input type="radio" id="speakerstar2half" name="rating" value="2.5" /><label class="half" for="speakerstar2half" title="Kinda bad - 2.5 stars"></label>
                                        <input type="radio" id="speakerstar2" name="rating" value="2" /><label class = "full" for="speakerstar2" title="Kinda bad - 2 stars"></label>
                                        <input type="radio" id="speakerstar1half" name="rating" value="1.5" /><label class="half" for="speakerstar1half" title="Meh - 1.5 stars"></label>
                                        <input type="radio" id="speakerstar1" name="rating" value="1" /><label class = "full" for="speakerstar1" title="Sucks big time - 1 star"></label>
                                        <input type="radio" id="speakerstarhalf" name="rating" value="half" /><label class="half" for="speakerstarhalf" title="Sucks big time - 0.5 stars"></label>
                                    </fieldset>
                                </div>
                                <div class="col-12 p-0 m-0">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Your Feedback"></textarea>
                                    </div>
                                </div>
                                <input type="submit" VALUE="Submit" class="btn btn-submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="agenda-att" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agenda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-12 p-2">
                                <div class="">
                                    <h4 class="color-text"><strong>{{ $selected_day->title }}</strong> {{$selected_day->date->isoFormat('LLL')}}</h4>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="">
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
                                        @foreach($talks as $talk)
                                            <tr>
                                                <th scope="row" STYLE="font-family: tahoma;">{{ $talk->time_from }} - {{ $talk->time_to }}</th>
                                                <td>{{ $talk->title }}</td>
                                                <td>{!! $talk->desc !!}</td>
                                                <td>@foreach($talk->speakers as $speaker)
                                                        <span>Dr: {{$speaker->name}}</span>
                                                        @if (!$loop->last)
                                                            ,
                                                        @endif
                                                    @endforeach</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="feedback-att" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Feedback</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-12 mb-3">
                                <p><strong>The sessions were informative and beneficial</strong></p>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="agree" value="4" name="sessions" class="custom-control-input">
                                    <label class="custom-control-label"  for="agree">Agree</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="notsure" value="3"  name="sessions" class="custom-control-input">
                                    <label class="custom-control-label" for="notsure">Not sure</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="disagree" value="2" name="sessions" class="custom-control-input">
                                    <label class="custom-control-label" for="disagree">Disagree</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="Strongly" value="1" name="sessions" class="custom-control-input">
                                    <label class="custom-control-label" for="Strongly">Strongly disagree</label>
                                </div>

                            </div>
                            <div class="col-12 mb-3">
                                <p><strong>The inter activity was stimulating</strong></p>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="agree2" value="4" name="activity" class="custom-control-input">
                                    <label class="custom-control-label" for="agree2">Agree</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="notsure2" value="3" name="activity" class="custom-control-input">
                                    <label class="custom-control-label" for="notsure2">Not sure</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="disagree2" value="2" name="activity" class="custom-control-input">
                                    <label class="custom-control-label" for="disagree2">Disagree</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="Strongly2" value="1" name="activity" class="custom-control-input">
                                    <label class="custom-control-label" for="Strongly2">Strongly disagree</label>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <p><strong>The speaker/material was interesting</strong></p>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="agree3" value="4" name="interesting" class="custom-control-input">
                                    <label class="custom-control-label" for="agree3">Agree</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="notsure3" value="3" name="interesting" class="custom-control-input">
                                    <label class="custom-control-label" for="notsure3">Not sure</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="disagree3" value="2" name="interesting" class="custom-control-input">
                                    <label class="custom-control-label" for="disagree3">Disagree</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="Strongly3" value="1" name="interesting" class="custom-control-input">
                                    <label class="custom-control-label" for="Strongly3">Strongly disagree</label>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <p><strong>The overall experience met my expectations</strong></p>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="agree4" value="4" name="experience" class="custom-control-input">
                                    <label class="custom-control-label" for="agree4">Agree</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="notsure4" value="3" name="experience" class="custom-control-input">
                                    <label class="custom-control-label" for="notsure4">Not sure</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="disagree4" value="2" name="experience" class="custom-control-input">
                                    <label class="custom-control-label" for="disagree4">Disagree</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="Strongly4" value="1" name="experience" class="custom-control-input">
                                    <label class="custom-control-label" for="Strongly4">Strongly disagree</label>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="additional-comments"><strong>Additional Comments</strong></label>
                                <textarea class="form-control" id="additional-comments" rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <input type="submit" id="submit-feedback" VALUE="Submit" class="btn btn-submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

@section('js')
    <style>

        .custom-control-inline {
            margin-right: 0.5rem;
        }
        .time {
            color: #fff;
            text-align: center;
            margin-left: 15px;
            font-weight: bold;
        }
        .video-call {
            padding: 20px;
        }
        .video-call iframe {
            width: 1173px;
            background-color: #000;
            height: 100%;
        }
        .video-call span {
            background-color: #1C4B7B;
            color: #fff;
            position: absolute;
            margin: 15px;
            padding: 4px;
            padding-left: 15px;
            padding-right: 15px;
            border-radius: 5px;
        }
        .data-event_name_speaker {
            position: absolute;
            z-index: 999;
            bottom: 0;
            width: 74.1%;
            display: block;
            margin: auto;
            left: 56px;
            color: #fff;
            margin-bottom: 13px;
        }
        .data-event_name_speaker h1 {
            font-weight: bold;
        }
        .footer-video {
            position: relative;
            z-index: 3;
            height: 69px;
            bottom: 0;
            float: right;
            margin-right: 17px;
        }
        .footer-video ul {
            list-style: none;
            float: right;
            margin: 0;
            padding: 0;
            width: 86px;
        }
        .footer-video ul li {
            float: left;
            margin-bottom: 17px;
        }
        .footer-video ul li button {
            padding: 20px;
            padding-left: 1px;
            padding-right: 1px;
            width: 102px;
            display: block;
            background-color: #2b2b2b;
            border: 0px;
            color: #fff;
            font-size: 15.2px;
        }
        .footer-video ul li button:hover {
            background-color: #f8003e;
            color: #fff;
        }
        .container-live-event {
            width: 94%;
            height: 700px;
            position: absolute;
            left: 0;
            right: 0;
            margin: auto;
            top: 43px;
            z-index: 2;
        }
        .bannar-left {
            width: 12%;
            height: 100%;
            background-color: #000;
            float: left;

        }
        .bannar-right {
            width: 12%;
            height: 100%;
            background-color: #000;
            float: right;
        }
        .bannar-left span {
            position: absolute;
            transform: rotate(-90deg);
            font-size: 87px;
            margin-left: -71px;
            margin-top: 256px;
            color: #fff;
        }
        .bannar-right span {
            position: absolute;
            transform: rotate(-90deg);
            font-size: 87px;
            margin-left: -71px;
            margin-top: 256px;
            color: #fff;
        }
        .video-center {
            float: left;
            width: 74%;
            height: 100%;
            display: block;
            background-color: #3d3d3d;
            margin-left: 18px;
            margin-right: 10px;
        }
        .info_event_page {
            width: 452px;
        }
        .info_event_page h1 {
            font-size: 30px;
        }
        .info_event_page h2 {
            font-size: 21.5px;
            margin-top: -20px;
        }
        .branding-footer {
            width: 1195px;
            height: 184px;
            background-color: #f8003e;
        }
        @media (min-width: 481px) and (max-width: 767px) and (max-width: 823px) {
            .video-call {
                padding: 0px !important;
                padding-bottom: 0;
            }
            .video-call iframe {
                height: 90% !important;
                width: 100% !important
            }
            .video-call span {
                background-color: #1C4B7B;
                color: #fff;
                position: absolute;
                margin: 15px;
                padding: 4px;
                padding-left: 15px;
                padding-right: 15px;
                border-radius: 5px;
            }
            .data-event_name_speaker {
                position: absolute;
                z-index: 999;
                bottom: 0;
                width: 70%;
                display: block;
                margin: auto;
                left: 0;
                right: 0;
                color: #fff;
                margin-bottom: 3px !important;
                font-size: 0px !important;
                display: none !important;
            }
            .data-event_name_speaker h1 {
                font-weight: bold;
            }
            .footer-video {
                position: relative;
                z-index: 3;
                height: 61px;
                bottom: 0;
                width: 100%;
            }
            .footer-video ul {
                list-style: none;
                margin-top: -6px !important;
                margin-left: -39px;
                width: 100%;
            }
            .footer-video ul li {
                float: left;
                margin-right: 1px !important;
            }
            .footer-video ul li button {

                width: 68px !important;
                display: block;
                background-color: #2b2b2b;
                border: 0px;
                color: #fff;
                font-size: 9px !important;
            }
            .footer-video ul li button:hover {
                background-color: #f8003e;
                color: #fff;
            }
            .container-live-event {
                width: 100% !important;
                height: 100% !important;;
                position: absolute;
                left: 0;
                right: 0;
                margin: auto;
                top: 0 !important;;
                z-index: 2 !important;
            }
            .bannar-left {
                width: 8% !important;
                height: 100%;
                background-color: #000;
                float: left;

            }
            .bannar-right {
                width: 8% !important;
                height: 100%;
                background-color: #000;
                float: right;
            }
            .bannar-left span {
                position: absolute;
                transform: rotate(-90deg);
                font-size: 87px;
                margin-left: -71px;
                margin-top: 256px;
                color: #fff;
            }
            .bannar-right span {
                position: absolute;
                transform: rotate(-90deg);
                font-size: 87px;
                margin-left: -71px;
                margin-top: 256px;
                color: #fff;
            }
            .video-center {
                float: left;
                width: 84% !important;
                height: 100% !important;
                display: block;
                background-color: #3d3d3d;
                margin-left: 0 !important;
                margin-right: 0 !important;
            }
        }
        @media (max-width: 812px) {
            .video-call {
                padding: 0px !important;
                padding-bottom: 0;
            }
            .video-call iframe {
                height: 86% !important;
                width: 100% !important;
            }
            .video-call span {
                background-color: #1C4B7B;
                color: #fff;
                position: absolute;
                margin: 15px;
                padding: 4px;
                padding-left: 15px;
                padding-right: 15px;
                border-radius: 5px;
            }
            .data-event_name_speaker {
                position: absolute;
                z-index: 999;
                bottom: 0;
                width: 70%;
                display: block;
                margin: auto;
                left: 0;
                right: 0;
                color: #fff;
                margin-bottom: 3px !important;
                font-size: 0px !important;
                display: none !important;
            }
            .data-event_name_speaker h1 {
                font-weight: bold;
            }
            .footer-video {
                position: relative;
                z-index: 3;
                height: 41px !important;
                bottom: 0;
                width: 100%;
            }
            .footer-video ul {
                list-style: none;
                margin-top: -6px !important;
                width: 100%;
            }
            .footer-video ul li {
                float: left;
                margin-right: 1px !important;
            }
            .footer-video ul li button {
                padding: 12px !important;
                width: 68px !important;
                display: block;
                background-color: #2b2b2b;
                border: 0px;
                color: #fff;
                font-size: 8px !important;
            }
            .time {
                display: none;
            }
            .footer-video ul li button:hover {
                background-color: #f8003e;
                color: #fff;
            }
            .container-live-event {
                width: 100% !important;
                height: 100% !important;;
                position: absolute;
                left: 0;
                right: 0;
                margin: auto;
                top: 0 !important;;
                z-index: 2 !important;
            }
            .bannar-left {
                width: 8% !important;
                height: 100%;
                background-color: #000;
                float: left;

            }
            .bannar-right {
                width: 8% !important;
                height: 100%;
                background-color: #000;
                float: right;
            }
            .bannar-left span {
                position: absolute;
                transform: rotate(-90deg);
                font-size: 87px;
                margin-left: -71px;
                margin-top: 256px;
                color: #fff;
            }
            .bannar-right span {
                position: absolute;
                transform: rotate(-90deg);
                font-size: 87px;
                margin-left: -71px;
                margin-top: 256px;
                color: #fff;
            }
            .video-center {
                float: left;
                width: 84% !important;
                height: 100% !important;
                display: block;
                background-color: #3d3d3d;
                margin-left: 0 !important;
                margin-right: 0 !important;
            }
        }
        @media only screen and (max-width: 1280px) {
            .info_event_page {
                width: 225px;
                float: left;
            }
            .info_event_page h1 {
                font-size: 21px;
            }
            .info_event_page h2 {
                font-size: 15px;
                margin-top: -20px;
            }
            .branding-footer {
                width: 665px !important;
                height: 102px;
                background-color: #f8003e;
                float: left;
            }
            .data-event_name_speaker {
                width: 92% !important;
            }
        }
        @media only screen and (max-width: 1024px) {
            .info_event_page {
                width: 225px;
                float: left;
            }
            .info_event_page h1 {
                font-size: 21px;
            }
            .info_event_page h2 {
                font-size: 15px;
                margin-top: -20px;
            }
            .branding-footer {
                width: 541px;
                height: 102px;
                background-color: #f8003e;
                float: left;
            }
            .video-call {
                padding: 20px;
                padding-bottom: 0;
            }
            .video-call iframe {
                height: 85%;
            }
            .video-call span {
                background-color: #1C4B7B;
                color: #fff;
                position: absolute;
                margin: 15px;
                padding: 4px;
                padding-left: 15px;
                padding-right: 15px;
                border-radius: 5px;
            }
            .data-event_name_speaker {
                position: absolute;
                z-index: 999;
                bottom: 0;
                width: 70%;
                display: block;
                margin: auto;
                left: 0;
                right: 0;
                color: #fff;
                margin-bottom: 50px;
            }
            .data-event_name_speaker h1 {
                font-weight: bold;
                font-size: 30px;
            }
            .data-event_name_speaker h2 {
                font-size: 25px;
            }
            .footer-video {
                height: 69px;
                bottom: 0;
                margin-right: -6px !important;
            }
            .footer-video ul {
                list-style: none;
            }
            .footer-video ul li {
                float: left;
                margin-right: 4px;
            }
            .footer-video ul li button {
                padding: 20px;
                width: 89px;
                display: block;
                background-color: #2b2b2b;
                border: 0px;
                color: #fff;
                font-size: 12px;
            }
            .footer-video ul li button:hover {
                background-color: #f8003e;
                color: #fff;
            }
            .container-live-event {
                width: 100% !important;
                height: 540px;
                position: absolute;
                left: 0;
                right: 0;
                margin: auto;
                top: 43px;
                z-index: 2;
                margin-top: 1px !important;
            }
            .bannar-left {
                width: 12%;
                height: 100%;
                background-color: #000;
                float: left;

            }
            .bannar-right {
                width: 12%;
                height: 100%;
                background-color: #000;
                float: right;
            }
            .bannar-left span {
                position: absolute;
                transform: rotate(-90deg);
                font-size: 87px;
                margin-left: -71px;
                margin-top: 256px;
                color: #fff;
            }
            .bannar-right span {
                position: absolute;
                transform: rotate(-90deg);
                font-size: 87px;
                margin-left: -71px;
                margin-top: 256px;
                color: #fff;
            }
            .video-center {
                float: left;
                width: 73%;
                height: 100%;
                display: block;
                background-color: #3d3d3d;
                margin-left: 14px;
                margin-right: 10px;
            }
        }
        @media only screen and (max-width: 1366px) {
            .info_event_page {
                width: 225px;
                float: left;
            }
            .info_event_page h1 {
                font-size: 21px;
            }
            .info_event_page h2 {
                font-size: 15px;
                margin-top: -20px;
            }
            .branding-footer {
                width: 541px;
                height: 102px;
                background-color: #f8003e;
                float: left;
            }
            .video-call {
                padding: 20px;
                height: 100%;
            }
            .video-call iframe {
                height: 100%;
                width: 87%;
            }
            .video-call span {
                background-color: #1C4B7B;
                color: #fff;
                position: absolute;
                margin: 15px;
                padding: 4px;
                padding-left: 15px;
                padding-right: 15px;
                border-radius: 5px;
            }
            .data-event_name_speaker {
                position: absolute;
                z-index: 999;
                bottom: 0;
                width: 99%;
                display: block;
                margin: auto;
                left: 0;
                right: 0;
                color: #fff;
                margin-bottom: 30px;
            }
            .footer-video {
                position: relative;
                z-index: 3;
                float: right;
                margin-right: 3px;
            }
            .footer-video ul {
                list-style: none;
            }
            .footer-video ul li {
                float: left;
                margin-bottom: 14px;
            }
            .footer-video ul li button {
                padding: 9px;
                width: 89px;
                display: block;
                background-color: #2b2b2b;
                border: 0px;
                color: #fff;
                font-size: 12px;
            }
            .footer-video ul li button:hover {
                background-color: #f8003e;
                color: #fff;
            }
            .container-live-event {
                width: 92%;
                height: 463px;
                position: absolute;
                left: 0;
                right: 0;
                margin: auto;
                top: 43px;
                z-index: 2;
            }
            .bannar-left {
                width: 12%;
                height: 100%;
                background-color: #000;
                float: left;

            }
            .bannar-right {
                width: 12%;
                height: 100%;
                background-color: #000;
                float: right;
            }
            .bannar-left span {
                position: absolute;
                transform: rotate(-90deg);
                font-size: 87px;
                margin-left: -71px;
                margin-top: 256px;
                color: #fff;
            }
            .bannar-right span {
                position: absolute;
                transform: rotate(-90deg);
                font-size: 87px;
                margin-left: -71px;
                margin-top: 256px;
                color: #fff;
            }
            .video-center {
                float: left;
                width: 73%;
                height: 100%;
                display: block;
                background-color: #3d3d3d;
                margin-left: 14px;
                margin-right: 10px;
            }
        }
        @media only screen
        and (min-width: 1024px)
        and (max-height: 1366px)
        and (orientation: portrait)
        and (-webkit-min-device-pixel-ratio: 1.5) {
            .container-live-event {
                margin-top: 500px !important;
            }
        }
        @media only screen
        and (min-width: 1024px)
        and (max-height: 1366px)
        and (orientation: landscape)
        and (-webkit-min-device-pixel-ratio: 1.5) {
            .container-live-event {
                margin-top: 271px !important;
            }
            .branding-footer {
                width: 558px;
                height: 133px;
                background-color: #f8003e;
                float: left;
            }
            .data-event_name_speaker {
                margin-bottom: 70px;
            }
        }
        @media only screen
        and (min-width: 1024px)
        and (max-height: 768px)
        and (orientation: landscape)
        and (-webkit-min-device-pixel-ratio: 1.5) {
            .container-live-event {
                margin-top: 88px !important;
            }
            .branding-footer {
                width: 535px !important;
                height: 133px;
                background-color: #f8003e;
                float: left;
            }
            .data-event_name_speaker {
                margin-bottom: 16px;
                width: 1004px !important;
            }
        }

    </style>
    <script>
        $(document).ready(function() {
            var max_fields_limit      = 10;
            var x = 1;
            $('.add_more_button').click(function(e){
                e.preventDefault();
                if(x < max_fields_limit){
                    x++;
                    $('.more-fields').append('<div><input type="text" name="tags" placeholder="Answer"/><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>'); //add input field
                }
            });
            $('.more-fields').on("click",".remove_field", function(e){
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });

        $('#submit-feedback').on('click', function () {
            var sessions = $('input[name=sessions]:checked').val(),
                activity = $('input[name=activity]:checked').val(),
                experience = $('input[name=experience]:checked').val(),
                interesting = $('input[name=interesting]:checked').val(),
                additional = $('#additional-comments').val();

            if(sessions > 0 && activity > 0 && experience > 0 && interesting > 0)
            {
                $.post('/add-feedback/{{$selected_day->id}}', {
                    "_token": "{{ csrf_token() }}",
                    "q1": sessions,
                    "q2": activity,
                    "q3": interesting,
                    "q4": experience,
                    "comment": additional
                }, function (data) {
                    if(data.state == 0)
                    {
                        $('#feedback-att .modal-header .modal-title').html("Result");
                        $('#feedback-att .modal-body').html('<div class="alert alert-danger">'+ data.msg +'</div>');
                        $("#submit-feedback").remove();
                    }else{
                        $('#feedback-att .modal-header .modal-title').html("Result");
                        $('#feedback-att .modal-body').html('<div class="alert alert-success">'+ data.msg +'</div>');
                        $("#submit-feedback").remove();
                    }
                })
            }else{
                alert('PLease fill all data');
            }

        });
        $(function() {
            $(".fullscreen").click(function() {
                $(".webinar").addClass("full-screen");
                $(".data-event_name_speaker").addClass("hidden-bannar");
                $(".video-call").addClass("show-live");
                $(".mini").addClass("show")
            });
            $(".mini").click(function() {
                $(".webinar").removeClass("full-screen");
                $(".data-event_name_speaker").removeClass("hidden-bannar");
                $(".video-call").removeClass("show-live");
                $(".mini").removeClass("show")
            });
        });
    </script>
    <style>
        a.remove_field {
            float: right;
            margin-top: 15px;
            z-index: 20;
            position: relative;
            margin-top: -65px;
            margin-right: 10px;
            background-color: #6e1b23;
            font-size: 14px;
            color: #fff;
            padding: 5px;
        }
        .full-screen {
            position: fixed;
            width: 100% !important;
            height: 100% !important;
            top: 0 !important;
            bottom: 0 !important;
            left: 0 !important;
            right: 0 !important;
            z-index: 99!important;
        }
        .hidden-bannar {
            display: none !important;
        }
        .show-live {
            position: fixed;
            padding: 2px !important;
            left: 0;
            z-index: 99 !important;
            margin: auto;
            top: 5px;
        }
        .show-live span {
            z-index: 9999;
        }
        .mini {
            z-index: 9999;
            position: fixed;
            color: #fff;
            right: 0;
            padding: 10px;
            background-color: #333;
            padding-left: 20px;
            padding-right: 20px;
            display: none;
        }
        .mini.show {
            display: block;
        }
    </style>
@endsection
