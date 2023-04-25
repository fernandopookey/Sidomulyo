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
                    <form action="{{ route('product-category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Nama Kategori</label>
                                        <input type="text" name="name" class="form-control" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Gambar Kategori</label>
                                        <input type="file" name="photos" class="form-control" onchange="loadFile(event)"
                                            required>
                                    </div>
                                    <img id="output" class="pb-4" style="max-width: 200px" />
                                </div>
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