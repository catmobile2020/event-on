<!-- Page Sidebar -->
<div class="page-sidebar">

    <!-- Site header  -->
    <header class="site-header">
        <div class="site-logo">
            <a href="{{route('admin.home')}}">Event ON
                {{--                <img src="{{asset('assets/admin/images/logo.png')}}" title="Event ON " width="150">--}}
            </a>
        </div>
        <div class="sidebar-collapse hidden-xs"><a class="sidebar-collapse-icon" href="#"><i class="icon-menu"></i></a></div>
        <div class="sidebar-mobile-menu visible-xs"><a data-target="#side-nav" data-toggle="collapse" class="mobile-menu-icon" href="#"><i class="icon-menu"></i></a></div>
    </header>
    <!-- /site header -->

    <!-- Main navigation -->
    <ul id="side-nav" class="main-menu navbar-collapse collapse">

        <li class="{{Route::is('admin.home') ? 'active' : ''}}">
            <a href="{{route('admin.home')}}">
                <i class="icon-gauge"></i><span class="title">Dashboard</span>
            </a>
        </li>

        <li class="{{Route::is('admin.companies.*') ? 'active' : ''}}">
            <a href="{{route('admin.companies.index')}}">
                <i class="fa fa-database"></i><span class="title">Companies</span>
            </a>
        </li>

        <li class="{{Route::is('admin.countries.*') ? 'active' : ''}}">
            <a href="{{route('admin.countries.index')}}">
                <i class="fa fa-building"></i><span class="title">Countries</span>
            </a>
        </li>

{{--        <li class="{{Route::is('admin.posts.*') ? 'active' : ''}}">--}}
{{--            <a href="{{route('admin.posts.index')}}">--}}
{{--                <i class="fa fa-book"></i><span class="title">Posts</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="{{Route::is('admin.polls.*') ? 'active' : ''}}">--}}
{{--            <a href="{{route('admin.polls.index')}}">--}}
{{--                <i class="fa fa-pie-chart"></i><span class="title">Voting</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="{{Route::is('admin.practices.*') ? 'active' : ''}}">--}}
{{--            <a href="{{route('admin.practices.index')}}">--}}
{{--                <i class="fa fa-edit"></i><span class="title">Clinical Practice</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="{{Route::is('admin.settings.*') ? 'active' : ''}}">--}}
{{--            <a href="{{route('admin.settings.index')}}">--}}
{{--                <i class="fa fa-tasks"></i><span class="title">Settings</span>--}}
{{--            </a>--}}
{{--        </li>--}}

    </ul>
    <!-- /main navigation -->
</div>
<!-- /page sidebar -->
