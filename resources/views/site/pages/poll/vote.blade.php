<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Vote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="submitFormData" action="{{route('site.polls.addVote',$poll->id)}}" method="post">
            @csrf
            <div class="alert alert-info sr-only insertResult"></div>
            <div class="card-body">
                <div class="block-content p-4 pt-0 mt-0">
                    <p>
                        {{$poll->question}}
                    </p>
                    @foreach($poll->options as $option)
                        <div class="inputGroup">
                            <input id="{{$option->option}}" name="poll_option_id" value="{{$option->id}}" type="radio"/>
                            <label for="{{$option->option}}">{{$option->option}}</label>
                        </div>
                    @endforeach
                    <input type="submit" VALUE="VOTE NOW" class="btn btn-submit">
                </div>
            </div>
        </form>
    </div>
</div>
