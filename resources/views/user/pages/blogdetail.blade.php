@extends('user.layouts.app')

@section('title')
Sidomulyo | Blog Detail Page
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
            <div class="row pt-check-onecol">
                <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class="pt-post-single">
                        <div class="pt-post-content">
                            <div class="row">
                                <h4 class="pt-titl">{{ $blog->name }}</h4>
                                <div class="pt-autor">
                                    By <span>{{ $blog->author }}</span> {{ $blog->created_at }}
                                </div>
                                <div class="col-12 text-center">
                                    <img src="{{ Storage::url($blog->photos ?? '') }}"
                                        style="width: 1000px; height: 300px; object-fit:cover;" alt="">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <p>{!! $blog->description !!}</p>
                            </div>
                            <div class="pt-autor">
                                sumber: <span><a href="{{ $blog->source_link }}" target="_blank">{{
                                        $blog->source }}</a></span>
                            </div>
                        </div>
                    </div>
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