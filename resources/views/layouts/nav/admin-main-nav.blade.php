<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/staff') }}">
            Events CMS
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @can('Administer Contact Forms')
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Contact Area
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('admin.contact-tickets.index')}}">
                                Contact Forms
                            </a>
                            @can('Administer Contact Statuses')
                                <a class="dropdown-item" href="{{route('admin.contact-statuses.index')}}">
                                    Statuses
                                </a>
                            @endcan
                            @can('Administer Contact Preset Messages')
                                <a class="dropdown-item" href="{{route('admin.contact-messages.index')}}">
                                    Preset Messages
                                </a>
                            @endcan
                        </div>
                    </li>
                @endcan
                @can('Administer Permissions')
                    <li class="nav-item ml-auto">
                        <a class="nav-link" href="{{route('admin.permissions.index')}}">Permissions</a>
                    </li>
                @endcan
                @can('Administer Roles')
                    <li class="nav-item ml-auto">
                        <a class="nav-link" href="{{route('admin.roles.index')}}">Roles</a>
                    </li>
                @endcan
                @can('Administer Users')
                    <li class="nav-item ml-auto">
                        <a class="nav-link" href="{{route('admin.users.index')}}">Manage Users</a>
                    </li>
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
        </div>
    </div>
</nav>
