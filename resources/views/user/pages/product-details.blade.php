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
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                *****
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
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. At ex ipsa
                                                eveniet amet distinctio, obcaecati officiis possimus officia quas
                                                voluptas illum porro architecto earum excepturi, nemo accusamus.
                                                Suscipit nisi quod ex voluptates accusantium similique asperiores
                                                pariatur voluptatum facilis corrupti odio quis cumque veritatis incidunt
                                                magni est explicabo unde ducimus eos delectus laudantium ratione
                                                perspiciatis, consectetur non! Necessitatibus est vitae pariatur ut rem
                                                minus veniam labore unde aspernatur at quisquam, dolores architecto
                                                exercitationem et aperiam facilis dolore. Laudantium recusandae qui
                                                debitis! Facilis optio sed illum dignissimos laboriosam dicta, animi
                                                molestias fugiat. Id officia veritatis at adipisci beatae quaerat dolore
                                                commodi ipsam ratione asperiores, tempora debitis laboriosam placeat
                                                omnis, officiis consequatur corporis aperiam similique sed nulla
                                                blanditiis deleniti alias. Ducimus laborum pariatur quos excepturi
                                                temporibus vel asperiores? Ipsa perspiciatis recusandae, in, obcaecati
                                                dolores nemo quas laborum odit perferendis voluptatibus numquam? Maiores
                                                molestias cum tenetur exercitationem quod mollitia porro nisi ipsam
                                                voluptas nam impedit dicta, obcaecati quasi architecto veniam modi
                                                dolores, doloremque neque optio qui aperiam ex? Qui aut reprehenderit
                                                voluptas eius excepturi quidem voluptatum sint ipsum, sed, dolore
                                                recusandae, cum consectetur. Dolorem itaque mollitia culpa provident
                                                deleniti ipsam expedita blanditiis, tempora at voluptate natus ipsa
                                                cumque libero a perferendis fugiat nobis officia?
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
                        <div class="pt-row-custom-01">
                            <div class="col-item">
                                {{-- <input type="hidden" value="{{ $product->id }}" class="prod_id"> --}}
                                <div class="pt-input-counter style-01">
                                    <span class="minus-btn decrement-btn">
                                        -
                                    </span>
                                    <input type="text" name="jml" class="qty-input" value="1">
                                    <span class="plus-btn increment-btn">
                                        +
                                    </span>
                                </div>
                            </div>
                            <form action="{{ route('detail-add', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="btn btn-block">
                                    Tambah Ke Keranjang
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="pt-wrapper">
                        <div class="pt-row-custom-03">
                            <div class="col-item">
                                <a href="#" class="btn btn-dark">
                                    <span class="pt-text">
                                        Beli Sekarang!
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
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

@endpush