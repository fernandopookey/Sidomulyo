<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('admin-dashboard') }}" class="brand-link " style="text-decoration: none">
        <img src="/images/logocircle.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Sidomulyo</span>
    </a>

    <div class="sidebar mt-3">
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

                {{-- COMPONENT PAGE --}}

                <li class="nav-item">
                    <a href="#" class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}">
                        <p>
                            COMPONENT CONTENT
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/home_text_content"
                                class="nav-link {{ (request()->is('admin/home_text_content')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Teks Halaman Utama
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/navbar_content"
                                class="nav-link {{ (request()->is('admin/navbar_content')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Konten Navbar
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/sosmed_footer"
                                class="nav-link {{ (request()->is('admin/sosmed_footer')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Footer
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ (request()->is('admin/floating')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Floating Button
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/modalHome"
                                class="nav-link {{ (request()->is('admin/modalHome')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Modal Halaman Utama
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- CV PAGE --}}
                <li class="nav-item">
                    <a href="#" class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}">
                        <p>
                            CV PAGE
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('product-category.index') }}"
                                class="nav-link {{ (request()->is('admin/product-category')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-product') }}"
                                class="nav-link {{ (request()->is('admin/product')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/homecontent"
                                class="nav-link {{ (request()->is('admin/homecontent')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Link Halaman Utama
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('slider.index') }}"
                                class="nav-link {{ (request()->is('admin/slider')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Slider
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('client.index') }}"
                                class="nav-link {{ (request()->is('admin/client')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Halaman Client
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog.index') }}"
                                class="nav-link {{ (request()->is('admin/blog')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Blog
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/admin/profile"
                                class="nav-link {{ (request()->is('admin/profile')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Profil Perusahaan
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/admin/facilityandmachine"
                                class="nav-link {{ (request()->is('admin/facilityandmachine')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Fasilitias Dan Mesin
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('facility.index') }}"
                                class="nav-link {{ (request()->is('admin/facility')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Fasilitas
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('machine.index') }}"
                                class="nav-link {{ (request()->is('admin/machine')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Mesin
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('installation.index') }}"
                                class="nav-link {{ (request()->is('admin/installation')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Pemasangan
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- MANAGEMENT USER PAGE --}}
                <li class="nav-item">
                    <a href="#" class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}">
                        <p>
                            MANAGEMENT USER
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}"
                                class="nav-link {{ (request()->is('admin/user')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="{{route('paymentConfirmation.index') }}"
                                class="nav-link {{ (request()->is('admin/paymentConfirmation')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Konfirmasi Pembayaran
                                </p>
                            </a>
                        </li> --}}

                        <li class="nav-item">
                            <a href="{{route('transaction.index') }}"
                                class="nav-link {{ (request()->is('admin/transaction')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Transaksi User
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- SYSTEM --}}
                <li class="nav-item">
                    <a href="#" class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}">
                        <p>
                            SYSTEM
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
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
                </li>
            </ul>
        </nav>

    </div>

</aside>