@extends('user.layouts.app')

@section('title')
Sidomulyo | Facility Page
@endsection

@section('content')

<div class="pt-breadcrumb">
    <div class="container-fluid">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Fasilitas</li>
        </ul>
    </div>
</div>
<div id="pt-pageContent">
    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <h1 class="pt-title-subpages noborder">Fasilitas</h1>
            <div class="pt-layout-col-promo">
                <div class="row justify-content-center">
                    @foreach ($facility as $item)
                    <div class="col-6 col-md-4">
                        <a href="#" class="pt-promo-box">
                            <div class="image-box">
                                <img src="{{ Storage::url($item->photos ?? '') }}" class="lazyload" alt="Coats">
                            </div>
                            <div class="pt-description pr-promo-type1 pt-point-external">
                                <div class="pt-description-wrapper">
                                    <div class="pt-title-large">
                                        <span>{{ $item->name }}</span>
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