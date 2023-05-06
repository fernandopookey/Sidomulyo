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
                    <form action="{{ route('dashboard-settings-redirect', 'dashboard-settings-account') }}"
                        id="locations" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h3 class="pt-title">Biodata</h3>
                        <div class="pt-table-responsive">
                            <table class="pt-table-shop-02">
                                <tbody>
                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td>
                                            <div class="input-group input-group-static">
                                                <input type="text" name="fullname" class="form-control"
                                                    value="{{ $user->fullname }}" required>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>
                                            <div class="input-group input-group-static">
                                                <input type="text" name="username" class="form-control"
                                                    value="{{ $user->username }}" required>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            <div class="input-group input-group-static">
                                                <input type="text" name="email" class="form-control"
                                                    value="{{ $user->email }}" required>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>
                                            <div class="input-group input-group-static">
                                                <input type="text" name="address" class="form-control"
                                                    value="{{ $user->address }}" required>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Handphone / Whatsapp</td>
                                        <td>
                                            <div class="input-group input-group-static">
                                                <input type="text" name="phone_number" class="form-control"
                                                    value="{{ $user->phone_number }}" required>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <td>Foto</td>
                                        <td>3242</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-secondary">Ubah Profil</button>
                    </form>
                </div>
                {{-- <a href="#" class="btn btn-border">Ubah Profil</a> --}}
            </div>


            <div class="pt-wrapper">
                <h3 class="pt-title">Histori Pesanan</h3>
                <div class="pt-table-responsive">
                    <table class="pt-table-shop-01">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $item)
                            <tr>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->transaction->transaction_status }}</td>
                                <td>{{ $item->product->price }}</td>
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