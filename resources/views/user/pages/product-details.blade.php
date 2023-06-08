@extends('user.layouts.app')

@section('title')
Sidomulyo | Product Detail Page
@endsection

@section('content')

<style>
    .pt-breadcrumb {
        margin-bottom: 100px;
    }

    .thumbnail-image {
        padding-bottom: 10px;
    }

    .page-content {
        margin-top: 100px;
    }

    .pt-price {
        padding-top: 10px;
    }

    .btn-add-cart {
        background: transparent;
        border: none !important;
        color: white;
    }


    /* Rating */
    .rating-css div {
        color: #ffe400;
        font-size: 30px;
        font-family: sans-serif;
        font-weight: 800;
        text-align: center;
        text-transform: uppercase;
        padding: 20px 0;
    }

    .rating-css input {
        display: none;
    }

    .rating-css input+label {
        font-size: 60px;
        text-shadow: 1px 1px 0 #8f8420;
        cursor: pointer;
    }

    .rating-css input:checked+label~label {
        color: #b4afaf;
    }

    .rating-css label:active {
        transform: scale(0.8);
        transition: 0.3s ease;
    }

    /* Rating Custom */
    .checked {
        color: #ffd900;
    }
</style>

<div class="pt-breadcrumb">
    <div class="container-fluid">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('product') }}">Produk</a></li>
            <li>Detail Produk</li>
        </ul>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('add-rating') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Rate {{ $product->name }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">
                            @if ($userRating)
                            @for ($i = 1; $i <= $userRating->stars_rated; $i++) <input type="radio" value="{{ $i }}"
                                    name="product_rating" checked id="rating{{ $i }}">
                                <label for="rating{{ $i }}" class="fa fa-star"></label> @endfor
                                @for ($j= $userRating->stars_rated + 1;
                                $j <=5; $j++) <input type="radio" value="{{ $j }}" name="product_rating"
                                    id="rating{{ $j }}">
                                    <label for="rating{{ $j }}" class="fa fa-star"></label>
                                    @endfor

                                    @else
                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                    @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<section class="store-gallery mb-5 mt-4 page-content" id="gallery">
    <div class="container">
        <div class="row">
            <div class="col-lg-1">
                <div class="row">
                    <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id"
                        data-aos="zoom-in" data-aos-delay="100">
                        <a href="#" @click="changeActive(index)">
                            <img :src="photo.url" class="thumbnail-image" :class="{ active: index == activePhoto }"
                                style="width: 100px; height:100px; object-fit: cover;" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5" data-aos="zoom-in">
                <transition name="slide-fade" mode="out-in">
                    <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="main-image"
                        style="width: 700px; height:500px; object-fit: cover;" alt="">
                </transition>
            </div>
            <div class="col-lg-6">
                <div class="pt-product-single-info">
                    <h1 class="pt-title">{{ $product->name }}</h1>
                    <div class="pt-price">
                        Rp. {{ number_format($product->price) }}
                    </div>
                    <div class="pt-swatches-container">
                        <div class="pt-wrapper">
                            <div class="pt-title-options">Kategori: <strong>{{ $product->categories->name }}</strong>
                            </div>
                        </div>
                    </div>
                    @php $ratenum = number_format($rating_value) @endphp
                    <div class="rating">
                        @for ($i = 1; $i <= $ratenum; $i++) <i class="fa fa-star checked"></i>
                            @endfor
                            @for ($j = $ratenum + 1; $j <= 5; $j++) <i class="fa fa-star"></i>
                                @endfor
                                <span>
                                    @if ($rating->count() > 0)
                                    {{ $rating->count() }} Penilaian
                                    @else
                                    Belum ada penilaian
                                    @endif
                                </span>
                    </div>
                    <div class="pt-collapse-block" id="accordionFlushExample">
                        <div class="pt-item">
                            <div class="pt-collapse-title accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" id="flush-headingOne" data-bs-target="#flush-collapseOne"
                                aria-expanded="false" aria-controls="flush-collapseOne">
                                Deskripsi
                            </div>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                {!! $product->description !!}
                            </div>
                        </div>
                        <div class="pt-item">
                            <div class="pt-collapse-title accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" id="flush-headingTwo" data-bs-target="#flush-collapseTwo"
                                aria-expanded="false" aria-controls="flush-collapseOne">
                                Informasi Tambahan
                            </div>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                {!! $product->additional_info !!}
                            </div>
                        </div>
                        <div class="pt-item">
                            <div class="pt-collapse-title accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" id="flush-headingThree" data-bs-target="#flush-collapseThree"
                                aria-expanded="false" aria-controls="flush-collapseOne">
                                Ulasan
                            </div>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Rate this product
                            </button>

                            <a href="{{ url('add-review/' . $product->slug . '/userreview') }}" type="button"
                                class="btn btn-primary">
                                Tambah Ulasan
                            </a>
                        </div>
                        <div class="row mt-4 ">
                            <div class="pt-item">
                                @foreach ($reviews as $item)
                                <div class="user-review py-2">
                                    <label for="">{{' ' . $item->user->username }}</label>
                                    @if ($item->user_id == Auth::id())
                                    <a href="{{ url('edit-review/' . $product->slug . '/userreview') }}">edit</a>

                                    @endif
                                    <br>
                                    @php
                                    $rating = App\Models\Rating::where('product_id', $product->id)->where('user_id',
                                    $item->user->id)->first();
                                    @endphp
                                    @if ($rating)
                                    @php
                                    $user_rated = $rating->stars_rated
                                    @endphp
                                    @for ($i = 1; $i <= $user_rated; $i++) <i class="fa fa-star checked"></i>
                                        @endfor
                                        @for ($j = $user_rated + 1; $j <= 5; $j++) <i class="fa fa-star"></i>
                                            @endfor
                                            @endif
                                            <small>Reviewed on {{ $item->created_at->format('d M Y') }}</small>
                                            <p>{{ $item->user_review }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="pt-wrapper">
                        <div class="product-information-buttons">
                            <a data-toggle="modal" data-target="#modalProductInfo-02" href="#">
                                <span class="pt-icon">
                                    <svg>
                                        <use xlink:href="#icon-services_delivery"></use>
                                    </svg>
                                </span>
                                <span class="pt-text" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Pengiriman
                                </span>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Pengiriman</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="container modal-body">
                                                <h5>{{ $delivery->title }}</h5>
                                                <p>{!! $delivery->description !!}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a data-toggle="modal" data-target="#modalProductInfo-03" href="#">
                                <span class="pt-icon">
                                    <svg>
                                        <use xlink:href="#icon-mail"></use>
                                    </svg>
                                </span>
                                <span class="pt-text">
                                    Tanya Mengenai Produk Ini
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="pt-wrapper">
                        <form action="{{ route('detail-add', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="pt-row-custom-01">
                                <div class="col-item">
                                    {{-- <input type="hidden" value="{{ $product->id }}" class="prod_id"> --}}
                                    <div class="pt-input-counter style-01">
                                        {{-- <span class="minus-btn decrement-btn">
                                            -
                                        </span>
                                        <input type="text" name="jml" class="qty-input" value="1">
                                        <span class="plus-btn increment-btn">
                                            +
                                        </span> --}}
                                        <input type="number" class="quantity" name="qty" value="1">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block">
                                    Tambah Ke Keranjang
                                </button>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="pt-wrapper">
                        <div class="pt-row-custom-03">
                            <div class="col-item">
                                <a href="#" class="btn btn-dark">
                                    <span class="pt-text">
                                        Beli Sekarang!
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="pt-wrapper">
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <script type="text/javascript"
                            src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5cb03aae6a4f75e3">
                        </script>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <div class="pt-block-title">
                <h4 class="pt-title">Produk Terkait</h4>
            </div>
            <div class="js-init-carousel js-align-arrow row arrow-location-center-02 pt-layout-product-item">
                @if (count($product->related_products)>0)
                @foreach ($product->related_products as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="pt-product">
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
                            <a href="{{ route('product-details', $item->id) }}">
                                <span class="pt-img">
                                    @if ($item->galleries->count())
                                    <img src="{{ Storage::url($item->galleries->first()->photos ?? '') }}"
                                        class="lazyload" style="width:300px; height: 250px; object-fit: cover;"
                                        alt="image">
                                    @else
                                    <img src="/images/blank.png" style="width:300px; height: 250px; object-fit: cover;"
                                        alt="">
                                    @endif
                                </span>
                            </a>
                        </div>
                        <div class="pt-description">
                            <div class="pt-col">
                                <ul class="pt-add-info">
                                    <li><a href="#">Kategori {{ $item->categories->name }}</a></li>
                                </ul>
                                <h2 class="pt-title"><a href="product-type-03.html">{{ $item->name }}</a></h2>
                                {{-- <div class="pt-price">
                                    $34.89
                                </div> --}}
                                {{-- <div class="pt-option-block">
                                    <ul class="pt-options-swatch">
                                        <li class="active">
                                            <a href="#">XS</a>
                                        </li>
                                        <li><a href="#">S</a></li>
                                        <li><a href="#">M</a></li>
                                    </ul>
                                </div> --}}
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
                                        @auth
                                        <form action="{{ route('detail-add', $item->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
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
                @endif
            </div>
        </div>
    </div>
</section>

@endsection


@push('addon-script')

<script src="/vendor/vue/vue.js"></script>

<script>
    var gallery = new Vue({
      el: "#gallery",
      mounted() {
        AOS.init();
      },
      data: {
        activePhoto: 0,
        photos: [
          @foreach ($product->galleries as $gallery)
            {
                id: {{ $gallery->id }},
                url: "{{ Storage::url($gallery->photos) }}"
            },
          @endforeach
        ]
      },
      methods: {
        changeActive(id) {
          this.activePhoto = id;
        }
      }
    })
</script>

<script>
    $(document).ready(function () {

        $('.addToCartBtn').click(function (e){
            e.preventDefault();
            // var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty_input').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // $.ajax({
            //     method: "POST",
            //     url: "/detail-add",
            //     data: {
            //         'product_id': product_id,
            //         'product_qty': product_qty,
            //     },
            //     dataType: "dataType",
            //     success: function (response){

            //     }
            // });

            // alert(product_id);
            alert(product_qty);
        });

        $('.increment-btn').click(function (e) {
            e.preventDefault();

            var inc_value = $('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10)
            {
                value++;
                $('.qty-input').val(value);
            }
        });
        $('.decrement-btn').click(function (e) {
            e.preventDefault();

            var dec_value = $('.qty-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 1)
            {
                value--;
                $('.qty-input').val(value);
            }
        });
    });
</script>

<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>
@endpush