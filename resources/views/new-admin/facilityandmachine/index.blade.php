<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <form action="/admin/facilityandmachine/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Deskripsi 1</label>
                                <textarea name="head" id="editor"
                                    class="form-control @error('head') is-invalid @enderror">{!! isset($facilityandmachine) ? $facilityandmachine->head : old('head') !!}</textarea>
                                @error('head')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Deskripsi 2</label>
                                <textarea name="description" id="editor2"
                                    class="form-control @error('description') is-invalid @enderror">{!! isset($facilityandmachine) ? $facilityandmachine->description : old('description') !!}</textarea>
                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-lg-6">
                                <div class="col text-text-start">
                                    <a href="{{ route('facilityandmachine.show', $facilityandmachine->id) }}">
                                        <button type="button" class="btn btn-primary px-5">
                                            Detail
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
                        </div> --}}

                        <button type="submit" class="btn btn-primary pt-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('addon-script')

<script>
    var loadFile = function(e) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
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

<script>
    ClassicEditor
              .create(document.querySelector('#editor2'))
              .then(editor => {
                console.log(editor);
              })
              .catch(error => {
                console.error(error);
              });
</script>

@endpush