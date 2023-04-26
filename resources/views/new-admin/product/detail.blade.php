<style>
    .delete-gallery-product {
        display: block;
        position: absolute;
        /* top: -10px; */
        top: 66%;
        /* right: 0; */
    }
</style>

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
            <div class="card">
                <div class="card-body">
                    <section class="content">
                        <form action="{{ route('admin-product-update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Nama Produk</label>
                                        <input type="text" name="name" class="form-control" value="{{ $product->name }}"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Price</label>
                                        <input type="number" name="price" class="form-control"
                                            value="{{ $product->price }}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Kategori</label>
                                        <select name="categories_id" class="form-control">
                                            <option value="{{ $product->categories_id }}">Tidak diganti ({{
                                                $product->categories->name }})</option>
                                            @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Deskripsi</label>
                                    <div class="input-group input-group-static mb-4">
                                        <textarea name="description"
                                            id="editor">{!! $product->description !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Informasi Tambahan</label>
                                    <div class="input-group input-group-static mb-4">
                                        <textarea name="additional_info"
                                            id="editor2">{!! $product->additional_info !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-6">
                                    <div class="col text-start">
                                        <button type="submit" class="btn btn-success px-5">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="col text-end">
                                        <a href="{{ route('admin-product') }}">
                                            <button type="button" class="btn btn-primary px-5">
                                                Kembali
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            @foreach ($product->galleries as $gallery)
                            <div class="col-md-4">
                                <div class="gallery-container">
                                    <img src="{{ Storage::url($gallery->photos ?? '') }}" alt="" class="w-100 mb-4"
                                        style="width: 100px; height: 230px; object-fit: cover;">
                                    <a href="{{ route('admin-product-gallery-delete', $gallery->id) }}"
                                        class="delete-gallery-product">
                                        <img src="/images/icon-delete.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-lg-12">
                                <form action="{{ route('admin-product-gallery-upload') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="file" name="photos" id="file" style="display: none;"
                                        onchange="form.submit()">
                                    <button type="button" class="btn btn-secondary btn-block mt-3"
                                        onclick="thisFileUpload()">
                                        Tambah Gambar Produk
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="row pt-4 pb-4">

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

@push('addon-script')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    function thisFileUpload() {
          document.getElementById("file").click();
        }
</script>
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

{{-- @push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script>
    var gallery = new Vue({
      el: "#gallery",
      mounted() {
        AOS.init();
      },
      data: {
        activePhoto: 0,
        photos: [
          @foreach ($product->galleries as $gallery)
            {
                id: {{ $gallery->id }},
                url: "{{ Storage::url($gallery->photos) }}"
            },
          @endforeach
        ]
      },
      methods: {
        changeActive(id) {
          this.activePhoto = id;
        }
      }
    })
</script>
@endpush --}}