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
            <li>Profil Saya</li>
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
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction_details as $item)
                            <tr>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->transaction_status }}</td>
                                <td>{{ $item->total_price }}</td>
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