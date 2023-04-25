@extends('user.layouts.app')

@section('title')
Sidomulyo | Machine Detail Page
@endsection

@section('content')

<div class="pt-breadcrumb">
    <div class="container-fluid">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('machine') }}">Mesin</a></li>
            <li>Detail Mesin</li>
        </ul>
    </div>
</div>
</div>
<div id="pt-pageContent">
    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <h1 class="pt-title-subpages noborder">{{ $machine->name }}</h1>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <div class="pt-listing-post">
                        <div class="pt-post">
                            <div class="pt-post-img">
                                <a href="#">
                                    <img src="{{ Storage::url($machine->photos ?? '') }}" alt="image">
                                </a>
                            </div>
                            <div class="pt-post-content">
                                <div class="pt-description">{!! $machine->description !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection