@extends('site.layouts.master')

@section('title','Events')

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <br>
                        <h4 class="color-dasboard p-2"><strong>My Events</strong></h4>
                        <hr>
                    </div>
                    @foreach($rows as $row)
                        <div class="col-lg-12 col-sm-12 {{$row->status == 1 ? 'completed' : ''}}">
                        <div class="block-content-c mb-3">
                            <div class="row no-gutters ">
                                <div class="col-lg-1 col-sm-12 d-flex align-items-stretch">
                                    <div class="session-data">
                                        <div class="date text-left">
                                            <h1 class="m-0">{{$row->start_date->format('d')}}</h1>
                                            <h2>{{$row->start_date->format('M')}}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-sm-12">
                                    <div class="calander-data">
                                        <div class="block-name">
                                            <h1 class="m-0">{{$row->name}}</h1>
                                            <h3>{{$row->start_date->format('d-m-Y')}} : {{$row->end_date->format('d-m-Y')}}</h3>
                                        </div>
                                        <div class="block-data">
                                            <p>{{Str::limit(strip_tags($row->description),250)}}</p>
                                            <a href="{{route('site.events.show',$row->id)}}" class="float-right mt-4 p-2 primary-button">Learn More</a>
                                            <br>
                                            <br>
                                            <br>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12 d-flex align-items-stretch">
                                    @if ($row->end_date < today())
                                        <div class="session-data p-0 black-red">
                                            <img src="{{$row->photo}}" class="img-fluid" alt="">
                                            <a href="" class="registered">Completed</a>
                                        </div>
                                    @else
                                        <div class="session-data p-0 black-red">
{{--                                            <a class="go-live-now">--}}
{{--                                                Go Live Now--}}
{{--                                            </a>--}}

                                            <img src="{{$row->photo}}" class="img-fluid" alt="">
                                            @if ($auth_user->myEvents()->where('event_id',$row->id)->first())
                                                <a href="" class="registered">Already Registered</a>
                                            @else
                                                <span class="time-remaining">Remaining Time :{{$row->remaining_time}}</span>
                                                <a href="" class="registered eventToRegister" data-url="{{route('site.events.registerToEvent',$row->id)}}">Register Now</a>
                                            @endif
                                        </div>
                                    @endif
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
@section('js')
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
