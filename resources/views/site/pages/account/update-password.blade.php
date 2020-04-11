@extends('site.layouts.master')

@section('title','Account')

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
                                    <a href="{{route('site.editAccount')}}" class="mt-4 p-2 primary-button">Edit Account</a>

                                </div>
                                <form method="post" action="{{route('site.updateAccountPassword')}}">
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
                                            <input type="password" name="current_password" placeholder="Current Password">
                                        </div>
                                    </div>
                                    <div class="row pr-4 pl-4">
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <input type="password" name="password" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="row pr-4 pl-4">
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <input type="password" name="password_confirmation" placeholder="Re-New Password">
                                        </div>
                                    </div>
                                    <div class="row pr-4 pl-4">
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <button type="submit" class="btn primary-button mt-3 w-100 p-3">Change Password</button>
                                        </div>
                                    </div>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
