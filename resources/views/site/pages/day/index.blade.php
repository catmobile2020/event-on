@extends('site.layouts.master')

@section('title','Agenda')

@section('content')
    <main class="content__main">
        <div class="home">

            <div class="container">

                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <select class="filter-agenda changeDayTalks" name="day_id">
                            @foreach($days as $day)
                                <option value="{{$day->id}}">{{$day->title}} {{$day->date}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="insertDayTalks">
                        @include('site.pages.day.talk')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')
<script>
    $(document).on('change','.changeDayTalks',function (e) {
        let day = $(this).val();
        $.ajax({
            data:{day_id:day},
            success:function (result) {
                $('#insertDayTalks').html(result);
            },
            error:function (errors) {
                console.log(errors);
            }
        });
    });
</script>
@endsection
