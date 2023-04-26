<div class="dashboard-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label>Judul Blog</label>
                                    <input type="text" name="name" class="form-control" value="{{ $blog->name }}"
                                        autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label>Penulis</label>
                                    <input type="text" name="author" class="form-control" value="{{ $blog->author }}"
                                        autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Deskripsi</label>
                                <div class="input-group input-group-static mb-4">
                                    <textarea name="description" id="editor" cols="30"
                                        rows="10">{!! $blog->description !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" name="photos" class="form-control" value="{{ $blog->photos }}"
                                        onchange="loadFile(event)">
                                    <img src="{{ Storage::disk('local')->url($blog->photos) }}" width="150" class="pt-4"
                                        alt="">
                                </div>
                                <img id="output" class="pb-4" style="max-width: 200px" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="col text-start">
                                    <a href="{{ route('blog.index') }}">
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