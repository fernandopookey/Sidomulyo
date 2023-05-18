@extends('user.layouts.app')

@section('title')
Sidomulyo Transaction Page
@endsection

@section('content')

<main id="pt-pageContent">
    <div class="pt-breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Pesanan</li>
            </ul>
        </div>
    </div>
    <div class="container-indent">
        <div class="container">
            <h1 class="pt-title-subpages noborder">Pesanan Saya</h1>
            <div class="pt-wrapper">
                <h3 class="pt-title">Histori Pesanan</h3>
                <div class="pt-table-responsive">
                    <table class="pt-table-shop-01">
                        <thead>
                            <tr>
                                <th>Kode Pemesanan</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Konfirmasi Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $item)
                            <tr>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->transaction_status }}</td>
                                <td>Rp. {{ number_format($item->total_price) }}</td>
                                <td>
                                    <a href="{{ route('payment-confirmation', $item->id) }}">Konfirmasi pembayaran
                                        anda</a>
                                </td>
                                <td>
                                    <a href="{{ route('transaction-details', $item->id) }}">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection