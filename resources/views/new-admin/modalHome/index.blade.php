<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <form action="/admin/modalHome/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Judul Modal Pop Up</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ isset($modalHome) ? $modalHome->name : old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="description" id="editor" cols="30"
                                    rows="10">{{ isset($modalHome) ? $modalHome->description : old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="photos" class="form-control" value="{{ $modalHome->photos }}"
                                    onchange="loadFile(event)">
                                <img src="{{ Storage::disk('local')->url($modalHome->photos) }}" width="150"
                                    class="pt-4" alt="">
                            </div>
                            <img id="output" class="pb-4" style="max-width: 200px" />
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
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