<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('admin-dashboard') }}" class="brand-link" style="text-decoration: none">
        <img src="/images/logocircle.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">CS Sidomulyo</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- <img src="assets/user/{{ Auth::user()->photos }}" class="img-circle elevation-2" alt="User Image">
                --}}
                {{-- <img src="{{ Storage::disk('local')->url($slider->photos) }}" width="150" class="pt-4" alt=""> --}}
                {{-- <img src="{{ url('images/banner1.jpg') }}" class="img-circle elevation-2" alt="User Image"> --}}
                {{-- <img src="{{ url(Auth::user()->photos) }}" class="img-circle elevation-2" alt="User Image"> --}}
                {{-- <img src="{{ auth()->user()->photos }}" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
                <a href="#" class="d-block text-center" style="text-decoration: none">{{ Auth::user()->username }}</a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin-dashboard') }}"
                        class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('service.index') }}"
                        class="nav-link {{ (request()->is('admin/service')) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Service</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('message.index') }}"
                        class="nav-link {{ (request()->is('admin/message')) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pesan</p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="{{ route('product.index') }}"
                        class="nav-link {{ (request()->is('admin/product')) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Produk</p>
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="{{ route('installation.index') }}"
                        class="nav-link {{ (request()->is('admin/installation')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-person-booth"></i>
                        <p>
                            Pemasangan
                        </p>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="dropdown-item">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>

    </div>

</aside>