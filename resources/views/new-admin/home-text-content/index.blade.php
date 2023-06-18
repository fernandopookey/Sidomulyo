<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form action="/admin/home_text_content/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-12">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ isset($item) ? $item->title : old('title') }}">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" id="editor"
                                class="form-control @error('description') is-invalid @enderror">{!! isset($item) ? $item->description : old('description') !!}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
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