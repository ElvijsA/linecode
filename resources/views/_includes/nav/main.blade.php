<div class="container">
  <div class="top-nav">
    <div class="cont-left">
      <input class="input search" type="text" placeholder=""><a href="" class="button is-button"><i class="fa fa-search" aria-hidden="true"></i></a>
    </div>
    <div class="cont-right">
      <!--LOGGED PANEL START -->
      @if (Auth::guest())
        <a href="{{route('login')}}" class="button is-button">Login</a>
        <a href="{{route('register')}}" class="button is-button">Register</a>
      @else
        <button class="dropdown is-aligned-right nav-item is-tab is-button" >
          {{ Auth::user()->name }}<i class="fa fa-caret-down m-l-10" aria-hidden="true"></i>
          <ul class="dropdown-menu" style="overflow: visible;">
            <li><a href="#">
                  <span class="icon">
                    <i class="fa fa-fw fa-user-circle-o m-r-5"></i>
                  </span>Profile
                </a>
            </li>
            <li><a href="#">
                  <span class="icon">
                    <i class="fa fa-fw fa-bell m-r-5"></i>
                  </span>Notifications
                </a>
            </li>
            <li><a href="{{route('manage.dashboard')}}">
                  <span class="icon">
                    <i class="fa fa-fw fa-cog m-r-5"></i>
                  </span>Manage
                </a>
            </li>
            <li class="seperator"></li>
            <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                  <span class="icon">
                    <i class="fa fa-fw fa-sign-out m-r-5"></i>
                  </span>
                  Logout
                </a>
                @include('_includes.forms.logout')
            </li>
          </ul>
        </button>
      @endif
      <!--LOGGED PANEL END -->
    </div>
  </div>
</div>

<div class="container">
  <div class="header">
    <img class="logo" src="{{asset('images/logo-header.png')}}" alt="">
  </div>
</div>

  <nav class="main-nav">
    <ul>
      <a href="{{route('home')}}"><li class="{{ Request::is('home' , '/') ? "active" : "" }}">Home</li></a>
      <a href="{{route('blog')}}"><li class="{{ Request::is('blog') ? "active" : "" }}">Blog</li></a>
      <a href=""><li>About</li></a>
      <a href=""><li>Contact</li></a>
    </ul>
  </nav>
