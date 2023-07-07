@extends('user.layouts.app')

@section('title')
    Sidomulyo Profil Page
@endsection

@section('content')
    <main id="pt-pageContent">
        <div class="pt-breadcrumb">
            <div class="container">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Profil</li>
                </ul>
            </div>
        </div>
        <div class="container-indent">
            <h1 class="pt-title-subpages noborder">Profil</h1>
            <div class="container">
                <div class="row pb-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="pt-img">
                            <div class="card">
                                <div class="card-body">
                                    <div class="pt-img-main">
                                        <div>
                                            <img src="{{ Storage::url($profile->photos ?? '') }}" class="js-init-parallax"
                                                data-orientation="up" data-overflow="true" style="max-width: 300px"
                                                data-scale="1.4" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="pt-description">
                            <div class="card">
                                <div class="card-body">
                                    <div class="pt-title">
                                        <h4>About Us</h4>
                                    </div>
                                    <p>{!! $profile->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4>Profil</h4>
                                <p>{!! $profile->proper !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4>Visi</h4>
                                <p>{!! $profile->visi !!}</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="pt-4">Misi</h4>
                                <p>{!! $profile->misi !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-4">
                    <a href="{{ asset('images/tes.pdf') }}" class="btn btn-primary">Download PDF</a>
                </div>
            </div>
        </div>
    </main>
@endsection
