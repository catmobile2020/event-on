<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register | Event On</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
</head>
<body>
<div class="container-fluid p-0">
    <div class="row no-gutters">
        <!-- The content half -->
        <div class="col-xl-6 col-lg-6 col-md-11 ">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-12 mx-auto">
                            <div class="col-sm-10 mx-auto">
                                <div class="logo text-center">
                                    <img src="{{asset('assets/site/images/logo.png')}}" class="img-fluid" alt="">
                                </div>
                                <p class="text-muted mb-5 text-center">{{$company->name}} Register Now</p>
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
                                    <div class="form--group">
                                        <input type="text" name="name" placeholder="Name" autocomplete="off">
                                    </div>
                                    <div class="form--group">
                                        <input type="text" name="email" autocomplete="off" placeholder="Email">
                                    </div>
                                    <div class="form--group">
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="form--group">
                                        <input type="password" name="password_confirmation" autocomplete="off" placeholder="Confirm Password">
                                    </div>
                                    <div class="form--group">
                                        <select name="country_id" id="Country">
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form--group">
                                        <input type="number" name="phone" autocomplete="off" placeholder="Phone Number">
                                    </div>
                                    <div class="form--group">
                                        <input type="text" name="city" autocomplete="off" placeholder="City">
                                    </div>
                                    <div class="form--group">
                                        <input type="text" name="specialty" autocomplete="off" placeholder="Specialty">
                                    </div>
                                    <div class="form--group">
                                        <input type="text" name="address" autocomplete="off" placeholder="Work Address" >
                                    </div>
                                    <div class="form--group mt-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn signup-button mt-3 w-100 p-3">Register Now</button>
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

