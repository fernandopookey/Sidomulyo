@extends('user.layouts.app')

@section('title')
Sidomulyo | Blog Page
@endsection

@section('content')

<style>
    .blog-page-list {
        text-align: center;
    }
</style>

<div class="pt-breadcrumb">
    <div class="container-fluid">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Blog</li>
        </ul>
    </div>
</div>
<div id="pt-pageContent">
    <div class="container-indent">
        <div class="container">
            <h1 class="pt-title-subpages noborder">Blog</h1>
            <div class="pt-blog-masonry">
                <div
                    class="pt-blog-init pt-grid-col-2 pt-listing-col pt-add-item pt-show blog-page-list d-flex justify-content-between">
                    @foreach ($blog as $item)
                    <div class="element-item">
                        <div class="pt-post">
                            <div class="pt-post-img">
                                <a href="#">
                                    <img src="{{ Storage::url($item->photos ?? '') }}"
                                        style="width: 500px; height: 300px; object-fit:cover;" alt="">
                                </a>
                            </div>
                            <div class="pt-post-content">
                                <h2 class="pt-title">
                                    <a href="{{ route('blog-home-detail', $item->slug) }}">{{ $item->name }}</a>
                                </h2>
                                <div class="pt-description">
                                    {!! Illuminate\Support\Str::limit($item->description, 100) !!}
                                </div>
                                <div class="pt-meta text-uppercase">
                                    <div class="pt-autor">
                                        by <span>{{ $item->author }}</span>
                                        on {{ $item->created_at }}
                                    </div>
                                    {{-- <div class="pt-comments">
                                        <a href="#"><i class="pt-icon"></i>2 comment(s)</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- <div class="pt-pagination pt-pagination-center">
                <ul>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#" title="">2</a></li>
                    <li><a href="#" title="">3</a></li>
                </ul>
                <a href="#" class="btn-pagination btn-next">Next</a>
            </div> --}}
        </div>
    </div>
</div>

@endsection