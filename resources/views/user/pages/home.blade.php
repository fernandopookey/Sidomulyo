@extends('user.layouts.app')

@section('title')
Sidomulyo Homepage
@endsection

<style>
    .opening-card {
        background-color: #cccccc;
        color: white;
        border-radius: 10px;
        cursor: pointer;
        transition: .5s ease;
    }

    .opening-card:hover {
        background-color: rgb(133, 133, 133);
        transform: scale(1.1);
    }

    .fa-thumbs-up {
        color: white;
    }

    /* Popup Modal */
    .popup {
        background-color: rgba(0, 0, 0, 0.589);
        width: 100%;
        height: 100%;
        padding: 110px 40px;
        /* position: absolute; */
        position: fixed;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 50%;
        border-radius: 8px;
        display: none;
        text-align: center;
        white-space: nowrap;
    }

    .popup button {
        display: block;
        margin: 0 0 20px auto;
        background-color: transparent;
        font-size: 30px;
        color: rgb(201, 9, 9);
        border: none;
        outline: none;
        cursor: pointer;
    }

    /* a {
        display: block;
        width: 150px;
        position: relative;
        margin: auto;
        text-align: center;
        background-color: #0f72f5;
        color: white;
        text-decoration: none;
        padding: 5px 0;

    } */
</style>

@section('content')

