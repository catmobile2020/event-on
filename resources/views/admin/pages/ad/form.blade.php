@extends('admin.layouts.master')

@section('title','ads')

@section('css')
    <link href="{{asset('assets/admin/css/plugins/summernote/summernote.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <!-- Breadcrumb -->
        <ol class="breadcrumb breadcrumb-2">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
            <li class="active"><strong>ads</strong></li>
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
                        <form action="{{isset($ad->id) ? route('admin.ads.update',[$company->id,$ad->id]) : route('admin.ads.store',$company->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @isset($ad->id)
                                @method('PUT')
                            @endisset
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Status</label>
                                    <select class="form-control" name="active">
                                        <option value="1" {{$ad->active ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$ad->active ? '' : 'selected'}}>DisActive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Type</label>
                                    <select class="form-control changeType" name="is_image">
                                        <option value="1" {{$ad->is_image ? 'selected' : ''}}>Image</option>
                                        <option value="0" {{$ad->is_image ? '' : 'selected'}}>Video</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 videoType {{$ad->is_image ? 'sr-only' : ''}}">
                                <div class="form-group">
                                    <label for="video_url">video url</label>
                                    <input type="url" name="video_url" class="form-control" id="video_url" placeholder="https://www.youtube.com" value="{{$ad->video_url}}">
                                </div>
                            </div>
                            <div class="row photoType {{$ad->is_image ? '' : 'sr-only'}}">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="photo">Photo</label>
                                        <input type="file" name="photo" class="form-control" id="photo">
                                    </div>
                                </div>
                                @isset($ad->id)
                                    <div class="col-lg-6">
                                        <img src="{{$ad->photo}}" style="height: 200px;width: auto">
                                    </div>
                                @endisset
                            </div>
                            <div class="col-sm-8 col-sm-offset-4">
                                <a href="{{route('admin.ads.index',$company->id)}}" class="btn btn-white">Cancel</a>
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
    <script>
        $(document).on('change','.changeType',function () {
            let val_typ = $(this).val();
            if (val_typ == 1)
            {
                $('.videoType').addClass('sr-only');
                $('.photoType').removeClass('sr-only');
            }else
            {
                $('.videoType').removeClass('sr-only');
                $('.photoType').addClass('sr-only');
            }
        });
    </script>
@endsection
