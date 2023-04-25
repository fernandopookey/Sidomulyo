<form action="{{ route('product-category.update', $product_category->id) }}" method="POST"
    enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="name" class="form-control" value="{{ $product_category->name }}"
                    autocomplete="off">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Gambar Product</label>
                <input type="file" name="photos" class="form-control" value="{{ $product_category->photos }}"
                    onchange="loadFile(event)">
                <img src="{{ Storage::disk('local')->url($product_category->photos) }}" width="150" class="pt-4" alt="">
            </div>
            <img id="output" class="pb-4" style="max-width: 200px" />
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="col text-start">
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