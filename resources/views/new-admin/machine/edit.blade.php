<div class="dashboard-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('machine.update', $machine->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $machine->name }}"
                                        autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Deskripsi</label>
                                <div class="input-group input-group-static mb-4">
                                    <textarea name="description" id="editor" cols="30"
                                        rows="10">{!! $machine->description !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label>Gambar</label>
                                    <input type="file" name="photos" class="form-control" value="{{ $machine->photos }}"
                                        onchange="loadFile(event)">
                                    <img src="{{ Storage::disk('local')->url($machine->photos) }}"
                                        style="width: 150px; height: 100px; object-fit: cover;" class="pt-4" alt="">
                                </div>
                                <img id="output" class="pb-4" style="width: 200px; height: 200px; object-fit: cover;" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="col text-start">
                                    <a href="{{ route('machine.index') }}">
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