@extends('admin.layouts.master')

@section('title','Events')

@section('content')
    <div class="main-content">
        <h1 class="page-title">Events</h1>
        <!-- Breadcrumb -->
        <ol class="breadcrumb breadcrumb-2">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
            <li class="active"><strong>Events</strong></li>
        </ol>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    @if (auth()->user()->type == 1)
                    <div class="panel-heading clearfix">
                        <a href="{{route('admin.events.create',$company->id)}}" class="btn btn-primary" style="float: right;">Add Event</a>
                    </div>
                    @endif
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
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Company Name</th>
                                    <th>City</th>
                                    <th>Status</th>
{{--                                    <th>will attend</th>--}}
{{--                                    <th>will not attend</th>--}}
                                    <th>Features</th>
                                    <th>Registration Link</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rows as $row)
                                    <tr class="gradeX">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->start_date}}</td>
                                        <td>{{$row->end_date}}</td>
                                        <td>{{$row->company->name}}</td>
                                        <td>{{$row->city}}</td>
                                        <td>
                                            <span class="badge badge-{{ $row->active == 1 ? 'success' : 'danger' }}">{{ $row->active == 1 ? 'Active' : 'DisActive'}}</span>
                                        </td>
{{--                                        <td>{{$row->users()->where('attended',1)->count()}}</td>--}}
{{--                                        <td>{{$row->users()->where('attended',0)->count()}}</td>--}}
                                        <td>
                                            <a href="{{route('admin.days.index',$row->id)}}" class="btn btn-primary btn-rounded">Days</a>
                                            <a href="{{route('admin.speakers.index',$row->company->id)}}" class="btn btn-success btn-rounded">Speakers</a>
                                        </td>
                                        <td>
                                            <a href="{{route('site.register',$row->company->token)}}">{{route('site.register',$row->company->token)}}</a>
                                        </td>
                                        <td class="size-80">
                                            <div class="dropdown">
                                                <a href="" data-toggle="dropdown" class="more-link"><i class="icon-dot-3 ellipsis-icon"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="{{route('admin.events.edit',[$row->company->id,$row->id])}}">Edit</a></li>
                                                    @if (auth()->user()->type == 1)
                                                        <li><a href="{{route('admin.events.destroy',[$row->company->id,$row->id])}}">Delete</a></li>
                                                    @endif
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
