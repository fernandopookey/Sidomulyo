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
            $totalPrice = 0;
        @endphp
        <div class="container mt-4" style="padding-top: 30px;">
            <h1 class="pt-title-subpages noborder">Keranjang Belanja</h1>
            <div class="pt-shopcart-page">
                @foreach ($carts as $item)
                    <div class="pt-item">
                        <div class="pt-item-btn mr-2">
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
                            $itemPrice = 0;
                        @endphp
                        <div class="pt-item-description col-lg-12">
                            <div class="pt-col col-lg-5">
                                <h6 class="pt-title">
                                    <a href="#">{{ $item->product->name }}</a>
                                </h6>
                            </div>
                            <div class="pt-col col-lg-3">
                                <div class="pt-price">{{ formatRupiah($item->product->price) }}</div>
                            </div>
                            <div class="pt-col col-lg-1">
                                <div class="pt-input-counter style-01">
                                    <div class="d-flex align-items-center">
                                        {{-- <a href="{{ url('/cart/update-quantity/' . $item->id . '/-1') }}"
                                            class="btn btn-primary">-</a>
                                        <input type="text" class="quantity" name="qty" min="1" step="1"
                                            class="input-qty" value="{{ $item->qty }}">
                                        <a href="{{ url('/cart/update-quantity/' . $item->id . '/1') }}"
                                            class="btn btn-primary">+</a> --}}
                                        <button class="btn btn-primary"
                                            onclick="increaseQty({{ $item->id }}, {{ $item->product->price }}, {{ $item->qty }})">+</button>
                                        <div class="qty valorant" id="cartQtyValue-{{ $item->id }}"
                                            data-itemprice="{{ $item->product->price }}">
                                            {{ $item->qty }}
                                        </div>
                                        <button class="btn btn-primary" id="btnMinus-{{ $item->id }}"
                                            onclick="decreaseQty({{ $item->id }}, {{ $item->product->price }}, {{ $item->qty }})"
                                            @if ($item->qty == 1) disabled @endif>-</button>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="pt-col col-lg-1">
                        <div class="pt-input-counter style-01">
                            <div class="d-flex align-items-center">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" class="quantity qty-input" name="qty" min="0" step="1"
                                    class="input-qty" value="{{ $item->qty }}">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                    </div> --}}
                            <div class="pt-col col-lg-3 text-start">
                                <div class="pt-price jayho" id="priceProductCart-{{ $item->id }}"
                                    data-totalprice="{{ $item->product->price * $item->qty }}">
                                    {{ formatRupiah($item->product->price * $item->qty) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $totalPrice += $item->product->price * $item->qty;
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
                                    <input type="hidden" name="total_price" id='totalPriceInput'
                                        data-totaltotalprice="{{ $totalPrice }}" value="{{ $totalPrice }}">
                                    <div class="form-group">
                                        <label>Nama Penerima *</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $user->fullname }}" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $user->email }}" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Hp Penerima *</label>
                                        <input type="text" name="phone_number" class="form-control"
                                            value="{{ $user->phone_number }}" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Penerima *</label>
                                        <textarea name="address" class="form-control" rows="3" placeholder="" id="textareaMessage" required>{!! $user->address !!}</textarea>
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
                                    <textarea name="note" class="form-control" id="textareaMessage" autocomplete="off"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8 col-lg-4">
                            <div class="pt-shopcart-total">
                                {{-- <div class="pt-price-01" id="firstTotalPrice" data-totalPrice="{{ $totalPrice }}">
                                    Total:
                                    {{ formatRupiah($totalPrice ?? 0) }}</div> --}}
                                <div class="pt-price-02" id="firstTotalPrice"
                                    data-totaltotalprice="{{ $totalPrice }}">
                                    Total Semua: {{ formatRupiah($totalPrice) ?? 0 }}
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
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
@endpush
