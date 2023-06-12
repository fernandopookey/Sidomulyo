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
            <li>Privacy Policy</li>
        </ul>
    </div>
</div>

<main id="pt-pageContent">
    <div class="container-indent">
        <div class="container">
            <h1 class="pt-title-subpages noborder">Privacy Policy</h1>
            <div class="row justify-content-md-center">
                @foreach ($privacyPolicy as $item)
                <div class="col-lg-10 col-xl-8">
                    <dl class="pt-type-01">
                        <dt>{{ $item->title }}</dt>
                        <dd>
                            <p>
                                {!! $item->description !!}
                            </p>
                        </dd>
                    </dl>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

@endsection