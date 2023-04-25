@extends('user.layouts.app')

@section('title')
Sidomulyo | Cart Page
@endsection

@section('content')

<style>
    .blog-page-list {
        text-align: center;
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
    <div class="container-indent">
        <div class="container">
            <h1 class="pt-title-subpages noborder">Keranjang Belanja</h1>
            <div class="pt-shopcart-page">
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
                            <img src="{{ Storage::url($item->product->galleries->first()->photos) }}" alt="">
                        </a>
                    </div>
                    @php
                    $itemPrice = 0
                    @endphp
                    <div class="pt-item-description">
                        <div class="pt-col">
                            <h6 class="pt-title">
                                <a href="#">{{ $item->product->name }}</a>
                            </h6>
                            {{-- <ul class="pt-add-info">
                                <li>Color: <strong>Light Blue</strong></li>
                                <li>Size: <strong>XL</strong></li>
                                <li>Material: <strong>Cotton</strong></li>
                            </ul> --}}
                        </div>
                        <div class="pt-col">
                            <div class="pt-price">Rp. {{ number_format($item->product->price) }}</div>
                        </div>
                        {{-- <div class="pt-col">
                            <div class="pt-input-counter style-01">
                                <span class="minus-btn">
                                    <svg>
                                        <use xlink:href="#icon_minus"></use>
                                    </svg>
                                </span>
                                <input type="text" value="-1" size="10">
                                <span class="plus-btn">
                                    <svg>
                                        <use xlink:href="#icon_add"></use>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="pt-col">
                            <div class="pt-price">$24.78</div>
                        </div> --}}
                    </div>
                </div>
                @php
                $totalPrice += $item->product->price
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
                                    {{-- <div class="form-group">
                                        <label>Email *</label>
                                        <select name="bank" class="form-control">
                                            <option value="BNI">Pending</option>
                                            <option value="BRI">BRI</option>
                                        </select>
                                    </div> --}}
                                    {{-- <div class="form-group">
                                        <label>Last Name *</label>
                                        <select class="form-control">
                                            <option>john.smith@example.com</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">Email Address *</label>
                                        <input type="text" name="name" class="form-control" id="inputEmail"
                                            placeholder="john.smith@example.com">
                                    </div>
                                    <button type="button" class="btn btn-dark">Calculate shipping</button> --}}
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
    </div>
</main>

@endsection


@push('addon-script')



<script>
    (function(){
        alert('hi');
    })();
</script>

@endpush