@extends('user.layouts.app-register-success')

@section('title')
Sidomulyo | Register Success
@endsection

@section('content')


<div id="pt-pageContent">
    <div class="container-indent">
        <div class="container text-center">
            <h1 class="pt-title noborder">Registrasi Berhasil</h1>
            <p class="pt-title noborder pb-4">Selamat Datang di Website Sidomulyo Advertising</p>
            <div class="row-btn pt-4 pb-2">
                <button type="submit" class="btn btn-block" style="width: 200px">
                    <a href="{{ route('home') }}" style="color: white">Halaman Utama</a>
                </button>
            </div>
            <div class="form-content">
                <button type="button" class="btn btn-dark btn-block btn-top" style="width: 200px">
                    <a href="{{ route('product') }}" style="color: white;">Belanja</a>
                </button>
            </div>
        </div>
    </div>
</div>

@section('footer', false)

@endsection