<div class="row">
    <div class="col-md-12">
        <form action="/admin/first_floating/update" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ isset($floating) ? $floating->name : old('name') }}" autocomplete="off">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Link</label>
                        <input type="text" name="link" class="form-control @error('link') is-invalid @enderror"
                            value="{{ isset($floating) ? $floating->link : old('link') }}" autocomplete="off">
                        @error('link')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="photos" class="form-control" value="{{ $floating->photos }}"
                            onchange="loadFile(event)">
                        <img src="{{ Storage::disk('local')->url($floating->photos) }}" class="pt-4" alt=""
                            style="widows: 200px; height: 150px; object-fit: contain;">
                    </div>
                    <img id="output" class="pb-4" style="max-width: 200px" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@push('addon-script')

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endpush