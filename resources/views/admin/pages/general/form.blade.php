@extends('admin.layouts.master')

@section('title')
    {{$title}}
@endsection

@section('css')
    <link href="{{asset('assets/admin/css/plugins/summernote/summernote.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <!-- Breadcrumb -->
        <ol class="breadcrumb breadcrumb-2">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
            <li class="active"><strong>{{$title}}</strong></li>
        </ol>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <ul class="panel-tool-options">
                            <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
                            <li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
                            <li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
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
                        <form action="{{route('admin.generals.update',$general->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @if ($general->type == 3)
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="photo">photo</label>
                                        <input type="file" name="photo" class="form-control" id="photo">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <img src="{{$general->photo}}" style="height: 200px;width: auto">
                                </div>
                            @endif
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="summernote">Content</label>
                                    <textarea name="value" class="form-control ui-helper-hidden-accessible" id="summernote" >{!! $general->value !!}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!--Summernote Editor-->
    <script src="{{asset('assets/admin/js/plugins/summernote/summernote.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#summernote').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['fontsize', 'bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['color', ['color']],
                    ['para', ['style', 'ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['Misc', ['fullscreen', 'codeview', 'undo', 'redo']],
                    ['insert', ['table', 'hr']]
                ],
                height: 260,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true                  // set focus to editable area after initializing summernote
            });

            $('.ui-helper-hidden-accessible').hide();


        });



    </script>
@endsection
