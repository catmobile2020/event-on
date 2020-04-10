<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Answer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="submitFormData" action="{{route('site.questions.addAnswer',$question->id)}}" method="post">
            @csrf
            <div class="alert alert-info sr-only insertResult"></div>
            <div class="col-12">
            <div class="block-content p-4">
                <p>
                   {{$question->question}}
                </p>
                <div class="col-12 p-0 m-0">
                    <div class="form-group">
                        <textarea class="form-control" name="answer" rows="3" placeholder="Answer"></textarea>
                    </div>
                </div>
                <input type="submit" VALUE="Submit" class="btn btn-submit">
            </div>
        </div>
        </form>
    </div>
</div>
