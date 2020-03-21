<!DOCTYPE html>
<html lang="en">
<head>
    <title>Meetings</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="container">
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
    <h2>Create Meeting</h2>
    <form class="form-horizontal" method="post">
        @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Meeting Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="Meeting Name" name="name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="start_date">Start Date</label>
                <div class="col-sm-10">
                    <input type="datetime-local" class="form-control" id="start_date" placeholder="Start Date" name="start_date">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Create</button>
                </div>
            </div>
        </form>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Meeting Name</th>
            <th>Link</th>
            <th>Meeting Id</th>
            <th>Start Date</th>
            <th>Created By</th>
            <th>Open</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rows as $row)
        <tr>
            <td>{{$row->name}}</td>
            <td>
                <a target="_blank" href="{{$row->zoom_link}}" class="btn btn-primary">{{$row->zoom_link}}</a>
            </td>
            <td>{{$row->meeting_id}}</td>
            <td>{{$row->start_date->format('d/m/Y h:i A')}}</td>
            <td>{{$row->user->name}}</td>
            <td>
                <a target="_blank" href="{{route('zoom.show',$row->id)}}" class="btn btn-primary">Open</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
