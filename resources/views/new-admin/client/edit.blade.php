<div class="dashboard-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('client.update', $client->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $client->name }}"
                                        autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" name="photos" class="form-control" value="{{ $client->photos }}"
                                        onchange="loadFile(event)">
                                    <img src="{{ Storage::disk('local')->url($client->photos) }}"
                                        style="width: 150px; height: 100px; object-fit: cover;" class="pt-4" alt="">
                                </div>
                                <img id="output" class="pb-4" style="width: 200px; height: 200px; object-fit: cover;" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="col text-start">
                                    <button type="submit" class="btn btn-success px-5">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col text-end">
                                    <a href="{{ route('client.index') }}">
                                        <button type="button" class="btn btn-primary px-5">
                                            Kembali
                                        </button>
                                    </a>
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