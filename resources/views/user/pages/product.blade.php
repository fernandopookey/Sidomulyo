@extends('user.layouts.app')

@section('title')
Sidomulyo | Product Page
@endsection

@section('content')

<style>
    .btn-add-cart {
        background: transparent;
        border: none !important;
        color: white;
    }
</style>

<div class="pt-breadcrumb">
    <div class="container-fluid">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Produk</li>
        </ul>
    </div>
</div>

<div id="pt-pageContent">
    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <h1 class="noborder pt-title-subpages">Produk</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="content-indent">
                        <div class="pt-filters-options desctop-no-sidebar">
                            <div class="pt-sort pt-not-detach">
                                <div class="custom-select-01">
                                    <select>
                                        <option value="Default Sorting">Name descending</option>
                                        <option value="Default Sorting">Default Sorting 02</option>
                                        <option value="Default Sorting">Default Sorting 03</option>
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="pt-quantity">
                                <a href="#" class="pt-col-one" data-value="pt-col-one">
                                    <span class="icon-listing-one">
                                        <span></span>
                                        <span></span>
                                    </span>
                                </a>
                                <a href="#" class="pt-col-two" data-value="pt-col-two">
                                    <span class="icon-listing-two">
                                        <span></span>
                                        <span></span>
                                    </span>
                                </a>
                                <a href="#" class="pt-col-three" data-value="pt-col-three">
                                    <span class="icon-listing-three">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
                                </a>
                                <a href="#" class="pt-col-four" data-value="pt-col-four">
                                    <span class="icon-listing-four">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
                                </a>
                                <a href="#" class="pt-col-six" data-value="pt-col-six">
                                    <span class="icon-listing-six">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
                                </a>
                            </div> --}}
                        </div>
                        <div class="pt-product-listing row">
                            @php
                            $incrementProduct = 0
                            @endphp
                            @foreach ($product as $item)
                            <div class="col-12 col-md-4 col-lg-3 pt-col-item">
                                <div class="pt-product" data-aos="fade-up"
                                    data-aos-delay="{{ $incrementProduct+= 100}}">
                                    <div class="pt-image-box">
                                        {{-- <div class="pt-app-btn">
                                            <a href="#" class="pt-btn-wishlist" data-tooltip="Add to Wishlist"
                                                data-tposition="left">
                                                <svg>
                                                    <use xlink:href="#icon-wishlist"></use>
                                                </svg>
                                                <svg>
                                                    <use xlink:href="#icon-wishlist-add"></use>
                                                </svg>
                                            </a>
                                            <a href="#" class="pt-btn-compare" data-tooltip="Add to Compare"
                                                data-tposition="left">
                                                <svg>
                                                    <use xlink:href="#icon-compare"></use>
                                                </svg>
                                                <svg>
                                                    <use xlink:href="#icon-compare-add"></use>
                                                </svg>
                                            </a>
                                            <a href="#" class="pt-btn-quickview" data-toggle="modal"
                                                data-target="#ModalquickView" data-tooltip="Quick View"
                                                data-tposition="left">
                                                <svg>
                                                    <use xlink:href="#icon-quick_view"></use>
                                                </svg>
                                            </a>
                                        </div> --}}
                                        <a href="{{ route('product-details', $item->id) }}" class="pt-promo-box">
                                            <span class="pt-img">
                                                <div class="image-box">
                                                    <div class="product-image">
                                                        @if ($item->galleries->count())
                                                        <img src="{{ Storage::url($item->galleries->first()->photos ?? '') }}"
                                                            class="lazyload"
                                                            style="width:300px; height: 250px; object-fit: cover;"
                                                            alt="image">
                                                        @else
                                                        <div class="justify-content-center align-items-center"
                                                            style="width: 300px; height: 235px;">
                                                            <p>Tidak Ada Gambar</p>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </span>
                                            {{-- <span class="pt-img-roll-over">
                                                <img src="images/poster1.jpeg" class="lazyload"
                                                    style="height: 300px; width:250px;" alt="image">
                                            </span> --}}
                                            {{-- <span class="pt-label-location">
                                                <span class="pt-label-new">NEW</span>
                                            </span> --}}
                                        </a>
                                    </div>
                                    <div class="pt-description">
                                        <div class="pt-col">
                                            <!-- rating -->
                                            {{-- <div class="pt-rating">
                                                <i class="pt-star">
                                                    <svg>
                                                        <use xlink:href="#icon-review"></use>
                                                    </svg>
                                                </i>
                                                <i class="pt-star">
                                                    <svg>
                                                        <use xlink:href="#icon-review"></use>
                                                    </svg>
                                                </i>
                                                <i class="pt-star">
                                                    <svg>
                                                        <use xlink:href="#icon-review"></use>
                                                    </svg>
                                                </i>
                                                <i class="pt-star">
                                                    <svg>
                                                        <use xlink:href="#icon-review"></use>
                                                    </svg>
                                                </i>
                                                <i>
                                                    <svg>
                                                        <use xlink:href="#icon-review"></use>
                                                    </svg>
                                                </i>
                                                <span class="pt-total">(2)</span>
                                            </div> --}}
                                            <ul class="pt-add-info">
                                                <li>
                                                    <a href="#">Kategori {{ $item->categories->name }}</a>
                                                </li>
                                            </ul>
                                            <h2 class="pt-title">
                                                <a href="#">
                                                    {{ $item->name }}
                                                </a>
                                            </h2>
                                            <div class="pt-price">
                                                $34.89
                                            </div>
                                            <div class="pt-content">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.
                                            </div>
                                        </div>
                                        <div class="pt-col">
                                            <div class="pt-row-hover">
                                                <span href="#" class="pt-btn-addtocart" data-toggle="modal"
                                                    data-target="#modalAddToCart">
                                                    <div class="pt-icon">
                                                        <svg>
                                                            <use xlink:href="#icon-cart_1"></use>
                                                        </svg>
                                                        <svg>
                                                            <use xlink:href="#icon-cart_1_plus"></use>
                                                        </svg>
                                                        <svg>
                                                            <use xlink:href="#icon-cart_1_disable"></use>
                                                        </svg>
                                                    </div>
                                                    {{-- <span class="pt-text">TAMBAH KE KERANJANG</span> --}}
                                                    @auth
                                                    <form action="{{ route('detail-add', $item->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" class="quantity" name="qty" value="1">
                                                        <button type="submit" class="btn-add-cart">
                                                            <span class="pt-text main">Tambah Ke Keranjang</span>
                                                        </button>
                                                    </form>
                                                    @else
                                                    <form action="{{ route('login') }}">
                                                        <button type="submit" class="btn-add-cart">
                                                            <span class="pt-text main">Login Untuk Belanja</span>
                                                        </button>
                                                    </form>
                                                    @endauth
                                                </span>
                                                <div class="pt-price">
                                                    Rp. {{ number_format($item->price) }}
                                                </div>
                                                <div class="pt-wrapper-btn">
                                                    <a href="#" class="pt-btn-wishlist">
                                                        <span class="pt-icon">
                                                            <svg>
                                                                <use xlink:href="#icon-wishlist"></use>
                                                            </svg>
                                                            <svg>
                                                                <use xlink:href="#icon-wishlist-add"></use>
                                                            </svg>
                                                        </span>
                                                        <span class="pt-text">Add to wishlist</span>
                                                    </a>
                                                    <a href="#" class="pt-btn-compare">
                                                        <span class="pt-icon">
                                                            <svg>
                                                                <use xlink:href="#icon-compare"></use>
                                                            </svg>
                                                            <svg>
                                                                <use xlink:href="#icon-compare-add"></use>
                                                            </svg>
                                                        </span>
                                                        <span class="pt-text">Add to compare</span>
                                                    </a>
                                                    <a href="#" class="pt-btn-quickview" data-toggle="modal"
                                                        data-target="#ModalquickView">
                                                        <span class="pt-icon">
                                                            <svg>
                                                                <use xlink:href="#icon-quick_view"></use>
                                                            </svg>
                                                        </span>
                                                        <span class="pt-text">Zoom</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{-- {!! $product->links() !!} --}}
                        {{-- <div class="pt-pagination text-center">
                            <ul>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#" title="">2</a></li>
                                <li><a href="#" title="">3</a></li>
                            </ul>
                            <a href="#" class="btn-pagination btn-next">Next</a>
                        </div> --}}
                        {{-- <div class="text-center pt_product_showmore">
                            <a href="#" class="btn btn-border">LOAD MORE</a>
                            <div class="pt_item_all_js">
                                <a href="#" class="btn btn-border01">NO MORE ITEM TO SHOW</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-indent">
        <div class="container-fluid">
            <div class="pt-block-title">
                <h1 class="pt-title">Produk Lainnya</h1>
                <div class="pt-description">Tambahkan Produk Kami ke Keranjang Belanja Anda</div>
            </div>
            <div class="pt-layout-promo-box">
                <div class="row flex-column-reverse flex-lg-row">
                    <div class="col-md-6">
                        <a href="#" class="pt-promo-box">
                            <div class="image-box">
                                <img src="images/poster/poster1.jpeg"
                                    style="height: 700px; width: 950px; object-fit:cover;" class="lazyload" alt="image">
                            </div>
                            <div class="pt-description pr-promo-type1 pt-point-v-t pt-point-h-l">
                                <div class="pt-description-wrapper">
                                    <div class="pt-title-large" style="color: white;">
                                        <span>Lengkapi Ruangan Anda</span>
                                    </div>
                                    {{-- <p style="color: white;">The world's most stylish women are buying right now
                                    </p> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <a href="#" class="pt-promo-box">
                                    <div class="image-box">
                                        <img src="images/poster/poster2.jpeg" style="width: 500px; height:400px"
                                            class="lazyload" alt="image">
                                    </div>
                                    <div class="pt-description pr-promo-type1 pt-point-v-t pt-point-h-l">
                                        <div class="pt-description-wrapper">
                                            <div class="pt-title-large">
                                                <span style="color: white;">Produk Terbaru</span>
                                            </div>
                                            {{-- <p style="color: white;">Shoes & Accessories</p> --}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-sm-6">
                                <a href="#" class="pt-promo-box">
                                    <div class="image-box">
                                        <img src="images/poster/poster3.jpeg"
                                            style="width: 500px; height:400px; object-fit:cover;" class="lazyload"
                                            alt="image">
                                    </div>
                                    <div class="pt-description pr-promo-type1 pt-point-v-t pt-point-h-l">
                                        <div class="pt-description-wrapper">
                                            <div class="pt-color-white pt-title-large">
                                                <span style="color: white;">Produk Terlaris</span>
                                            </div>
                                            {{-- <p class="pt-color-white" style="color: white;">Collections 2019/20</p>
                                            --}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12">
                                <a href="#" class="pt-promo-box">
                                    <div class="image-box">
                                        <img src="images/poster/poster4.jpeg"
                                            style="width: 1000px; height: 290px; object-fit:cover;" alt="">
                                    </div>
                                    <div class="pt-description pr-promo-type1 pt-point-v-t pt-point-h-l">
                                        <div class="pt-description-wrapper">
                                            <div class="pt-title-large"><span style="color: white;">Diskon</span>
                                            </div>
                                            {{-- <p style="color: white;">Get up to 50% off</p> --}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection