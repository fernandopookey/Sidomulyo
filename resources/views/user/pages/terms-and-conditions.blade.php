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
            <li>Syarat Dan Ketentuan</li>
        </ul>
    </div>
</div>

<main id="pt-pageContent">
    <div class="container-indent">
        <div class="container">
            <h1 class="pt-title-subpages noborder">Terms And Conditions</h1>
            <div class="row justify-content-md-center">
                <div class="col-lg-10 col-xl-8">
                    @foreach ($terms as $item)
                    <div class="pt-accordeon">
                        <div class="pt-item active">
                            <div class="pt-accordeon-title">
                                {{ $item->title }}
                            </div>
                            <div class="pt-accordeon-content">
                                <div class="pt-inner-indent">
                                    <p>
                                        {!! $item->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>

@endsection