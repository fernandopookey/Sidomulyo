<style>
    .delete-gallery {
        display: block;
        position: absolute;
        top: -10px;
        right: 0;
    }
</style>

<div class="dashboard-content">

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="inputName">Nama Produk</label><br />
                        <input type="text" value="{{ $product->name }}" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="inputName">Penilaian Produk</label><br />
                        @php $ratenum = number_format($rating_value) @endphp
                        <div class="rating">
                            @for ($i = 1; $i <= $ratenum; $i++)
                                <img src="/images/stars.png" width="20" alt="">
                            @endfor
                            @for ($j = $ratenum + 1; $j <= 5; $j++)
                                <img src="/images/star.png" width="20" alt="">
                            @endfor
                            <span>
                                @if ($rating->count() > 0)
                                    {{ $rating->count() }} Penilaian
                                @else
                                    Belum ada penilaian
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="col-12">
                <div class="form-group">
                    <h4>User Reviews</h4>
                    @foreach ($reviews as $item)
                        <div class="user-review py-2">
                            <label>{{ ' ' . $item->user->username }}</label>
                            @if ($item->user_id == Auth::id())
                                <a href="{{ url('edit-review/' . $product->slug . '/userreview') }}">edit</a>
                            @endif
                            <br>
                            @php
                                $rating = App\Models\Rating::where('product_id', $product->id)
                                    ->where('user_id', $item->user->id)
                                    ->first();
                            @endphp
                            @if ($rating)
                                @php
                                    $user_rated = $rating->stars_rated;
                                @endphp
                                @for ($i = 1; $i <= $user_rated; $i++)
                                    <img src="/images/stars.png" width="20" alt="">
                                @endfor
                                @for ($j = $user_rated + 1; $j <= 5; $j++)
                                    <img src="/images/star.png" width="20" alt="">
                                @endfor
                            @endif
                            <small>Reviewed on {{ $item->created_at->format('d M Y') }}</small>
                            <p>{{ $item->user_review }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 text-left">
        <a href="{{ route('admin-product') }}">
            <button type="button" class="btn btn-primary px-5">
                Back
            </button>
        </a>
    </div>
</div>
