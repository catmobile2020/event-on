@extends('site.layouts.master')

@section('title','Upcoming Events')

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row">
                    @foreach($rows as $row)
                        <div class="col-sm-6">
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
                                @if ($auth_user->myEvents()->where('event_id',$row->id)->first())
                                    <div class="session-data yellow pointer">
                                        <div class="date" >
                                            <a href="{{route('site.events.show',$row->id)}}">Open Now</a>
                                        </div>
                                    </div>
                                @else
                                    <div class="session-data yellow pointer eventToRegister" data-url="{{route('site.events.registerToEvent')}}">
                                        <div class="date" >
                                            Register Now
                                        </div>
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
                    result.status
                )
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