<main id="pt-pageContent">
    <div class="container-indent nomargin">
        <div class="mainSlider-layout">
            <div class="mainSliderSlick mainSliderSlick-js arrow-slick-main">
                @foreach ($slider as $item)
                <div class="slide">
                    <div class="img--holder">
                        <picture>
                            {{--
                            <source srcset="user-template/images/slides-02/company1.jpg" type="image/webp"> --}}
                            <img src="{{ Storage::url($item->photos ?? 'Error') }}" alt="">
                        </picture>
                    </div>
                    <div class="slide-content text-center btn-slider-home">
                        <div class="pt-container">
                            {{-- <div class="tp-caption1-wd-2 pt-white-color">{{ $item->name }}</div>
                            <div class="tp-caption1-wd-3 pt-white-color">{!! $item->description !!}</div> --}}
                            <div class="tp-caption1-wd-4 button-pesan-home">
                                <a href="#" class="btn" data-text="DISCOVER NOW!">PESAN SEKARANG!
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container-indent">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="opening-card pt-3 pb-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="justify-content-center align-items-center text-center opening-body-card">
                            <i class="fa-solid fa-thumbs-up fa-5x"></i>
                            <div class="card-title pt-1">KUALITAS TERJAMIN</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-6">
                    <div class="opening-card pt-3 pb-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="justify-content-center align-items-center text-center opening-body-card">
                            <i class="fa-solid fa-clock fa-5x"></i>
                            <div class="card-title pt-1">PENGERJAAN CEPAT</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-6">
                    <div class="opening-card pt-3 pb-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="justify-content-center align-items-center text-center opening-body-card">
                            <i class="fa-solid fa-money-bill fa-5x"></i>
                            <div class="card-title pt-1">HARGA BERSAING</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-6">
                    <div class="opening-card pt-3 pb-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="justify-content-center align-items-center text-center opening-body-card">
                            <i class="fa-solid fa-computer fa-5x"></i>
                            <div class="card-title pt-1">DESAIN BERKUALITAS</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-indent">
        <div class="container">
            <hr> /
            <div class="row justify-content-center" style="text-align: center" data-aos="fade-up">
                @foreach ($sosmed as $item)
                <div class="col-12" style="max-width: 550px;">
                    <h2>{{ $item->home_title }}</h2>
                    <h5>{{ $item->other }}</h5>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-indent">
        <div class="container">
            <hr />
            <div class="pt-block-title" data-aos="fade-down">
                <h4 class="pt-title">Produk</h4>
                <div class="pt-description">Sesuaikan Kebutuhan Anda</div>
            </div>
            <div class="pt-layout-promo-card-02">
                <div class="row d-flex justify-content-center mb-4 pb-4">
                    @php
                    $incrementProduct = 0
                    @endphp
                    @forelse ($product as $item)
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="{{ $incrementProduct+= 100}}">
                        <a href="#" class="pt-promo-card-02">
                            <div class="image-box">
                                <img src="{{ Storage::url($item->galleries->first()->photos ?? '') }}" class="lazyload"
                                    style="width: 300px; height: 300px; object-fit:cover;" alt="NEW COLLETION">
                            </div>
                            <div class="pt-description">
                                <div class="pt-title">
                                    {{ $item->name }}
                                </div>
                                <p>
                                    Rp. {{ number_format($item->price) }}
                                </p>
                                {{-- <div class="btn btn-border">Pesan Sekarang!</div> --}}
                                <a href="{{ route('product') }}" class="btn btn-border">Pesan Sekarang!</a>
                            </div>
                        </a>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                        No Products Found
                    </div>
                    @endforelse
                </div>
                <div class="col-lg-12">
                    <div class="text-center mt-4 pt-4">
                        <a href="{{ route('product') }}" class="btn" data-text="DISCOVER NOW!">LIHAT
                            PRODUK LAINNYA!
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <hr />
            <div class="pt-block-title">
                <h4 class="pt-title">Penawaran Terbaik</h4>
                <div class="pt-description">Diskon Murah Meriah</div>
            </div>
            <div class="js-init-carousel js-align-arrow row arrow-location-center-02 pt-layout-product-item">
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="pt-product" data-rollover="images/poster1.jpeg">
                        <div class="pt-image-box">
                            <div class="pt-app-btn">
                                <a href="#" class="pt-btn-wishlist" data-tooltip="Add to Wishlist"
                                    data-tposition="left">
                                    <svg>
                                        <use xlink:href="#icon-wishlist"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="#icon-wishlist-add"></use>
                                    </svg>
                                </a>
                                <a href="#" class="pt-btn-compare" data-tooltip="Add to Compare" data-tposition="left">
                                    <svg>
                                        <use xlink:href="#icon-compare"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="#icon-compare-add"></use>
                                    </svg>
                                </a>
                                <a href="#" class="pt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"
                                    data-tooltip="Quick View" data-tposition="left">
                                    <svg>
                                        <use xlink:href="#icon-quick_view"></use>
                                    </svg>
                                </a>
                            </div>
                            <a href="product-type-03.html">
                                <div class="pt-img">
                                    <picture>
                                        <img class="lazyload" src="images/poster/poster1.jpeg" alt="image">
                                    </picture>
                                </div>
                                <span class="pt-label-location">
                                    <span class="pt-label-new">NEW</span>
                                </span>
                            </a>
                        </div>
                        <div class="pt-description">
                            <div class="pt-col">
                                <ul class="pt-add-info">
                                    <li><a href="#">WOMEN’S</a></li>
                                </ul>
                                <h2 class="pt-title"><a href="product-type-03.html">Push up low rise jeans</a></h2>
                                <div class="pt-price">
                                    $24
                                </div>
                                <div class="pt-option-block">
                                    <!-- options switch image -->
                                    <ul class="pt-options-swatch js-change-img">
                                        <li class="active"><a href="#" class="options-color-img"
                                                data-src="images/product/product-01.jpg"></a></li>
                                        <li>
                                            <a href="#" class="options-color-img"
                                                data-src="images/product/product-01-02.jpg"></a>
                                        </li>
                                    </ul>
                                    <!-- options pattern -->
                                    <ul class="pt-options-swatch js-change-img">
                                        <li class="active"><a href="#" class="options-color-img"
                                                data-src="images/product/product-01-03.jpg"
                                                data-src-demo="images/product/pattern-item/filter_color6.png"
                                                data-tooltip="Cotton"></a></li>
                                        <li>
                                            <a href="#" class="options-color-img"
                                                data-src="images/product/product-01-04.jpg"
                                                data-src-demo="images/product/pattern-item/filter_color7.png"
                                                data-tooltip="Silk"></a>
                                        </li>
                                        <li>
                                            <a href="#" class="options-color-img"
                                                data-src="images/product/product-01-05.jpg"
                                                data-src-demo="images/product/pattern-item/filter_color8.png"
                                                data-tooltip="Linen"></a>
                                        </li>
                                    </ul>
                                    <!-- options color -->
                                    <ul class="pt-options-swatch">
                                        <li class="active"><a class="options-color pt-color-bg-12" href="#"></a>
                                        </li>
                                        <li><a class="options-color pt-color-bg-02" href="#"></a></li>
                                        <li><a class="options-color pt-color-bg-13" href="#"></a></li>
                                    </ul>
                                    <!-- options size -->
                                    <ul class="pt-options-swatch">
                                        <li class="active">
                                            <a href="#">XS</a>
                                        </li>
                                        <li><a href="#">S</a></li>
                                        <li><a href="#">M</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pt-col">
                                <div class="pt-row-hover">
                                    <a href="#" class="pt-btn-addtocart" data-toggle="modal"
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
                                        <span class="pt-text">ADD TO CART</span>
                                    </a>
                                    <div class="pt-price">
                                        <span class="old-price">$24</span>
                                        <span class="new-price">$14</span>
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
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="pt-product" data-rollover="images/poster2.jpeg">
                        <div class="pt-image-box">
                            <div class="pt-app-btn">
                                <a href="#" class="pt-btn-wishlist" data-tooltip="Add to Wishlist"
                                    data-tposition="left">
                                    <svg>
                                        <use xlink:href="#icon-wishlist"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="#icon-wishlist-add"></use>
                                    </svg>
                                </a>
                                <a href="#" class="pt-btn-compare" data-tooltip="Add to Compare" data-tposition="left">
                                    <svg>
                                        <use xlink:href="#icon-compare"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="#icon-compare-add"></use>
                                    </svg>
                                </a>
                                <a href="#" class="pt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"
                                    data-tooltip="Quick View" data-tposition="left">
                                    <svg>
                                        <use xlink:href="#icon-quick_view"></use>
                                    </svg>
                                </a>
                            </div>
                            <a href="product-type-03.html">
                                <div class="pt-img">
                                    <picture>
                                        <img class="lazyload" src="images/poster/poster2.jpeg" alt="image">
                                    </picture>
                                </div>
                                <span class="pt-label-location">
                                    <span class="pt-label-sale">SALE -27%</span>
                                </span>
                            </a>
                        </div>
                        <div class="pt-description">
                            <div class="pt-col">
                                <ul class="pt-add-info">
                                    <li><a href="#">WOMEN’S</a></li>
                                </ul>
                                <h2 class="pt-title"><a href="product-type-03.html">Printed dress</a></h2>
                                <div class="pt-price">
                                    $24
                                </div>
                                <div class="pt-option-block">
                                    <!-- options switch image -->
                                    <ul class="pt-options-swatch js-change-img">
                                        <li class="active" data-availability="false"><a href="#"
                                                class="options-color-img" data-src="images/product/product-02.jpg"></a>
                                        </li>
                                        <li data-availability="false">
                                            <a href="#" class="options-color-img"
                                                data-src="images/product/product-02-02.jpg"></a>
                                        </li>
                                    </ul>
                                    <!-- options pattern -->
                                    <ul class="pt-options-swatch js-change-img">
                                        <li class="active" data-availability="false"><a href="#"
                                                class="options-color-img" data-src="images/product/product-02-03.jpg"
                                                data-src-demo="images/product/pattern-item/filter_color10.png"
                                                data-tooltip="Cotton"></a></li>
                                        <li data-availability="false">
                                            <a href="#" class="options-color-img"
                                                data-src="images/product/product-02-04.jpg"
                                                data-src-demo="images/product/pattern-item/filter_color11.png"
                                                data-tooltip="Silk"></a>
                                        </li>
                                    </ul>
                                    <!-- options color -->
                                    <ul class="pt-options-swatch">
                                        <li data-availability="false" class="active"><span
                                                class="availability-icon"></span><a class="options-color pt-color-bg-12"
                                                href="#"></a></li>
                                        <li data-availability="false"><span class="availability-icon"></span><a
                                                class="options-color pt-color-bg-02" href="#"></a></li>
                                        <li data-availability="false"><span class="availability-icon"></span><a
                                                class="options-color pt-color-bg-13" href="#"></a></li>
                                    </ul>
                                    <!-- options size -->
                                    <ul class="pt-options-swatch">
                                        <li data-availability="false" class="active">
                                            <a href="#">XS</a>
                                        </li>
                                        <li data-availability="false"><a href="#">S</a></li>
                                        <li data-availability="false"><a href="#">M</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pt-col">
                                <div class="pt-row-hover">
                                    <a href="#" class="pt-btn-addtocart pt-disable" data-toggle="modal"
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
                                        <span class="pt-text">SOLD OUT</span>
                                    </a>
                                    <div class="pt-price">
                                        <span class="old-price">$78.89</span>
                                        <span class="new-price">$48.89</span>
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
                                        <a href="#" class="pt-btn-quickview pt-disable" data-toggle="modal"
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
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="pt-product" data-rollover="images/poster3.jpeg">
                        <div class="pt-image-box">
                            <div class="pt-app-btn">
                                <a href="#" class="pt-btn-wishlist" data-tooltip="Add to Wishlist"
                                    data-tposition="left">
                                    <svg>
                                        <use xlink:href="#icon-wishlist"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="#icon-wishlist-add"></use>
                                    </svg>
                                </a>
                                <a href="#" class="pt-btn-compare" data-tooltip="Add to Compare" data-tposition="left">
                                    <svg>
                                        <use xlink:href="#icon-compare"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="#icon-compare-add"></use>
                                    </svg>
                                </a>
                                <a href="#" class="pt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"
                                    data-tooltip="Quick View" data-tposition="left">
                                    <svg>
                                        <use xlink:href="#icon-quick_view"></use>
                                    </svg>
                                </a>
                            </div>
                            <a href="product-type-03.html">
                                <div class="pt-img">
                                    <picture>
                                        <img class="lazyload" src="images/poster/poster3.jpeg" alt="image">
                                    </picture>
                                </div>
                                <span class="pt-label-location">
                                    <span class="pt-label-new">NEW</span>
                                    <span class="pt-label-our-fatured">FEATURED</span>
                                </span>
                            </a>
                        </div>
                        <div class="pt-description">
                            <div class="pt-col">
                                <div class="pt-rating">
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
                                </div>
                                <ul class="pt-add-info">
                                    <li><a href="#">WOMEN’S</a></li>
                                </ul>
                                <h2 class="pt-title"><a href="product-type-03.html">Midi button-up denim skirt</a>
                                </h2>
                                <div class="pt-price">
                                    $34.89
                                </div>
                                <div class="pt-option-block">
                                    <!-- text -->
                                    <ul class="pt-options-swatch">
                                        <li class="active">
                                            <a href="#">XS</a>
                                        </li>
                                        <li><a href="#">S</a></li>
                                        <li><a href="#">M</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pt-col">
                                <div class="pt-row-hover">
                                    <a href="#" class="pt-btn-addtocart" data-toggle="modal"
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
                                        <span class="pt-text">ADD TO CART</span>
                                    </a>
                                    <div class="pt-price">
                                        $34.89
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
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="pt-product" data-rollover="images/poster4.jpeg">
                        <div class="pt-image-box">
                            <div class="pt-app-btn">
                                <a href="#" class="pt-btn-wishlist" data-tooltip="Add to Wishlist"
                                    data-tposition="left">
                                    <svg>
                                        <use xlink:href="#icon-wishlist"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="#icon-wishlist-add"></use>
                                    </svg>
                                </a>
                                <a href="#" class="pt-btn-compare" data-tooltip="Add to Compare" data-tposition="left">
                                    <svg>
                                        <use xlink:href="#icon-compare"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="#icon-compare-add"></use>
                                    </svg>
                                </a>
                                <a href="#" class="pt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"
                                    data-tooltip="Quick View" data-tposition="left">
                                    <svg>
                                        <use xlink:href="#icon-quick_view"></use>
                                    </svg>
                                </a>
                            </div>
                            <a href="product-type-03.html">
                                <div class="pt-img">
                                    <picture>
                                        <img class="lazyload" src="images/poster/poster4.jpeg" alt="image">
                                    </picture>
                                </div>
                                <span class="pt-label-location">
                                    <span class="pt-label-out-stock">OUT OF STOCK</span>
                                </span>
                            </a>
                        </div>
                        <div class="pt-description">
                            <div class="pt-col">
                                <ul class="pt-add-info">
                                    <li><a href="#">WOMEN’S</a></li>
                                </ul>
                                <h2 class="pt-title"><a href="product-type-03.html">Hat with faux fur pompom</a>
                                </h2>
                                <div class="pt-price">
                                    $11.89
                                </div>
                                <div class="pt-option-block">
                                    <ul class="pt-options-swatch js-change-img">
                                        <li class="active"><a href="#" class="options-color-img"
                                                data-src="images/product/product-09.jpg"></a></li>
                                        <li>
                                            <a href="#" class="options-color-img"
                                                data-src="images/product/product-09-02.jpg"></a>
                                        </li>
                                    </ul>
                                    <ul class="pt-options-swatch js-change-img">
                                        <li class="active"><a href="#" class="options-color-img"
                                                data-src="images/product/product-09-02.jpg"
                                                data-src-demo="images/product/pattern-item/filter_color1.png"
                                                data-tooltip="Cotton"></a></li>
                                        <li>
                                            <a href="#" class="options-color-img"
                                                data-src="images/product/product-09-03.jpg"
                                                data-src-demo="images/product/pattern-item/filter_color2.png"
                                                data-tooltip="Silk"></a>
                                        </li>
                                        <li>
                                            <a href="#" class="options-color-img"
                                                data-src="images/product/product-09-04.jpg"
                                                data-src-demo="images/product/pattern-item/filter_color3.png"
                                                data-tooltip="Linen"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pt-content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.
                                </div>
                            </div>
                            <div class="pt-col">
                                <div class="pt-row-hover">
                                    <a href="#" class="pt-btn-addtocart" data-toggle="modal"
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
                                        <span class="pt-text">ADD TO CART</span>
                                    </a>
                                    <div class="pt-price">
                                        $11.89
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
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="pt-product" data-rollover="images/poster5.jpeg">
                        <div class="pt-image-box">
                            <div class="pt-app-btn">
                                <a href="#" class="pt-btn-wishlist" data-tooltip="Add to Wishlist"
                                    data-tposition="left">
                                    <svg>
                                        <use xlink:href="#icon-wishlist"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="#icon-wishlist-add"></use>
                                    </svg>
                                </a>
                                <a href="#" class="pt-btn-compare" data-tooltip="Add to Compare" data-tposition="left">
                                    <svg>
                                        <use xlink:href="#icon-compare"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="#icon-compare-add"></use>
                                    </svg>
                                </a>
                                <a href="#" class="pt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"
                                    data-tooltip="Quick View" data-tposition="left">
                                    <svg>
                                        <use xlink:href="#icon-quick_view"></use>
                                    </svg>
                                </a>
                            </div>
                            <a href="product-type-03.html">
                                <div class="pt-img">
                                    <picture>
                                        <img class="lazyload" src="images/poster/poster5.jpeg" alt="image">
                                    </picture>
                                </div>
                            </a>
                        </div>
                        <div class="pt-description">
                            <div class="pt-col">
                                <ul class="pt-add-info">
                                    <li><a href="#">WOMEN’S</a></li>
                                </ul>
                                <h2 class="pt-title"><a href="product-type-03.html">Hooded down puffer jacket</a>
                                </h2>
                                <div class="pt-price">
                                    $24
                                </div>
                                <div class="pt-option-block">
                                    <ul class="pt-options-swatch">
                                        <li class="active"><a class="options-color pt-color-bg-01" href="#"></a>
                                        </li>
                                        <li><a class="options-color pt-color-bg-02" href="#"></a></li>
                                        <li><a class="options-color pt-color-bg-03" href="#"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pt-col">
                                <div class="pt-row-hover">
                                    <a href="#" class="pt-btn-addtocart" data-toggle="modal"
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
                                        <span class="pt-text">ADD TO CART</span>
                                    </a>
                                    <div class="pt-price">
                                        <span class="old-price">$24</span>
                                        <span class="new-price">$14</span>
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
            </div>
        </div>
    </div> --}}
    <div class="container-indent">
        <div class="container">
            <hr>
            <div class="row pt-services-listing text-center">
                @php
                $incrementLink = 0
                @endphp
                @foreach ($homecontent as $item)
                <div class="col-xs-12 col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="{{ $incrementLink+= 200 }}">
                    <a href="{{ $item->link }}" class="pt-services-block" target="_blank">
                        <h4 class="pt-title">
                            <span class="pt-icon">
                                <img src="{{ Storage::url($item->icon ?? '') }}" style="max-width: 50px" alt="">
                                <a href="{{ $item->link }}" target="_blank">{{ $item->title }}</a>
                                {{-- <svg>
                                    <use xlink:href="{{ route('installation.index') }}"></use>
                                </svg> --}}
                            </span>
                            {{-- <span class="pt-text">Fasilitas Pendukung</span> --}}
                        </h4>
                        {{-- <p>Free shipping on orders over $99.</p> --}}
                    </a>
                </div>
                @endforeach
                {{-- <div class="col-xs-12 col-md-6 col-lg-4">
                    <a href="page-faq.html" class="pt-services-block" target="_blank">
                        <h4 class="pt-title">
                            <span class="pt-icon">
                                <i class="fa fa-computer fa-3x"></i>
                                <a href="{{ route('machine.index') }}">Finishing Machine</a> --}}
                                {{-- <svg>
                                    <use xlink:href="{{ route('installation.index') }}"></use>
                                </svg> --}}
                                {{-- </span> --}}
                            {{-- <span class="pt-text">Fasilitas Pendukung</span> --}}
                            {{--
                        </h4> --}}
                        {{-- <p>Free shipping on orders over $99.</p> --}}
                        {{--
                    </a>
                </div> --}}
                {{-- <div class="col-xs-12 col-md-6 col-lg-4">
                    <a href="page-faq.html" class="pt-services-block" target="_blank">
                        <h4 class="pt-title">
                            <span class="pt-icon">
                                <i class="fa fa-blog fa-3x"></i>
                                <a href="{{ route('blog.index') }}">Our Blog</a> --}}
                                {{-- <svg>
                                    <use xlink:href="{{ route('installation.index') }}"></use>
                                </svg> --}}
                                {{-- </span> --}}
                            {{-- <span class="pt-text">Fasilitas Pendukung</span> --}}
                            {{--
                        </h4> --}}
                        {{-- <p>Free shipping on orders over $99.</p> --}}
                        {{--
                    </a> --}}
                    {{--
                </div> --}}
                {{-- <div class="col-xs-12 col-md-6 col-lg-4">
                    <a href="page-faq.html" class="pt-services-block" target="_blank">
                        <h4 class="pt-title">
                            <span class="pt-icon">
                                <svg>
                                    <use xlink:href="#icon-services_support"></use>
                                </svg>
                            </span>
                            <span class="pt-text">Support 24/7</span>
                        </h4>
                        <p>Contact us 24 hours a day, 7 days a week.</p>
                    </a>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <a href="page-faq.html" class="pt-services-block" target="_blank">
                        <h4 class="pt-title">
                            <span class="pt-icon">
                                <svg>
                                    <use xlink:href="#icon-services_return"></use>
                                </svg>
                            </span>
                            <span class="pt-text">Return</span>
                        </h4>
                        <p>Simply return it within 30 days for an exchange.</p>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</main>

<div class="popup" id="close">
    @foreach ($modalHome as $item)
    <button id="close">&times;</button>
    <img src="{{ Storage::url($item->photos ?? '') }}" style="width: 600px; height:300px; object-fit:cover;" alt="">
    @endforeach
</div>

@push('addon-script')

<script>
    window.addEventListener("load", function () {
        setTimeout(function open(event) {
        document.querySelector(".popup").style.display = "block";
        }, 1000);
        });
        
        document.querySelector("#close").addEventListener("click", function () {
        document.querySelector(".popup").style.display = "none";
        });
</script>

@endpush

{{-- <div class="popup" id="close">
    @foreach ($modalHome as $item)
    <button id="close">&times;</button>
    <img src="{{ Storage::url($item->photos ?? '') }}" style="width: 600px; height:300px; object-fit:cover;" alt="">
    @endforeach
</div>

@push('addon-script')

<script>
    window.addEventListener("load", function () {
        setTimeout(function open(event) {
        document.querySelector(".popup").style.display = "block";
        }, 1000);
        });
        
        document.querySelector("#close").addEventListener("click", function () {
        document.querySelector(".popup").style.display = "none";
        });
</script>

@endpush --}}

@endsection