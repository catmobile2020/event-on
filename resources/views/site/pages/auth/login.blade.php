<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login | Event On</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
</head>
<body>
<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-xl-6 col-lg-6 col-md-1 d-none d-md-flex bg-image"></div>

        <!-- The content half -->
        <div class="col-xl-6 col-lg-6 col-md-11 ">
            <div class="login d-flex align-items-center py-5">
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
                            <form method="post">
                                @csrf
                                <div class="col-sm-10 mx-auto">
                                    <h1 class="logo text-center"><strong>Event</strong><span>On</span></h1>
                                    <p class="text-muted mb-5 text-center">Welcome back! Please login to your account.</p>
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="text" name="email" id="email">
                                    </div>
                                    <div class="form--group">
                                        <label for="email">Password</label>
                                        <input type="password" name="password" id="password">
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="remember_me" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                            </div>
                                            <router-link to="/auth/forgot-password" class="reset_password">Reset Password</router-link>
                                        </div>
                                    </div>
                                    <div class="form--group mt-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-dark mt-3 w-100 p-3">Log In</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

