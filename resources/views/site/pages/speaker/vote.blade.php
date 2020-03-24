@extends('site.layouts.master')

@section('title')
    {{$speaker->name}}
@endsection

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 col-sm-6">
                        <div class="block-content-speaker">
                            <div class="d-flex justify-content-start">
                                <div class="session-data-speaker">
                                    <div class="date">
                                        <img src="{{$speaker->photo}}" alt="{{$speaker->name}}">
                                    </div>
                                </div>
                                <div class="speaker-data">
                                    <div class="block-name">
                                        <a href="{{route('site.speakers.show',$speaker->id)}}">{{$speaker->name}}</a>
                                    </div>
                                    <div class="block-data">
                                        <p>{{Str::limit(strip_tags($speaker->description),50)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (session()->has('message'))
                            <div class="col-12">
                                <div class="alert alert-info">
                                    <h4>{{session()->get('message')}}</h4>
                                </div>
                            </div>
                        @endif
                        @if ($was_voted)
                            <div class="col-12">
                                <div class="alert alert-success">
                                    <h4>You Are Voted This Before!</h4>
                                </div>
                            </div>
                         @else
                            <form method="post">
                                @csrf
                                <div class="col-12">
                                    <fieldset class="rating">
                                        <input type="radio" id="star5" name="rate" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                        <input type="radio" id="star4half" name="rate" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                        <input type="radio" id="star4" name="rate" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                        <input type="radio" id="star3half" name="rate" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                        <input type="radio" id="star3" name="rate" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                        <input type="radio" id="star2half" name="rate" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                        <input type="radio" id="star2" name="rate" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                        <input type="radio" id="star1half" name="rate" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                        <input type="radio" id="star1" name="rate" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                        <input type="radio" id="starhalf" name="rate" value=".5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                    </fieldset>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="comment" rows="3" placeholder="Your Feedback"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-submit w-100"> submit</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>



                </div>
            </div>
        </div>
    </main>
@endsection
