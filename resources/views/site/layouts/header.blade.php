<header class="content__header">
    <div class="container">
        <div class="d-flex justify-content-between">
            @if (Route::is('site.home'))
                <a href="{{route('site.logout')}}" class="logout">
                    <span class="fas fa-sign-out-alt white size-20 pr-2 pl-2"></span>
                </a>
            @else
                <a href="{{route('site.home')}}" class="back-to">
                    <i class="fas fa-chevron-left white size-20 pr-2 pl-2"></i>
                </a>
            @endif
            <div class="name_page">
                <span>@yield('title')</span>
            </div>
            <div class="actions">
                <div class="back-to-home pr-2 pl-2 d-none">
                    <i class="fas fa-home size-20"></i>
                </div>
                <div class="toggle-menu pr-2 pl-2">
                    <i class="fas fa-sliders-h size-20"></i>
                </div>
                <div class="notification pr-2 pl-2">
                    <i class="fas fa-bell size-20"></i>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="header-list-page">
    <div class="container">
        <div class="d-flex justify-content-between">
            <a href="{{route('site.events.myCalender')}}">
                <div class="name border-right">
                    <span>Calander</span>
                </div>
            </a>
            <a href="{{route('site.about')}}">
                <div class="name border-right">
                    <span>About</span>
                </div>
            </a>
            <a href="{{route('site.profile')}}">
                <div class="name">
                    <span>My Account</span>
                </div>
            </a>
        </div>
    </div>
</section>
