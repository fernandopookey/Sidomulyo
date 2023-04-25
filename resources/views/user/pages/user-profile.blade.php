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
            <h1 class="pt-title-subpages noborder">Akun Saya</h1>
            <div class="pt-account-layout">
                <div class="pt-wrapper">
                    <h3 class="pt-title">Detail Akun</h3>
                    <div class="pt-table-responsive">
                        <table class="pt-table-shop-02">
                            <tbody>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>user@gmail.com user@gmail.com </td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>user2@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>Euser2@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>Commodo consequat. Duis aute irure dol</td>
                                </tr>
                                <tr>
                                    <td>Nomor Handphone / Whatsapp</td>
                                    <td>08080808</td>
                                </tr>
                                <tr>
                                    <td>Foto</td>
                                    <td>3242</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="#" class="btn btn-border">View Addresses 1</a>
                </div>
                <div class="pt-wrapper">
                    <h3 class="pt-title">Histori Pesanan</h3>
                    <div class="pt-table-responsive">
                        <table class="pt-table-shop-01">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Date</th>
                                    <th>Payment Status</th>
                                    <th>Fulfillment Status</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="page-account_order.html">#001</a></td>
                                    <td>09 Jan 01:09</td>
                                    <td>Pending</td>
                                    <td>Unfulfilled</td>
                                    <td>$30.00</td>
                                </tr>
                                <tr>
                                    <td><a href="page-account_order.html">#002</a></td>
                                    <td>19 Jan 01:09</td>
                                    <td>Pending</td>
                                    <td>Unfulfilled</td>
                                    <td>$10.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection