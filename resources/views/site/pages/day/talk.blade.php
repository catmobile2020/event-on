@foreach($rows as $row)
<div class="col-lg-6 col-sm-12 col-md-6">
    <div class="block-content-agenda">
        <div class="row no-gutters">
            <div class="session-data-agenda col-4 col-sm-3 col-md-4">
                <div class="date">
                    <p>{{$row->title}}</p>
                    <p>{{$row->time_from}}  -  {{$row->time_to}}</p>
                </div>
            </div>
            <div class="agenda-data col-8 col-sm-9 col-md-8">
                <a href="{{route('site.events.talk.vote',$row->id)}}" class="vote-agenda">Rate</a>
                <div class="block-name">
                    @foreach($row->speakers as $speaker)
                    <span>Dr: {{$speaker->name}}</span>
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                </div>
                <div class="block-data">
                    {!! $row->desc !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
