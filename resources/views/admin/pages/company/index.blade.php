@extends('admin.layouts.master')

@section('title','companies')

@section('content')
    <div class="main-content">
        <h1 class="page-title">companies</h1>
        <!-- Breadcrumb -->
        <ol class="breadcrumb breadcrumb-2">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
            <li class="active"><strong>companies</strong></li>
        </ol>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <a href="{{route('admin.companies.create')}}" class="btn btn-primary" style="float: right;">Add Company</a>
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
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>website</th>
                                    <th>active</th>
                                    <th>Features</th>
                                    <th>Registration Link</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rows as $row)
                                    <tr class="gradeX">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->website}}</td>
                                        <td>
                                            <span class="badge badge-{{ $row->active == 1 ? 'success' : 'danger' }}">{{ $row->active == 1 ? 'Active' : 'DisActive'}}</span>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.events.index',$row->id)}}" class="btn btn-primary btn-rounded">Events</a>
                                            <a href="{{route('admin.speakers.index',$row->id)}}" class="btn btn-success btn-rounded">Speakers</a>
                                            <a href="{{route('admin.faqs.index',$row->id)}}" class="btn btn-danger btn-rounded">Faqs</a>
                                            <a href="{{route('admin.sliders.index',$row->id)}}" class="btn btn-warning btn-rounded">Sliders</a>
                                            <a href="{{route('admin.ads.index',$row->id)}}" class="btn btn-info btn-rounded">Ads</a>
                                        </td>
                                        <td>
                                            <a href="{{route('site.register',$row->token)}}">{{route('site.register',$row->token)}}</a>
                                        </td>
                                        <td class="size-80">
                                            <div class="dropdown">
                                                <a href="" data-toggle="dropdown" class="more-link"><i class="icon-dot-3 ellipsis-icon"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="{{route('admin.companies.edit',$row->id)}}">Edit</a></li>
                                                    <li><a href="{{route('admin.companies.destroy',$row->id)}}">Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                {!! $rows->links() !!}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
