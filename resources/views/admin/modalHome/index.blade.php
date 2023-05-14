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
        <form action="/admin/modalHome/update" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="photos" class="form-control" value="{{ $modalHome->photos }}"
                            onchange="loadFile(event)">
                        <img src="{{ Storage::disk('local')->url($modalHome->photos) }}"
                            style="width: 200px; height: 150px; object-fit: contain;" class="pt-4" alt="">
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