<header class="content__header">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <img src="{{auth()->user()->company->logo}}" width="180px" class="img-fluid" alt="{{auth()->user()->company->logo}}">
            </div>
            <div class="back-to d-flex justify-content-between">
                <div class="actions pr-3 pl-3">
                    <a href="{{route('site.profile')}}">
                        <span>Welcome Dr {{auth()->user()->name}}</span>
                        <img src="{{auth()->user()->photo}}" style="height: 55px" class="pl-3" alt="{{auth()->user()->name}}">
                    </a>
                </div>
                <a href="notification.html" class="">
                    <i class="fas fa-bell black size-20 pr-3 pl-3"></i>
                </a>
                <a href="{{route('site.logout')}}" class="">
                    <i class="fas fa-sign-out-alt black size-20 pr-3 pl-3"></i>
                </a>
            </div>
        </div>
    </div>
</header>

<section class="header-list-page">
    <div class="container">
        <div class="d-flex justify-content-between">
            <a href="{{route('site.home')}}">
                <div class="name border-right">
                    <span>Home</span>
                </div>
            </a>
            <a href="{{route('site.about')}}">
                <div class="name border-right">
                    <span>About</span>
                </div>
            </a>
            <a href="{{route('site.events.schedule')}}">
                <div class="name border-right">
                    <span>Schedule</span>
                </div>
            </a>
            <a href="{{route('site.events.index')}}">
                <div class="name">
                    <span>My Events</span>
                </div>
            </a>
        </div>
    </div>
</section>
