{{-- <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf --}}

    <section class="content">
        <div class="card">
            <div class="card-body row">
                <div class="col-5 text-center d-flex align-items-center justify-content-center">
                    <div class="">
                        <img src="{{ Storage::url($slider->photos) }}" alt="" style="max-width: 200px">
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-group">
                        <label for="inputName">Judul Slider</label><br />
                        <input type="text" value="{{ $slider->name }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Deskripsi Slider</label>
                        <span>{!! $slider->description !!}</span>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Tanggal Input</label>
                        <input type="text" class="form-control" value="{{ $slider->created_at }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-lg-6">
            <div class="col text-start">
                <a href="{{ route('slider.index') }}">
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
@endpush