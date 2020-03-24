@extends('site.layouts.master')

@section('title','Faq Questions')

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 col-sm-9">
                        <div class="accordion mt-4" id="accordionExample">
                            @foreach($rows as $row)
                            <div class="card">
                                <div class="card-header" id="{{$loop->iteration}}">
                                    <h2 class="mb-0" type="button" data-toggle="collapse" data-target="#{{$loop->iteration}}" aria-expanded="{{$loop->first ? 'true' : 'false'}}" aria-controls="{{$loop->iteration}}">
                                        <button class="btn btn-link" >
                                            {{$row->question}}
                                        </button>

                                    </h2>
                                </div>

                                <div id="{{$loop->iteration}}" class="collapse {{$loop->first ? 'show' : ''}}" aria-labelledby="{{$loop->iteration}}" data-parent="#accordionExample">
                                    <div class="card-body">
                                        {!! $row->answer !!}
                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
