<style>
    .product-route {
        text-decoration: none;
        color: #fff;
    }
</style>

<div class="row d-flex justify-content-between">
    <div class="col-lg-6">
        <a href="/admin/productgallery/create" class="btn btn-primary mb-3">
            <i class="fa fa-plus"></i> Tambah
        </a>
    </div>
    <div class="col-lg-2 mb-4 d-sm-inline-flex">
        <form action="" method="GET">
            <input type="text" name="keyword" class="form-control" id="keyword" autocomplete="off">
        </form>
    </div>
</div>
<div class="row">
    @foreach ($productgallery as $item)
    <div class="d-flex col-lg-3 justify-content-around">
        <div class="card text-center" style="width: 18rem;">
            <img src="{{ Storage::url($item->photos ?? '') }}" class="card-img-top" alt="..."
                style="height: 200px; object-fit:cover;">
            <div class="card-body">
                <h5 class="card-text">{{ $item->product->name }}</h5>
                <form action="/admin/productgallery/{{ $item->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
                        Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    {{ $productgallery->links() }}
    <div class="row">
        <a href="{{ route('product.index') }}" class="product-route btn btn-info">Produk</a>
    </div>
</div>