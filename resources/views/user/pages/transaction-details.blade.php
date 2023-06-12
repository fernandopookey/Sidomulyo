@extends('user.layouts.app')

@section('title')
Sidomulyo | My Profile Page
@endsection

@section('content')

<div class="pt-breadcrumb">
    <div class="container-fluid">
        <ul>
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li>
                <a href="{{ route('my-transaction') }}">Pesanan</a>
            </li>
            <li>Detail Pemesanan</li>
        </ul>
    </div>
</div>
<main id="pt-pageContent">
    <div class="container-indent">
        <div class="container">
            <h1 class="pt-title-subpages noborder">Detail Pemesanan</h1>

            <div class="pt-account-layout">
                <div class="pt-wrapper">
                    <h3 class="pt-title">Biodata Pemesanan</h3>
                    <div class="pt-table-responsive">
                        <table class="pt-table-shop-02">
                            <tbody>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>
                                        <div class="input-group input-group-static">
                                            <input type="text" name="fullname" class="form-control"
                                                value="{{ $transactions->name }}" required disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                        <div class="input-group input-group-static">
                                            <input type="text" name="email" class="form-control"
                                                value="{{ $transactions->email }}" required disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>
                                        <div class="input-group input-group-static">
                                            <input type="text" name="address" class="form-control"
                                                value="{{ $transactions->address }}" required disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nomor Handphone / Whatsapp</td>
                                    <td>
                                        <div class="input-group input-group-static">
                                            <input type="text" name="phone_number" class="form-control"
                                                value="{{ $transactions->phone_number }}" required disabled>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="pt-wrapper">
                    <h3 class="pt-title">Detail Produk</h3>
                    <div class="pt-table-responsive">
                        <table class="pt-table-shop-01">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Harga Produk</th>
                                    <th>Jumlah Produk</th>
                                    <th>Gambar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions->transactiondetails as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->product->price }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>
                                        <img src="{{ Storage::url($item->product->galleries->first()->photos ?? '') }}"
                                            style="height: 100px; width: 120px; object-fit: cover;" alt="">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-2">
                    <a href="{{ route('my-transaction') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection