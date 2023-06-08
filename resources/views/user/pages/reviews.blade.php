@extends('user.layouts.app')

@section('title')
Sidomulyo | Product Review Page
@endsection

@section('content')

<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($verified_purchase->count() > 0)
                    <h5>You are writing a review for {{ $product->name }}</h5>
                    <form action="{{ url('/add-review') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <textarea class="form-control" name="user_review" rows="10"
                            placeholder="Write a review"></textarea>
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
                    @else
                    <div class="alert alert-danger">
                        <h5>Anda tidak memenuhi syarat untuk memberika ulasan pada produk ini!!</h5>
                        <p>Anda hanya dapat memberikan ulasan ketika anda sudah membeli produk ini!!!</p>
                        <a href="{{ url('/') }}" class="btn btn-primary mt-4">Kembali ke halaman utama</a>
                    </div>
                    @endif
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
@endpush