@extends('user.layouts.app')

@section('title')
Sidomulyo | Blog Detail Page
@endsection

@section('content')

<div class="pt-breadcrumb">
    <div class="container-fluid">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('blog') }}">Blog</a></li>
            <li>Blog Detail</li>
        </ul>
    </div>
</div>
<div id="pt-pageContent">
    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <div class="pt-post-single">
                <h1 class="pt-title">{{ $blog->name }}</h1>
                <div class="pt-autor">
                    BY <span>{{ $blog->author }}</span> {{ $blog->created_at }}
                </div>
                <div class="pt-post-content">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img src="{{ Storage::url($blog->photos ?? '') }}"
                                style="width: 1000px; height: 300px; object-fit:cover;" alt="">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10 col-xl-8">
                            <p>{!! $blog->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection