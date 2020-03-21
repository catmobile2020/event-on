<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register | Event On</title>
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
                                    <p class="text-muted mb-5 text-center">{{$company->name}} Register Now</p>
                                    <div class="form--group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" required>
                                    </div>
                                    <div class="form--group">
                                        <label for="email">Email Address</label>
                                        <input type="text" name="email" id="email" required>
                                    </div>
                                    <div class="form--group">
                                        <label for="Country">Country</label>
                                        <select name="country_id" id="Country">
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form--group">
                                        <label for="phone">phone</label>
                                        <input type="text" name="phone" id="phone" required>
                                    </div>
                                    <div class="form--group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" required>
                                    </div>
                                    <div class="form--group mt-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-dark mt-3 w-100 p-3">Register Now</button>
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

