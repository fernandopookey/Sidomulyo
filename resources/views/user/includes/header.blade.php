<style>
    .cart-cart {
        color: black;
    }
</style>


<header id="pt-header">
    <div class="headerunderline" style="background-color: #c2c2c2">
        <div class="container-fluid">
            @foreach ($header as $item)
            <div class="pt-header-row pt-top-row no-gutters">
                <div class="pt-col-left col-3">
                    <div class="pt-box-info">
                        <ul>
                            <li>Hubungi Kami: <strong class="pt-base-dark-color">{{ $item->phone_number }}</strong></li>
                        </ul>
                        {{-- <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="dropdown-item">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li> --}}
                    </div>
                </div>
                <div class="pt-col-right col-3 ml-auto">
                    <div class="pt-desctop-parent-submenu pt-parent-box">
                        <ul class="submenu">
                            <li><a target="_blank" href="{{ $item->facebook_link }}">
                                    <span class="icon">
                                        <svg width="11" height="19" viewBox="0 0 11 19">
                                            <use xlink:href="#icon-social_icon_facebook"></use>
                                        </svg>
                                    </span>
                                    <span class="text">{{ $item->facebook_title }}</span>
                                </a></li>
                            <li><a target="_blank" href="{{ $item->twiter_link }}">
                                    <span class="icon">
                                        <svg width="18" height="18" viewBox="0 0 18 18">
                                            <use xlink:href="#icon-social_icon_1"></use>
                                        </svg>
                                    </span>
                                    <span class="text">{{ $item->twiter_title }}</span>
                                </a></li>
                            <li><a target="_blank" href="{{ $item->instagram_link }}">
                                    <span class="icon">
                                        <svg width="18" height="19" viewBox="0 0 18 19">
                                            <use xlink:href="#icon-social_icon_instagram"></use>
                                        </svg>
                                    </span>
                                    <span class="text">{{ $item->instagram_title }}</span>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- pt-mobile menu -->
    <nav class="panel-menu mobile-main-menu">
        <ul>
            <li>
                <a href="{{ route('home') }}">HOME</a>
            </li>
            <li>
                <a href="{{ route('client') }}">OUR CLIENT</a>
            </li>
            <li>
                <a href="{{ route('product') }}">PRODUK</a>
            </li>
            <li>
                <a href="#">PROFIL</a>
                <ul>
                    <li>
                        <a href="{{ route('profile') }}">Profil</a>
                    </li>
                    <li>
                        <a href="{{ route('facilityandmachine') }}">Fasilitas Dan Mesin</a>
                    </li>
                    <li>
                        <a href="{{ route('facility') }}">Fasilitas</a>
                    </li>
                    <li>
                        <a href="{{ route('machine') }}">Mesin</a>
                    </li>
                    <li>
                        <a href="{{ route('installation') }}">Pemasangan</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('blog') }}">BLOG</a>
            </li>
            <li>
                <a href="#">KONFIRMASI PEMBAYARAN</a>
            </li>
        </ul>
        <div class="mm-navbtn-names">
            <div class="mm-closebtn">Close</div>
            <div class="mm-backbtn">Back</div>
        </div>
    </nav>
    <!-- pt-mobile-header -->
    <div class="pt-mobile-header" style="background: linear-gradient(to left, #33ccff 43%, #0000cc 100%);">
        <div class="container-fluid">
            <div class="pt-header-row">
                <!-- mobile menu toggle -->
                <div class="pt-mobile-parent-menu">
                    <div class="pt-menu-toggle" style="color: white;">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#icon-mobile-menu-toggle"></use>
                        </svg>
                    </div>
                </div>
                <!-- /mobile menu toggle -->
                <div class="pt-logo-container">
                    <!-- mobile logo -->
                    <div class="pt-logo pt-logo-alignment" itemscope itemtype="http://schema.org/Organization">
                        <a href="{{ route('home') }}" itemprop="url">
                            @foreach ($header as $item)
                            <h2 class="pt-title">
                                <img src="{{ Storage::url($item->logo) }}" width="120" alt="">
                            </h2>
                            @endforeach
                        </a>
                    </div>
                    <!-- /mobile logo -->
                </div>
                <!-- search -->
                <div class="pt-mobile-parent-search pt-parent-box"></div>
                <!-- /search -->
                <!-- cart -->
                <div class="pt-mobile-parent-cart pt-parent-box"></div>
                <!-- /cart -->
            </div>
        </div>
    </div>
    <!-- pt-desktop-header -->
    <div class="pt-desktop-header" style="background: linear-gradient(to left, #33ccff 43%, #0000cc 100%);">
        <div class="container-fluid">
            <div class="headinfo-box form-inline menu-center-responsive">
                <!-- logo -->
                <div class="pt-logo pt-logo-alignment" itemscope itemtype="http://schema.org/Organization">
                    <a href="{{ route('home') }}" itemprop="url">
                        @foreach ($header as $item)
                        <h2 class="pt-title">
                            <img src="{{ Storage::url($item->logo) }}" style="max-width: 130px; max-height:60px;"
                                alt="">
                        </h2>
                        @endforeach
                    </a>
                </div>
                <!-- /logo -->
                <div class="navinfo cont-center">
                    <!-- pt-menu -->
                    <div class="pt-desctop-parent-menu">
                        <div class="pt-desctop-menu">
                            <nav>
                                <ul>
                                    <li class="dropdown selected megamenu">
                                        <a href="{{ route('home') }}">
                                            <span style="color: white">HOME</span>
                                        </a>
                                    </li>
                                    <li class="dropdown megamenu">
                                        <a href="{{ route('client') }}">
                                            <span style="color: white">OUR CLIENT</span>
                                        </a>
                                    </li>
                                    <li class="dropdown megamenu">
                                        <a href="{{ route('product') }}">
                                            <span style="color: white">PRODUK</span>
                                        </a>
                                    </li>
                                    <li class="dropdown pt-megamenu-col-01">
                                        <a href="#">
                                            <span style="color: white">PROFIL</span>
                                        </a>
                                        <div class="dropdown-menu">
                                            <div class="row pt-col-list">
                                                <div class="col">
                                                    <ul class="pt-megamenu-submenu">
                                                        <li>
                                                            <a href="{{ route('profile') }}">Profil</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('facilityandmachine') }}">Fasilitas Dan
                                                                Mesin</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('facility') }}">Fasilitas</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('machine') }}">Mesin</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('installation') }}">Pemasangan</a>
                                                        </li>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown megamenu">
                                        <a href="{{ route('blog') }}">
                                            <span style="color: white">BLOG</span>
                                        </a>
                                    </li>
                                    <li class="dropdown megamenu">
                                        <a href="{{ route('payment-confirmation') }}">
                                            <span style="color: white">KONFIRMASI PEMBAYARAN</span>
                                        </a>
                                    </li>

                                    {{-- <li class="dropdown megamenu">
                                        <a href="{{ route('coba') }}">
                                            <span style="color: white">COBA</span>
                                        </a>
                                    </li> --}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /pt-menu -->
                </div>
                <div class="options">
                    <!-- pt-search -->
                    <div class="pt-desctop-parent-search pt-parent-box">
                        <div class="pt-search pt-dropdown-obj js-dropdown">
                            <button class="pt-dropdown-toggle" data-tooltip="Search" data-tposition="bottom">
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <use xlink:href="#icon-search"></use>
                                </svg>
                            </button>
                            <div class="pt-dropdown-menu">
                                <div class="container">
                                    <form>
                                        <div class="pt-col">
                                            <input type="text" class="pt-search-input" placeholder="Cari Produk....">
                                            <button class="pt-btn-search" type="submit">
                                                <svg width="24" height="24" viewBox="0 0 24 24">
                                                    <use xlink:href="#icon-search"></use>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="pt-col">
                                            <button class="pt-btn-close">
                                                <svg width="16" height="16" viewBox="0 0 16 16">
                                                    <use xlink:href="#icon-close"></use>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="pt-info-text">
                                            Apa yang Anda Butuhkan ?
                                        </div>
                                        <div class="search-results"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /pt-search -->
                    <!-- pt-account -->
                    <div class="pt-desctop-parent-account pt-parent-box">
                        <div class="pt-account pt-dropdown-obj js-dropdown">
                            <button class="pt-dropdown-toggle" data-tooltip="My Accountt" data-tposition="bottom">
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <use xlink:href="#icon-user"></use>
                                </svg>
                            </button>
                            <div class="pt-dropdown-menu">
                                <div class="pt-mobile-add">
                                    <button class="pt-close">
                                        <svg>
                                            <use xlink:href="#icon-close"></use>
                                        </svg>Close
                                    </button>
                                </div>
                                <div class="pt-dropdown-inner">
                                    <ul>
                                        @guest
                                        <li>
                                            <a href="{{ route('login') }}">
                                                <i class="pt-icon">
                                                    <svg width="18" height="23">
                                                        <use xlink:href="#icon-lock"></use>
                                                    </svg>
                                                </i>
                                                <span class="pt-text">Sign In</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('register') }}">
                                                <i class="pt-icon pt-align-icon">
                                                    <svg width="24" height="24">
                                                        <use xlink:href="#icon-user"></use>
                                                    </svg>
                                                </i>
                                                <span class="pt-text">Register</span>
                                            </a>
                                        </li>
                                        @endguest
                                        @auth
                                        <ul>
                                            <li>
                                                <a href="{{ route('user-profile') }}">
                                                    <i class="pt-icon">
                                                        <svg width="18" height="23">
                                                            <use xlink:href="#icon-lock"></use>
                                                        </svg>
                                                    </i>
                                                    <span class="pt-text">Profil Saya</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('my-transaction') }}">
                                                    <i class="pt-icon">
                                                        <svg width="18" height="23">
                                                            <use xlink:href="#icon-lock"></use>
                                                        </svg>
                                                    </i>
                                                    <span class="pt-text">Transaksi Saya</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"
                                                    class="dropdown-item">Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                        @endauth
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /pt-account -->
                    <!-- pt-compare -->
                    {{-- <div class="pt-desctop-parent-compare pt-parent-box">
                        <div class="pt-compare pt-dropdown-obj">
                            <a href="page-compare.html" class="pt-dropdown-toggle" data-tooltip="Compare"
                                data-tposition="bottom">
                                <span class="pt-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <use xlink:href="#icon-compare"></use>
                                    </svg>
                                </span>
                                <span class="pt-text">Compare</span>
                                <span class="pt-badge">4</span>
                            </a>
                        </div>
                    </div> --}}
                    <!-- /pt-compare -->
                    <!-- pt-wishlist -->
                    {{-- <div class="pt-desctop-parent-wishlist pt-parent-box">
                        <div class="pt-wishlist pt-dropdown-obj disabled">
                            <a href="page-wishlist.html" class="pt-dropdown-toggle" data-tooltip="Wishlist"
                                data-tposition="bottom">
                                <span class="pt-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <use xlink:href="#icon-wishlist"></use>
                                    </svg>
                                </span>
                                <span class="pt-text">Wishlist</span>
                                <span class="pt-badge">13</span>
                            </a>
                        </div>
                    </div> --}}
                    <!-- /pt-wishlist -->
                    <!-- pt-cart -->
                    @auth
                    <div class="pt-desctop-parent-cart pt-parent-box">
                        <div class="pt-cart pt-dropdown-obj js-dropdown"
                            data-ajax="user-template/ajax-content/ajax_dropdown-cart.html">
                            <button class="pt-dropdown-toggle" data-tooltip="Cart" data-tposition="bottom">
                                <a href="{{ route('cart') }}" class="cart-cart">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <use xlink:href="#icon-cart_1"></use>
                                    </svg>
                                </a>
                                @php
                                $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                                @endphp
                                @if ($carts > 0 )
                                <span class="pt-badge">{{ $carts }}</span>
                                @else

                                @endif
                            </button>
                            {{-- <div class="pt-dropdown-menu"></div> --}}
                        </div>
                    </div>
                    @endauth
                    @auth
                    <div class="pt-parent-box">
                        <div class="pt-currency pt-dropdown-obj02 js-dropdown">
                            <button class="pt-dropdown-toggle">
                                <span class="pt-dropdown-value" style="color: #fff;">
                                    Hi, {{ Auth::user()->username }}
                                </span>
                            </button>
                        </div>
                    </div>
                    @endauth
                    <!-- /pt-cart -->
                    {{-- <div class="pt-desctop-parent-language pt-parent-box">
                        <div class="pt-language pt-dropdown-obj02 js-dropdown">
                            <button class="pt-dropdown-toggle" data-tooltip="Language" data-tposition="bottom">
                                <span class="pt-dropdown-value">Eng</span>
                                <span class="pt-icon">
                                    <svg width="12" height="7" viewBox="0 0 12 7">
                                        <use xlink:href="#icon-arrow_small_bottom"></use>
                                    </svg>
                                </span>
                            </button>
                            <div class="pt-dropdown-menu">
                                <div class="pt-dropdown-inner">
                                    <ul>
                                        <li><a data-value="English" href="#">Eng</a></li>
                                        <li><a data-value="German" href="#">Ger</a></li>
                                        <li><a data-value="Spanish" href="#">Span</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
    <!-- stuck nav -->
    <div class="pt-stuck-nav" style="background: linear-gradient(to left, #33ccff 43%, #0000cc 100%);">
        <div class="container-fluid">
            <div class="pt-header-row">
                <div class="pt-stuck-parent-menu"></div>
                <div class="pt-logo-container">
                    <!-- mobile logo -->
                    <div class="pt-logo pt-logo-alignment" itemscope itemtype="http://schema.org/Organization">
                        @foreach ($header as $item)
                        <a href="{{ route('home') }}" itemprop="url">
                            <h2 class="pt-title"><img src="{{ Storage::url($item->logo) }}" width="120" alt=""></h2>
                        </a>
                        @endforeach
                    </div>
                    <!-- /mobile logo -->
                </div>
                <div class="pt-stuck-parent-search pt-parent-box"></div>
                <div class="pt-stuck-parent-account pt-parent-box"></div>
                <div class="pt-stuck-parent-compare pt-parent-box"></div>
                <div class="pt-stuck-parent-wishlist pt-parent-box"></div>
                <div class="pt-stuck-parent-cart pt-parent-box"></div>
            </div>
        </div>
    </div>
</header>