@extends('user.layouts.app')

@section('title')
Sidomulyo | Blog Page
@endsection

@section('content')

<style>
    .blog-page-list {
        text-align: center;
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff !important;
        background-color: #48cab2 !important;
        border-color: #48cab2 !important;
        border-radius: 50%;
        padding: 6px 12px;
    }

    .page-link {
        z-index: 3;
        color: #00ACD6 !important;
        background-color: #fff;
        border-color: #48cab2;
        border-radius: 50%;
        padding: 6px 12px !important;
    }

    .page-item:first-child .page-link {
        border-radius: 30% !important;
    }

    .page-item:last-child .page-link {
        border-radius: 30% !important;
    }

    .pagination li {
        padding: 3px;
    }

    .disabled .page-link {
        color: #212529 !important;
        opacity: 0.5 !important;
    }
</style>

<div class="pt-breadcrumb">
    <div class="container-fluid">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li>Selected Menu Item</li>
        </ul>
    </div>
</div>
<div id="pt-pageContent">
    <div class="container-indent">
        <div class="container">
            <h1 class="pt-title-subpages noborder">Blog</h1>
            <div class="row pt-check-onecol">
                <div class="col-sm-12 col-md-8 col-lg-8">
                    @foreach ($blog as $item)
                    <div class="pt-listing-post">
                        <div class="pt-post">
                            <div class="pt-post-img">
                                <a href="#">
                                    <img src="{{ Storage::url($item->photos ?? '') }}"
                                        style="width: 1000px; height: 500px; object-fit: cover;" alt="image">
                                </a>
                            </div>
                            <div class="pt-post-content">
                                <h2 class="pt-title"><a href="{{ route('blog-home-detail', $item->slug) }}">{{
                                        $item->name }}</a>
                                </h2>
                                <div class="pt-description">{!! Illuminate\Support\Str::limit($item->description, 150)
                                    !!}</div>
                                <div class="pt-meta">
                                    <div class="pt-autor">
                                        by <span>{{ $item->author }}</span> {{ $item->created_at->format('d M Y') }}
                                    </div>
                                    <div class="pt-autor">
                                        sumber: <span><a href="{{ $item->source_link }}" target="_blank">{{
                                                $item->source }}</a></span>
                                    </div>
                                    <div class="pt-comments">
                                        <a href="#"><i class="pt-icon"></i>25 COMMENT(S)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="mt-4 pagination">
                        {!! $blog->render() !!}
                    </div>
                    {{-- <div class="pt-pagination">
                        <ul>
                            {{ $item->links }}
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#" title="">2</a></li>
                            <li><a href="#" title="">3</a></li>
                        </ul>
                        <a href="#" class="btn-pagination btn-next">Next</a>
                    </div> --}}
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 rightColumn indent-aside-col">
                    <div class="pt-block-aside">
                        <h3 class="pt-aside-title">Our Policies</h3>
                        <div class="pt-aside-content">
                            <ul class="pt-list-row">
                                <li><a href="{{ route('faqs') }}">FAQs</a></li>
                                <li><a href="{{ route('privacyPolicy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('termsAndConditions') }}">Terms and Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="pt-block-aside">
                        <h3 class="pt-aside-title">Postingan Terbaru</h3>
                        <div class="pt-aside-content">
                            <div class="pt-aside-post">
                                @foreach ($latestPost as $item)
                                <div class="item">
                                    <a href="{{ route('blog-home-detail', $item->slug) }}">
                                        <div class="pt-title">{{ $item->name }}</div>
                                        <div class="pt-description">{!!
                                            Illuminate\Support\Str::limit($item->description, 150)
                                            !!}</div>
                                    </a>
                                    <div class="pt-info">
                                        by <span>{{ $item->author }}</span> {{ $item->created_at->format('d M Y') }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="pt-block-aside">
                        <h3 class="pt-aside-title">Tentang Kami</h3>
                        <div class="pt-aside-content">
                            <div class="pt-aside-info">
                                <p>{!!
                                    Illuminate\Support\Str::limit($about->description, 150)
                                    !!}</p>
                                <a href="{{ route('profile') }}" class="btn btn-border btn-top">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection