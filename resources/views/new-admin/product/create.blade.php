<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('admin-product-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Harga Produk</label>
                                <input type="number" name="price" class="form-control" autocomplete="off"
                                    value="{{ old('price') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kategori Produk</label>
                            <select name="categories_id" class="form-control">
                                @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Deskripsi Produk</label>
                                <textarea name="description" id="editor">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Informasi Tambahan</label>
                                <textarea name="additional_info" id="editor2"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-success px-5">
                                Simpan
                            </button>
                        </div>
                        <div class="col-lg-6 text-right">
                            <a href="{{ route('homecontent.index') }}">
                                <button type="button" class="btn btn-primary px-5">
                                    Kembali
                                </button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>