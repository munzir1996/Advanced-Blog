<nav class="navbar has-shadow">

    <div class="container">
        <div class="navbar-start">
            <a class="navbar-item" href="{{route('home')}}">
                Advanced Blog
            </a>
            <a href="#" class="navbar-item is-tab is-hidden-mobile m-l-10">Learn</a>
            <a href="#" class="navbar-item is-tab is-hidden-mobile">Discuss</a>
            <a href="#" class="navbar-item is-tab is-hidden-mobile">Share</a>
        </div>
        <div class="navbar-end" style="overflow:visible;">
            @if(Auth::guest())
            <a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
            <a href="{{route('register')}}" class="navbar-item is-tab">Join the Community</a>
            @else
            <button class="dropdown is-aligned-right navbar-item is-tab">
                {{Auth::user()->name}} <span class="icon"><i class="fa fa-caret-down"></i></span>

                <ul class="dropdown-menu">
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fa fa-fw m-r-5 fa-user-circle-o"></i></span>
                            Profile</a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fa fa-fw m-r-5 fa-bell"></i></span>
                            Notifications</a>
                    </li>
                    <li>
                        <a href="{{route('manage.dashboard')}}">
                            <span class="icon"><i class="fa fa-fw m-r-5 fa-cog"></i></span>
                            Manage</a>
                    </li>
                    <li class="seperator"></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="icon"><i class="fa fa-fw m-r-5 fa-sign-out"></i></span>
                            Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </button>
            @endif
        </div>
    </div>

</nav>
