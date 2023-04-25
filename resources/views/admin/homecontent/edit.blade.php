<form action="{{ route('homecontent.update', $homecontent->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Nama Link</label>
                <input type="text" name="title" class="form-control" value="{{ $homecontent->title }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" class="form-control" value="{{ $homecontent->link }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Gambar Product</label>
                <input type="file" name="icon" class="form-control" value="{{ $homecontent->icon }}"
                    onchange="loadFile(event)">
                <img src="{{ Storage::disk('local')->url($homecontent->icon) }}" width="150" class="pt-4" alt="">
            </div>
            <img id="output" class="pb-4" style="max-width: 200px" />
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="col text-start">
                <a href="{{ route('homecontent.index') }}">
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
@endpush