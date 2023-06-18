<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin-dashboard') }}" class="brand-link">
        <img src="/images/logocircle.png" alt="Sidomulyo Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Sidomulyo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline mt-4">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('admin-dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">COMPONENT CONTENT</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Component Content
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/home_text_content" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Teks Halaman Utama</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/navbar_content" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kontent Navbar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/sosmed_footer" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Footer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/background_image" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Background Image</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/modalHome" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Modal Halaman Utama</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Floating Button
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/first_floating" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Floating Button 1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/second_floating" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Floating Button 2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/third_floating" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Floating Button 3</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/fourth_floating" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Floating Button 4</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            E-Commerce
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">
                            <a href="/admin/first_floating" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kupon</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="/admin/pengiriman" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengiriman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product-category.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-product') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('faqs.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FAQs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('privacyPolicy.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Privacy Policy</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('termsAndConditions.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Terms And Conditions</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">COMPANY PROFILE</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Company Profile
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/homecontent" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Link Halaman Utama</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('slider.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('client.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Halaman Client</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/profile" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profil Perusahaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/facilityandmachine" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fasilitas Dan Mesin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('facility.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fasilitas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('machine.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mesin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('installation.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pemasangan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">MANAGEMENT USER</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Management User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transaction.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transaksi User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">SYSTEM</li>
                <li class="nav-item">
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
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>