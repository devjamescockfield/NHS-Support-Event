<nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                <nav class="pull">
                    <ul class="top-nav">
                        @if(\Request::is('contact/*') || \Request::is('contact'))
                            <li><a href="{{ url('/') }}">Home <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                        @else
                            <li><a href="#about">About The Event <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                            <li><a href="#important-links">Important Links <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                            <li><a href="#routes">Routes <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                            <li><a href="#team">Team <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                            <li><a href="#contact">Contact Us <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                        @endif
                        @if(!\Illuminate\Support\Facades\Auth::guest())
                            <li><a href="{{ route('contact.contact.index') }}">Your Contact Tickets <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                        @endif
                        @can('Staff Dashboard')
                            <li><a href="{{ route('admin.staff.index') }}">Staff Area <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                        @endcan
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
                                    {{ Auth::user()->name }}
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
                </nav>
            </div>
        </div>
    </div>
</nav>
