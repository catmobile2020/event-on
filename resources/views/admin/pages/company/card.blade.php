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
                    <div class="panel-body">
                        @foreach($rows as $row)
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="col-lg-6">{{$row->name}}</div>
                                        <div class="col-lg-6 text-right">
                                            <span class="badge badge-{{ $row->active == 1 ? 'success' : 'danger' }}">{{ $row->active == 1 ? 'Active' : 'DisActive'}}</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="{{route('admin.companies.edit',$row->id)}}">Edit</a>
                                            <a href="{{route('admin.companies.destroy',$row->id)}}">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {!! $rows->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
