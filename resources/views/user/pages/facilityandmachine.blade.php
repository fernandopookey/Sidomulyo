@extends('user.layouts.app')

@section('title')
Sidomulyo | Facility & Machine Page
@endsection

@section('content')

<main id="pt-pageContent">
    <div class="pt-breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Fasilitas Dan Mesin</li>
            </ul>
        </div>
    </div>
    <div class="container-indent">
        <h1 class="pt-title-subpages noborder">Fasilitas Dan Mesin</h1>
        <div class="container">
            <div class="row shadow">
                @foreach ($facilityandmachine as $item)
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body shadow-5">
                            <p>{!! $item->head !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body shadow-5">
                            <p>{!! $item->description !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

@endsection