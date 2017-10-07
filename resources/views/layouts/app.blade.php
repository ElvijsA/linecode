<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} {{ app()->version() }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
    		<nav class="navbar has-shadow">
            	<div class="container">
				<div class="nav-left">
					<a class="nav-item brand" href="{{route('home')}}">
						<img src="{{asset('images/logo.png')}}" alt="ECODEWS Logo" />
					</a>
					<a href="#" class="nav-item is-tab is-hidden-mobile m-l-20">HOME</a>
					<a href="#" class="nav-item is-tab is-hidden-mobile">BLOG</a>
					<a href="#" class="nav-item is-tab is-hidden-mobile">CONTACT</a>
				</div>
				<div class="nav-right" style="overflow: visible;">
					@if (Auth::guest())
                    	<a class="nav-item is-tab" href="{{ route('login') }}">Login</a>
                    	<a class="nav-item is-tab" href="{{ route('register') }}">Register</a>
                    @else
						<button class="dropdown nav-item is-aligned-right is-tab">
							Hey .. <span class="icon"><i class="fa fa-caret-down"></i></span>

							<ul class="dropdown-menu">
								<li><a href="#">
                                <span class="icon"><i class="fa m-r-10 fa-fw fa-user-circle-o"></i></span>
                                Profile</a></li>
								<li><a href="#">
                                <span class="icon"><i class="fa m-r-10 fa-fw fa-bell"></i></span>
                                Notifications</a></li>
								<li><a href="#">
                                <span class="icon"><i class="fa m-r-10 fa-fw fa-cog"></i></span>
                                Settings</a></li>
								<li class="seperator"></li>
								<li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <span class="icon"><i class="fa m-r-10 fa-fw fa-sign-out"></i></span>
                                Logout</a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
							</ul>
						</button>
					@endif
				</div>
				</div>
			</nav>



 <!--<nav class="navbar has-shadow">
                <div class="container">

                    
                    <div class="navbar-brand">
                        <a href="{{ url('/') }}" class="navbar-item">{{ config('app.name', 'Laravel') }}</a>

                        <div class="navbar-burger burger" data-target="navMenu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                    <div class="navbar-menu" id="navMenu">
                        <div class="navbar-start"></div>

                        <div class="navbar-end">
                            @if (Auth::guest())
                                <a class="navbar-item " href="{{ route('login') }}">Login</a>
                                <a class="navbar-item " href="{{ route('register') }}">Register</a>
                            @else
                                <div class="navbar-item has-dropdown is-hoverable">
                                    <a class="navbar-link" href="#">{{ Auth::user()->name }}</a>

                                    <div class="navbar-dropdown">
                                        <a class="navbar-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>-->
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
