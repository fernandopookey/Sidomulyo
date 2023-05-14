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
            <form action="{{ route('homecontent.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Link</label>
                            <input type="text" name="title" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" name="link" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Icon Link</label>
                            <input type="file" name="icon" class="form-control" onchange="loadFile(event)" required>
                        </div>
                        <img id="output" class="pb-4" style="width: 250px; height: 200px; object-fit: cover;" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 text-start">
                        <button type="submit" class="btn btn-success px-5">
                            Simpan
                        </button>
                    </div>
                    <div class="col-lg-6 text-end">
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