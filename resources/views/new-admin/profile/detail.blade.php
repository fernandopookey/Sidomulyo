{{-- <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf --}}

    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6 text-center d-flex align-items-center justify-content-center">
                        <div class="">
                            <img src="{{ Storage::url($profile->photos) }}" alt="" style="max-width: 300px">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputName">Nama Perusahaan</label><br />
                            <input type="text" value="{{ $profile->name }}" class="form-control" autocomplete="off"
                                disabled>
                        </div>
                    </div>
                </div>
                <div class="row border-top-3 mb-4 mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputEmail">Visi</label>
                            <textarea id="editor" class="form-control" disabled>{!! $profile->visi !!}</textarea>
                            {{-- <span>{!! $product->description !!}</span> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputEmail">Misi</label>
                            <textarea id="editor2" class="form-control" disabled>{!! $profile->misi !!}</textarea>
                            {{-- <span>{!! $product->description !!}</span> --}}
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputEmail">Tentang Kami</label>
                            <textarea id="editor3" class="form-control" disabled>{!! $profile->proper !!}</textarea>
                            {{-- <span>{!! $product->description !!}</span> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputEmail">Profil Perusahaan</label>
                            <textarea id="editor4" class="form-control"
                                disabled>{!! $profile->description !!}</textarea>
                            {{-- <span>{!! $product->description !!}</span> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row mt-4">
        <div class="col-lg-6">
            <div class="col text-start">
                <a href="/admin/profile">
                    <button type="button" class="btn btn-primary px-5">
                        Kembali
                    </button>
                </a>
            </div>
        </div>
    </div>
    {{--
</form> --}}

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
<script>
    ClassicEditor
              .create(document.querySelector('#editor3'))
              .then(editor => {
                console.log(editor);
              })
              .catch(error => {
                console.error(error);
              });
</script>
<script>
    ClassicEditor
              .create(document.querySelector('#editor4'))
              .then(editor => {
                console.log(editor);
              })
              .catch(error => {
                console.error(error);
              });
</script>
@endpush