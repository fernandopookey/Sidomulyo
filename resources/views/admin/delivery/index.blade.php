<div class="row">
    <div class="col-md-12">

        <form action="/admin/pengiriman/update" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ isset($delivery) ? $delivery->title : old('title') }}" autocomplete="off">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="description" id="editor"
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Deskripsi">{!! isset($delivery) ? $delivery->description : old('description') !!}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@push('addon-script')
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