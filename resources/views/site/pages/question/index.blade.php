@extends('site.layouts.master')

@section('title','Questions')

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-12">
                        <div class="block-content-speaker p-4">
                            <div class="d-flex justify-content-between">
                                <h5>
                                    <strong>Questions List</strong>
                                </h5>
                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenter">Add Qusetion</button>
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
                                    <th scope="col">Question</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rows as $row)
                                    <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$row->question}}</td>
                                    <td>
{{--                                        <a href="#" class="badge badge-primary">Edit</a>--}}
                                        <a href="{{route('site.questions.destroy')}}" class="badge badge-danger">Delete</a>
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
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Question</h5>
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
