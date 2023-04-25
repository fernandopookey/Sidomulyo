<div class="dashboard-content">
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
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin-product-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label>Nama Produk</label>
                                    <input type="text" name="name" class="form-control" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label>Deskripsi Produk</label>
                                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label>Label</label>
                                    <input type="file" name="photos" class="form-control" onchange="loadFile(event)"
                                        required>
                                </div>
                                <img id="output" class="pb-4" style="max-width: 200px" />
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label>Gambar Kategori Produk</label>
                                    <input type="file" name="photos" class="form-control" onchange="loadFile(event)"
                                        required>
                                </div>
                                <img id="output" class="pb-4" style="max-width: 200px" />
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="col text-text-start">
                                    <a href="{{ route('product-category.index') }}">
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
                </div>
            </div>
        </div>
    </div>
</div>

@push('addon-script')

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
              .create(document.querySelector('#editor'))
              .then(editor => {
                console.log(editor);
              })
              .catch(error => {
                console.error(error);
              });
</script>
@endpush



{{-- <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModal">Tambah Produk Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin-product-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Nama Produk</label>
                        <input type="text" name="name" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label>Harga Produk</label>
                        <input type="number" name="price" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label>Kategori Produk</label>
                        <select name="categories_id" class="form-control">
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi Produk</label>
                        <textarea name="description" id="editor" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Informasi Tambahan</label>
                        <textarea name="additional_info" id="editor2" cols="30" rows="10"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}