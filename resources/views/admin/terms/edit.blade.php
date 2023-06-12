@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('termsAndConditions.update', $terms->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $terms->title) }}"
                    autocomplete="off">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" id="editor" cols="30"
                    rows="10">{{old('description', $terms->description)}}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 text-start">
            <button type="submit" class="btn btn-success px-5">
                Simpan
            </button>
        </div>
        <div class="col-lg-6 text-end">
            <a href="{{ route('termsAndConditions.index') }}">
                <button type="button" class="btn btn-primary px-5">
                    Kembali
                </button>
            </a>
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