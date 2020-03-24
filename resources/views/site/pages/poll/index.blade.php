@extends('site.layouts.master')

@section('title','Polls')

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-12">
                        <div class="block-content-speaker p-4">
                            <div class="d-flex justify-content-between">
                                <h5>
                                    <strong>Vote List</strong>
                                </h5>
                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenter">Add Vote</button>
                            </div>
                            <hr class="w-100">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session()->has('message'))
                                <div class="alert alert-info">
                                    <h4>{{session()->get('message')}}</h4>
                                </div>
                            @endif
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Questions</th>
                                    <th scope="col">Options</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rows as $row)
                                    <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$row->question}}</td>
                                    <td>
                                        @foreach($row->options as $option)
                                        <span class="badge badge-secondary">{{$option->option}}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{route('site.polls.destroy')}}" class="badge badge-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Vote</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post">
                                        @csrf
                                        <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="Question">Question</label>
                                                    <textarea class="form-control" name="question" id="Question" rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-sm btn-primary add_more_button">Add More Answer</button>
                                                </div>
                                                <div class="form-group more-fields">
                                                    <input type="text" name="options[]" placeholder="Answer">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var max_fields_limit      = 10;
            var x = 1;
            $('.add_more_button').click(function(e){
                e.preventDefault();
                if(x < max_fields_limit){
                    x++;
                    $('.more-fields').append('<div><input type="text" name="options" placeholder="Answer"/><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>'); //add input field
                }
            });
            $('.more-fields').on("click",".remove_field", function(e){
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
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
    </style>
@endsection
