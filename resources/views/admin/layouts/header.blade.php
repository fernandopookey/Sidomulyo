<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            {{-- <a href="#" class="d-block" style="text-decoration: none">{{ Auth::user()->username }}</a> --}}
            <ul class="navbar-nav ml-auto">
                {{-- Logout --}}
                <li class="nav-item">
                    Hi, <button type="button" class="btn btn-outline-success"><b>{{ Auth::user()->username
                            }}</b></button>
                </li>
                <li class="nav-item d-flex">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="dropdown-item">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>