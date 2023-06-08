@extends('user.layouts.app')

@section('title')
Sidomulyo | Product Review Edit Page
@endsection

@section('content')

<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5>You are writing a review for {{ $review->product->name }}</h5>
                    <form action="{{ url('/update-review') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="review_id" value="{{ $review->id }}">
                        <textarea class="form-control" name="user_review" rows="10"
                            placeholder="Write a review">{{ $review->user_review }}</textarea>
                        <button type="submit" class="btn btn-primary mt-4">Update Ulasan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('addon-script')
<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>

<script>
    @if (Session::has('danger'))
        toastr.success("{{ Session::get('danger') }}")
    @endif
</script>
@endpush