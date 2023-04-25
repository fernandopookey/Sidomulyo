<body class="g-sidenav-show  bg-gray-200">
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
                target="_blank">
                <img src="images/iconcircle.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Sidomulyo</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('admin-dashboard') }}"
                        class="nav-link text-white {{ (request()->is('admin/dashboard*')) ? 'active bg-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-circle opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>

                {{-- CV PAGE --}}
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">E-COMMERCE</h6>
                </li>

                <li class="nav-item">
                    <a href="{{ route('product-category.index') }}"
                        class="nav-link text-white {{ (request()->is('admin/product-category')) ? 'active bg-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-circle opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Kategori Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin-product') }}"
                        class="nav-link text-white {{ (request()->is('admin/product')) ? 'active bg-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-circle opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Produk</span>
                    </a>
                </li>

                {{-- CV PAGE --}}
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">CV PAGE
                    </h6>
                </li>

                <li class="nav-item">
                    <a href="{{ route('blog.index') }}"
                        class="nav-link text-white {{ (request()->is('admin/blog')) ? 'active bg-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-circle opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Blog</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('client.index') }}"
                        class="nav-link text-white {{ (request()->is('admin/client')) ? 'active bg-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-circle opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Client</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('facility.index') }}"
                        class="nav-link text-white {{ (request()->is('admin/facility')) ? 'active bg-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-circle opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Fasilitas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('machine.index') }}"
                        class="nav-link text-white {{ (request()->is('admin/machine')) ? 'active bg-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-circle opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Mesin</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/facilityandmachine" class="nav-link text-white">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-circle opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Fasilitas & Mesin</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('installation.index') }}"
                        class="nav-link text-white {{ (request()->is('admin/installation')) ? 'active bg-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-circle opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pemasangan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/profile"
                        class="nav-link text-white {{ (request()->is('admin/profile')) ? 'active bg-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-circle opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profil Perusahan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('slider.index') }}"
                        class="nav-link text-white {{ (request()->is('admin/slider')) ? 'active bg-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-circle opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Slider</span>
                    </a>
                </li>

                {{-- COMPONENT PAGE --}}
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">LAINNYA</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="/admin/homecontent">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-circle opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">User Home Page</span>
                    </a>
                </li>

                {{-- MANAGEMENT PAGE --}}
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">MANAGEMENT USER
                    </h6>
                </li>

                <li class="nav-item">
                    <a href="{{ route('user.index') }}"
                        class="nav-link text-white {{ (request()->is('admin/user')) ? 'active bg-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-circle opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('paymentConfirmation.index') }}"
                        class="nav-link text-white {{ (request()->is('admin/paymentConfirmation')) ? 'active bg-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-circle opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Konfirmasi Pembayaran</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transaction.index') }}"
                        class="nav-link text-white {{ (request()->is('admin/transaction')) ? 'active bg-primary' : '' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-circle opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Transaksi Customer</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>