<form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}" autocomplete="off" required>
    </div>
    <div class="mb-3">
        <label>Harga Produk</label>
        <input type="text" name="price" class="form-control rupiah" value="{{old('price', $product->price) }}"
            autocomplete="off">
    </div>
    <div class="mb-3">
        <label>Kategori Produk</label>
        <select name="categories_id" class="form-control">
            <option value="{{ $product->categories_id }}" selected>
                {{ $product->categories->name }}
            </option>
            @foreach ($categories as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Deskripsi Produk</label>
        <textarea name="description" id="editor" cols="30" rows="10">{!! $product->description !!}</textarea>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="col text-start">
                <a href="{{ route('product.index') }}">
                    <button type="button" class="btn btn-primary px-5">
                        Kembali
                    </button>
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="col text-end">
                <button type="submit" class="btn btn-success px-5">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</form>