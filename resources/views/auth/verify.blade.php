@extends('user.layouts.app-email-verify')

@section('title')
Sidomulyo | Verifikasi Email
@endsection

@section('content')

<div id="pt-pageContent">
    <div class="container-indent">
        <div class="container text-center">
            <div class="col-md-12">
                <div class="card justify-content-center">
                    <div class="card-header">{{ __('Verifikasi email anda') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Link verifikasi telah dikirim ke alamat email anda.') }}
                        </div>
                        @endif

                        {{ __('Sebelum lanjut, cek link yang sudah kami kirim ke email yang anda
                        daftarkan untuk verifikasi.') }}
                        {{ __('Jika anda tidak menerima email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary px-2 align-baseline border-1">
                                {{ __('Klik disini untuk mengirim link yang baru') }}
                            </button>.
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection




{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request
                            another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}