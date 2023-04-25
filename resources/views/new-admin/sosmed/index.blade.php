<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <form action="/admin/sosmed/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="home_title"
                                    class="form-control @error('home_title') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->home_title : old('home_title') }}">
                                @error('home_title')
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
                                <label for="">Text Halaman Home</label>
                                <input type="text" name="other"
                                    class="form-control @error('other') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->other : old('other') }}">
                                @error('other')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Instagram</label>
                                <input type="text" name="instagram"
                                    class="form-control @error('instagram') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->instagram : old('instagram') }}">
                                @error('instagram')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Instagram</label>
                                <input type="text" name="instagram_title"
                                    class="form-control @error('instagram_title') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->instagram_title : old('instagram_title') }}">
                                @error('instagram_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Whatsapp</label>
                                <input type="text" name="whatsapp"
                                    class="form-control @error('whatsapp') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->whatsapp : old('whatsapp') }}">
                                @error('whatsapp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Whatsapp</label>
                                <input type="text" name="whatsapp_title"
                                    class="form-control @error('whatsapp_title') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->whatsapp_title : old('whatsapp_title') }}">
                                @error('whatsapp_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Facebook</label>
                                <input type="text" name="facebook"
                                    class="form-control @error('facebook') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->facebook : old('facebook') }}">
                                @error('facebook')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Facebook</label>
                                <input type="text" name="facebook_title"
                                    class="form-control @error('facebook_title') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->facebook_title : old('facebook_title') }}">
                                @error('facebook_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tokopedia</label>
                                <input type="text" name="tokopedia"
                                    class="form-control @error('tokopedia') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->tokopedia : old('tokopedia') }}">
                                @error('tokopedia')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Tokopedia</label>
                                <input type="text" name="tokopedia_title"
                                    class="form-control @error('tokopedia_title') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->tokopedia_title : old('tokopedia_title') }}">
                                @error('tokopedia_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Shopee</label>
                                <input type="text" name="shopee"
                                    class="form-control @error('shopee') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->shopee : old('shopee') }}">
                                @error('shopee')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Shopee</label>
                                <input type="text" name="shopee_title"
                                    class="form-control @error('shopee_title') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->shopee_title : old('shopee_title') }}">
                                @error('shopee_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Twiter</label>
                                <input type="text" name="twiter"
                                    class="form-control @error('twiter') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->twiter : old('twiter') }}">
                                @error('twiter')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Twiter</label>
                                <input type="text" name="twiter_title"
                                    class="form-control @error('twiter_title') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->twiter_title : old('twiter_title') }}">
                                @error('twiter_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" id="editor"
                                    class="form-control @error('alamat') is-invalid @enderror"
                                    placeholder="Alamat Perusahaan">{!! isset($sosmed) ? $sosmed->alamat : old('alamat') !!}</textarea>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
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