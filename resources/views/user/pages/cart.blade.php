@extends('user.layouts.app')

@section('title')
Sidomulyo | Cart Page
@endsection

@section('content')

<style>
    .blog-page-list {
        text-align: center;
    }

    .input-qty {
        color: red
    }
</style>

<div class="pt-breadcrumb">
    <div class="container-fluid">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Cart</li>
        </ul>
    </div>
</div>

<main id="pt-pageContent">
    @php
    $totalPrice = 0
    @endphp
    <div class="container mt-4" style="padding-top: 30px;">
        <h1 class="pt-title-subpages noborder">Keranjang Belanja</h1>
        <div class="pt-shopcart-page">
            {{-- @if (session('status'))
            <div class="btn btn-success btn-block">
                {{ session('status') }}
            </div>
            @endif --}}
            @foreach ($carts as $item)
            <div class="pt-item">
                <div class="pt-item-btn mr-2">
                    {{-- <button class="pt-btn js-remove-item">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#icon-remove"></use>
                        </svg>
                    </button> --}}
                    <form action="{{ route('cart-delete', $item->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-remove-cart">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                <div class="pt-item-img">
                    <a href="#">
                        <img src="{{ Storage::url($item->product->galleries->first()->photos) }}"
                            style="width: 170px; height: 200px; object-fit: cover;" alt="">
                    </a>
                </div>
                @php
                $itemPrice = 0
                @endphp
                <div class="pt-item-description col-lg-12">
                    <div class="pt-col col-lg-5">
                        <h6 class="pt-title">
                            <a href="#">{{ $item->product->name }}</a>
                        </h6>
                        {{-- <ul class="pt-add-info">
                            <li>Color: <strong>Light Blue</strong></li>
                            <li>Size: <strong>XL</strong></li>
                            <li>Material: <strong>Cotton</strong></li>
                        </ul> --}}
                    </div>
                    <div class="pt-col col-lg-3">
                        <div class="pt-price">Rp. {{ number_format($item->product->price) }}</div>
                    </div>
                    <div class="pt-col col-lg-1">
                        <div class="pt-input-counter style-01">
                            {{-- <span class="minus-btn decrement-btn">
                                -
                            </span>
                            <input type="number" name="qty" class="qty-input" value="1">
                            <span class="plus-btn increment-btn">
                                +
                            </span> --}}
                            {{-- <select name="qty" class="quantity" id=""></select> --}}
                            {{-- @for ($i = 1; $i <= 10; $i++) <input type="number" class="quantity" name="qty"
                                value="1">
                                @endfor --}}
                                {{-- <input type="number" class="quantity" name="qty" value="{{ $item->qty }}"> --}}
                                {{-- <input type="number" class="quantity" name="qty" value="{{ $item->qty }}"> --}}
                                <div class="d-flex align-items-center">
                                    <a href="{{ url('/cart/update-quantity/'.$item->id.'/-1') }}"
                                        class="btn btn-primary">-</a>
                                    <input type="text" class="quantity" name="qty" min="0" step="1" class="input-qty"
                                        value="{{ $item->qty }}">
                                    <a href="{{ url('/cart/update-quantity/'.$item->id.'/1') }}"
                                        class="btn btn-primary">+</a>
                                </div>
                        </div>
                    </div>
                    <div class="pt-col col-lg-3 text-start">
                        <div class="pt-price">Rp. {{ number_format($item->product->price * $item->qty) }}</div>
                    </div>
                </div>
            </div>
            @php
            $totalPrice += $item->product->price * $item->qty
            @endphp
            @endforeach
            <div class="pt-shopcart-btn">
                <div class="pt-col">
                    <a href="{{ route('product') }}" class="btn-link btn-lg">
                        <div class="pt-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <use xlink:href="#icon-arrow_large_left"></use>
                            </svg>
                        </div>
                        <span class="pt-text">Lanjut Belanja</span>
                    </a>
                </div>
                {{-- <div class="pt-col">
                    <a href="#" class="btn-link btn-lg">
                        <div class="pt-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <use xlink:href="#icon-remove"></use>
                            </svg>
                        </div>
                        <span class="pt-text">Clear shopping cart</span>
                    </a>
                    <a href="#" class="btn-link btn-lg">
                        <div class="pt-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <use xlink:href="#icon-update"></use>
                            </svg>
                        </div>
                        <span class="pt-text">Update cart</span>
                    </a>
                </div> --}}
            </div>
        </div>
        <div class="pt-shopcart-wrapperbox">
            <form action="{{ route('checkout') }}" id="shopcartform" class="form-default" method="POST"
                novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="pt-shopcart-box">
                            <h6 class="pt-title">Alamat Dan Data Penerima</h6>
                            <p>
                                Masukan Alamat Pengiriman Dan Data Penerima Untuk Proses Pengiriman Jika Sudah
                                Selesai
                            </p>
                            <div class="form-wrapper">
                                <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                                <div class="form-group">
                                    <label>Nama Penerima *</label>
                                    <input type="text" name="name" class="form-control" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Hp Penerima *</label>
                                    <input type="text" name="phone_number" class="form-control" autocomplete="off"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Penerima *</label>
                                    <textarea name="address" class="form-control" rows="3" placeholder=""
                                        id="textareaMessage" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="pt-shopcart-box">
                            <h6 class="pt-title">Catatan</h6>
                            <p>
                                Tambah Catatan Jika Ada
                            </p>
                            <div class="form-default form-wrapper">
                                <textarea name="note" class="form-control" rows="7" placeholder="Enter message"
                                    id="textareaMessage" autocomplete="off">
                                    </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-4">
                        <div class="pt-shopcart-total">
                            <div class="pt-price-01">Total: Rp. {{ number_format($totalPrice ?? 0) }}</div>
                            <div class="pt-price-02">
                                Total Semua: Rp. {{ number_format($totalPrice ?? 0) }}
                            </div>
                            {{-- <div class="checkbox-group">
                                <input type="checkbox" id="checkBox41" name="checkbox" checked="">
                                <label for="checkBox41">
                                    <span class="check"></span>
                                    <span class="box"></span>
                                    I agree with the terms and conditions
                                </label>
                            </div> --}}
                            <button class="btn btn-block mt-4" type="submit">
                                <span class="pt-text">
                                    PROSES PEMBELIAN
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection


@push('addon-script')

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

{{-- <script type="text/javascript">
    (function(){
        const className = document.querySelectorAll('.quantity');

        Array.from(className).forEach(function(element){
            element.addEventListener('change', function(){
                const id = element.getAttribute('data-item');
                axios.patch(`/cart/${id}`, {
                    quantity: this.value,
                    id: id
                })
                .then(function (response) {
                    //console.log(response);
                    window.location.href = '/cart'
                })
                .catch(function (error) {
                    console.log(error);
                });
            })
        })
    })
</script> --}}

<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>

@endpush