@extends('site.layouts.master')

@section('title','Edit Account')

@section('content')
    <main class="content__main">
        <div class="home">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 col-sm-12">
                        <div class="block-content-d">
                            <div class="block-data w-100">
                                <div class="block-name pl-3 pr-3  d-flex justify-content-between">
                                    <h4 class="pt-4">Edit Account</h4>
                                    <a href="{{route('site.editAccountPassword')}}" class="mt-4 p-2 primary-button">Change Password</a>

                                </div>
                                <form method="post" action="{{route('site.updateAccount')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <hr class="w-100">
                                        </div>

                                    </div>
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
                                    <div class="row pr-4 pl-4">
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <input type="text" name="name" value="{{$auth_user->name}}" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="row pr-4 pl-4">
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <input type="text" name="email" value="{{$auth_user->email}}" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="row pr-4 pl-4">
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="change-photo">Change Profile Photo</label>
                                                <input type="file" name="photo" class="form-control-file" id="change-photo" style="padding-top: 2px;">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row pr-4 pl-4">
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <button type="submit" class="btn primary-button mt-3 w-100 p-3">Change Account</button>
                                        </div>
                                    </div>
                                </form>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
