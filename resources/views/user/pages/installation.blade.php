@extends('user.layouts.app')

@section('title')
Sidomulyo Installation Page
@endsection

@section('content')

<div class="pt-breadcrumb">
    <div class="container-fluid">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Pemasangan</li>
        </ul>
    </div>
</div>
<div id="pt-pageContent">
    <div class="container-indent">
        <div class="container">
            <h1 class="pt-title-subpages noborder">Pemasangan</h1>
            <div class="pt-blog-masonry justify-content-around">
                <div class="pt-blog-init pt-grid-col-3 pt-listing-col pt-add-item pt-show">
                    @foreach ($installation as $item)
                    <div class="element-item">
                        <div class="pt-post">
                            <div class="pt-post-img">
                                <a href="#">
                                    <img src="{{ Storage::url($item->photos ?? '') }}" alt="">
                                </a>
                            </div>
                            <div class="pt-post-content">
                                <h5 class="pt-title">{{ $item->name }}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection