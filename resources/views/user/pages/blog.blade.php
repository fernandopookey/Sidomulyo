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
                                        by <span>{{ $item->author }}</span> {{ $item->created_at }}
                                    </div>
                                    <div class="pt-autor">
                                        sumber: <span><a href="{{ $item->source_link }}" target="_blank">{{
                                                $item->source }}</a></span>
                                    </div>
                                    <div class="pt-comments">
                                        <a href="blog-single-post.html"><i class="pt-icon"></i>25 COMMENT(S)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {!! $blog->render() !!}
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
                        <h3 class="pt-aside-title">Blog</h3>
                        <div class="pt-aside-content">
                            <ul class="pt-list-row">
                                <li><a href="page-faq.html">FAQs</a></li>
                                <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                <li><a href="page-privacy-policy.html">Cookie Policy</a></li>
                                <li><a href="page-terms.html">Terms and Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="pt-block-aside">
                        <h3 class="pt-aside-title">Recent Posts</h3>
                        <div class="pt-aside-content">
                            <div class="pt-aside-post">
                                <div class="item">
                                    <a href="blog-single-post.html">
                                        <div class="pt-title">Google Rich Snippet Tool, SEO Optimized, Checked by MOZ
                                            SEO Tool</div>
                                        <div class="pt-description">Lorem ipsum dolor sit amet conse ctetur adipisicing
                                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </div>
                                    </a>
                                    <div class="pt-info">
                                        by <span>Diego Lopez</span> on January 08, 2019 in
                                        <a href="#" title="Show articles tagged Cool">Cool</a>,
                                        <a href="#" title="Show articles tagged Vintage">Vintage</a>
                                    </div>
                                </div>
                                <div class="item">
                                    <a href="blog-single-post.html">
                                        <div class="pt-title">Flexible Banners Section</div>
                                        <div class="pt-description">Lorem ipsum dolor sit amet conse ctetur adipisicing
                                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </div>
                                    </a>
                                    <div class="pt-info">
                                        by <span>Diego Lopez</span> on January 08, 2019 in
                                        <a href="#" title="Show articles tagged Cool">Cool</a>,
                                        <a href="#" title="Show articles tagged Vintage">Vintage</a>
                                    </div>
                                </div>
                                <div class="item">
                                    <a href="blog-single-post.html">
                                        <div class="pt-title">Dynamic Checkout Buttons</div>
                                        <div class="pt-description">Lorem ipsum dolor sit amet conse ctetur adipisicing
                                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </div>
                                    </a>
                                    <div class="pt-info">
                                        by <span>Diego Lopez</span> on January 08, 2019 in
                                        <a href="#" title="Show articles tagged Cool">Cool</a>,
                                        <a href="#" title="Show articles tagged Vintage">Vintage</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-block-aside">
                        <h3 class="pt-aside-title">About</h3>
                        <div class="pt-aside-content">
                            <div class="pt-aside-info">
                                <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate.</p>
                                <a href="page-about.html" class="btn btn-border btn-top">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection