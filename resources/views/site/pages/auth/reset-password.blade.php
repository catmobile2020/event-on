<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password | Event On</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
</head>
<body>
<div class="container-fluid p-0">
    <div class="row no-gutters">

        <!-- The content half -->
        <div class="col-xl-6 col-lg-6 col-md-11 ">
            <div class="login d-flex justify-content-between py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-12 mx-auto">
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
                            <div class="col-sm-10 mx-auto">
                                <form method="post">
                                    @csrf
                                    <div class="logo text-center">
                                        <img src="{{asset('assets/site/images/logo.png')}}" class="img-fluid" alt="">
                                    </div>
                                    <p class="text-muted mb-5 text-center">Reset Password</p>
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" autocomplete placeholder="Email Address">
                                    </div>
                                    <div class="form--group mt-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn primary-button mt-3 w-100 p-3">Reset Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="form--group mt-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{route('site.login')}}" class="btn primary-button mt-3 w-100 p-3">Back To Login</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <hr>
                                <br>
                                <br>
                                <div class="form--group mt-5">
                                    <div class="row no-gutters">
                                        <div class="col-6 text-left">
                                            <a href="{{route('site.terms')}}" class="p-3">Terms and Conditions</a>
                                        </div>
                                        <div class="col-6 text-right">
                                            <a href="{{route('site.privacy')}}" class="p-3">Privacy Policy</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- The image half -->
        <div class="col-xl-6 col-lg-6 col-md-1 d-none d-md-flex ">
            <div class="p-5 w-100">
                <div class="bg-image w-100 h-100"></div>
            </div>
        </div>

    </div>
</div>
</body>
</html>

