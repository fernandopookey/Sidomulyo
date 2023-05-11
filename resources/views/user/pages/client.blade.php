@extends('user.layouts.app')

@section('title')
Sidomulyo Client Page
@endsection

<style>
    .cobalagi {
        /* background-image: url('/images/neon3.jpeg') */
        background-image: url('<?php @foreach ($backgroundImage as $bi) <img src="{{ Storage::url($item->photos ?? '') }}" > ?>');

    }
</style>

@section('content')
<div class="pt-breadcrumb">
    <div class="container-fluid">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Client</li>
        </ul>
    </div>
</div>
<div id="pt-pageContent">
    <div class="container-indent">
        <div class="container cobalagi">
            <h1 class="pt-title-subpages noborder">Our Client</h1>
            <div class="pt-blog-masonry">
                <div class="pt-blog-init pt-grid-col-3 pt-listing-col pt-add-item pt-show">
                    @foreach ($client as $item)
                    <div class="element-item pb-4 pt-4">
                        <div class="pt-post text-center">
                            <div class="pt-post-img">
                                <a href="#">
                                    <img src="{{ Storage::url($item->photos ?? '') }}"
                                        style="width: 250px; height: 150px; object-fit: contain;" alt="">
                                </a>
                            </div>
                            <div class="pt-post-content">
                                <h5 class="pt-title">{{ $item->name }}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @foreach ($backgroundImage as $bi)
                    <div class="element-item pb-4 pt-4">
                        <div class="pt-post text-center">
                            <div class="pt-post-img">
                                <a href="#">
                                    <img src="{{ Storage::url($bi->photos ?? '') }}"
                                        style="width: 250px; height: 150px; object-fit: contain;" alt="">
                                </a>
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