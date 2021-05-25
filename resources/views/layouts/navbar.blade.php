<nav class="navbar navbar-marketing navbar-expand-lg bg-white navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand text-primary" href="{{ route('landing') }}">{{ config('app.slug') }}</a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i data-feather="menu"></i></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-lg-5">
                <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}">Home </a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{ route('lowongan') }}">Lowongan Pekerjaan </a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{ route('bkk', 6) }}">BKK </a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{ route('perusahaan') }}">Perusahaan </a></li> --}}
                @auth
                    <!-- User Dropdown-->
                    <li class="nav-item dropdown no-caret mr-3 mr-lg-0 dropdown-user">
                        <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="img-fluid" src="{{ asset('images/'.Auth::user()->photo) }}" /></a>
                        <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                            <h6 class="dropdown-header d-flex align-items-center">
                                <img class="dropdown-user-img" src="{{ asset('images/'.Auth::user()->photo) }}" />
                                <div class="dropdown-user-details">
                                    <div class="dropdown-user-details-name">{{ Auth::user()->nama }}</div>
                                    <div class="dropdown-user-details-email">{{ Auth::user()->email }}</div>
                                </div>
                            </h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('bkk.index') }}">
                                <div class="dropdown-item-icon"><i data-feather="activity"></i></div>
                                Dashboard
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Sign In </a></li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
