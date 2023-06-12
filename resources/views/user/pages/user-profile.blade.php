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
                                                    value="{{ $user->email }}" disabled>
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
                    {{-- <div class="row-btn mt-4">
                        <a href="{{ route('change-password') }}">
                            <button type="button" class="btn btn-secondary">Ganti Password</button>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
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