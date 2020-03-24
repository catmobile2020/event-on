<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>{{$title}}</title>
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
                        <div class="col-xl-12 col-lg-12 mx-auto">
                            <div class="col-sm-10 mx-auto">
                                {!! $row->value !!}
                            </div>
                            <div class="form--group mt-3">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-6">
                                        <a href="{{route('site.login')}}" class="btn btn-dark mt-3 w-100 p-3">Back To Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

