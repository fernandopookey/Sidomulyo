<div class="dashboard-content">
    <div class="row">
        <div class="col-md-12">
            <section class="content">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-5 text-center d-flex align-items-center justify-content-center">
                            <div class="">
                                <img src="{{ Storage::url($machine->photos) }}" alt="" style="max-width: 300px">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="input-group input-group-static mb-4">
                                <label for="inputName">Nama Mesin</label><br />
                                <input type="text" value="{{ $machine->name }}" class="form-control" disabled>
                            </div>
                            <div class="input-group input-group-static mb-4 mt-4">
                                <label for="inputEmail">Deskripsi</label>
                                <span>{!! $machine->description !!}</span>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label for="inputMessage">Tanggal Input</label>
                                <input type="text" class="form-control" value="{{ $machine->created_at }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-12">
        <div class="col text-end">
            <a href="{{ route('machine.index') }}">
                <button type="button" class="btn btn-primary px-5">
                    Kembali
                </button>
            </a>
        </div>
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