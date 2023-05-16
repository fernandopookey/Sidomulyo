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
                <a href="{{ route('my-transaction') }}">Transaksi Saya</a>
            </li>
            <li>Detail Transaksi</li>
        </ul>
    </div>
</div>
<main id="pt-pageContent">
    <div class="container-indent">
        <div class="container">
            <h1 class="pt-title-subpages noborder">Detail Transaksi</h1>


            <div class="pt-wrapper">
                <h3 class="pt-title">Histori Pesanan</h3>
                <div class="pt-table-responsive">
                    <table class="pt-table-shop-01">
                        <thead>
                            <tr>
                                <th>Kode Detail Transaksi</th>
                                <th>Waktu</th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions->products as $item)
                            <tr>
                                <td>{{ $transactions->code }}</td>
                                <td>{{ $transactions->created_at }}</td>
                                <td>{{ $transactions->product->name }}</td>
                                <td>Rp. {{number_format($transactions->product->price) }}</td>
                                <td>
                                    <img src="{{ Storage::url($transactions->product->galleries->first()->photos ?? '') }}"
                                        style="height: 100px; width: 100px; object-fit: cover;" alt="">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

@endsection