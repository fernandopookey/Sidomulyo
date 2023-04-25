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
                <li>Transaksi</li>
            </ul>
        </div>
    </div>
    <div class="container-indent">
        <h1 class="pt-title-subpages noborder">Profil</h1>
        <h3>Halaman Transaksi</h3>
        {{-- <div class="container">
            @foreach ($profile as $item)
            <div class="row pb-4">
                <div class="pt-about">
                    <div class="pt-img">
                        <div class="pt-img-main">
                            <div>
                                <img src="{{ Storage::url($item->photos ?? '') }}" class="js-init-parallax"
                                    data-orientation="up" data-overflow="true" style="max-width: 300px" data-scale="1.4"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <div class="pt-description">
                        <div class="pt-title">
                            <h4>About Us</h4>
                        </div>
                        <p>{!! $item->description !!}</p>
                    </div>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="body">
                        <div class="body-card">
                            <h4>Profil</h4>
                            <p>{!! $item->proper !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="body">
                        <div class="body-card">
                            <h4>Visi</h4>
                            <p>{!! $item->visi !!}</p>
                            <h4 class="pt-4">Misi</h4>
                            <p>{!! $item->misi !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div> --}}
    </div>
</main>

@endsection