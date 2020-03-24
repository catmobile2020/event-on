<aside>
    <div class="logo">
        <img src="{{auth()->user()->company->logo}}" class="img-fluid" alt="{{auth()->user()->company->name}}">
    </div>
    <a href="#">My Account</a>
    <a href="{{route('site.events.myCalender')}}">Calendar</a>
    <a href="{{route('site.about')}}">About</a>
    <a href="{{route('site.faqs')}}">FAQ</a>
    <a href="{{route('site.logout')}}">Log Out</a>
</aside>
