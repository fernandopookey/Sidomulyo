@extends('user.layouts.app')

@section('title')
Sidomulyo | Machine Page
@endsection

@section('content')

<div class="pt-breadcrumb">
    <div class="container-fluid">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Mesin</li>
        </ul>
    </div>
</div>
<div id="pt-pageContent">
    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <h1 class="pt-title-subpages noborder text-uppercase">Mesin</h1>
            <div class="pt-layout-col-promo">
                <div class="row justify-content-around">
                    @foreach ($machine as $item)
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="{{ route('machine-detail', $item->name) }}" class="pt-promo-box">
                            <div class="image-box">
                                <img src="{{ Storage::url($item->photos ?? '') }}" alt="">
                            </div>
                            <div class="pt-description pr-promo-type1 pt-point-external">
                                <div class="pt-description-wrapper">
                                    <div class="pt-title-large">
                                        {{-- <a href="{{ route('machine-detail', $item->name) }}"
                                            class="pt-title-small"> --}}
                                            <span>{{ $item->name }}</span>
                                            {{-- </a> --}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection