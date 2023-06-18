<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form action="/admin/sosmed_footer/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Sosmed 1</label>
                                <input type="text" name="instagram_title"
                                    class="form-control @error('instagram_title') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->instagram_title : old('instagram_title') }}"
                                    autocomplete="off">
                                @error('instagram_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Link Sosmed 1</label>
                                <input type="text" name="instagram"
                                    class="form-control @error('instagram') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->instagram : old('instagram') }}"
                                    autocomplete="off">
                                @error('instagram')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Sosmed 2</label>
                                <input type="text" name="whatsapp_title"
                                    class="form-control @error('whatsapp_title') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->whatsapp_title : old('whatsapp_title') }}"
                                    autocomplete="off">
                                @error('whatsapp_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Link Sosmed 2</label>
                                <input type="text" name="whatsapp"
                                    class="form-control @error('whatsapp') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->whatsapp : old('whatsapp') }}"
                                    autocomplete="off">
                                @error('whatsapp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Sosmed 3</label>
                                <input type="text" name="facebook_title"
                                    class="form-control @error('facebook_title') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->facebook_title : old('facebook_title') }}"
                                    autocomplete="off">
                                @error('facebook_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Link Sosmed 3</label>
                                <input type="text" name="facebook"
                                    class="form-control @error('facebook') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->facebook : old('facebook') }}"
                                    autocomplete="off">
                                @error('facebook')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Sosmed 4</label>
                                <input type="text" name="tokopedia_title"
                                    class="form-control @error('tokopedia_title') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->tokopedia_title : old('tokopedia_title') }}"
                                    autocomplete="off">
                                @error('tokopedia_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Link Sosmed 4</label>
                                <input type="text" name="tokopedia"
                                    class="form-control @error('tokopedia') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->tokopedia : old('tokopedia') }}"
                                    autocomplete="off">
                                @error('tokopedia')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Sosmed 5</label>
                                <input type="text" name="shopee_title"
                                    class="form-control @error('shopee_title') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->shopee_title : old('shopee_title') }}"
                                    autocomplete="off">
                                @error('shopee_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Link Sosmed 5</label>
                                <input type="text" name="shopee"
                                    class="form-control @error('shopee') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->shopee : old('shopee') }}" autocomplete="off">
                                @error('shopee')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Sosmed 6</label>
                                <input type="text" name="twiter_title"
                                    class="form-control @error('twiter_title') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->twiter_title : old('twiter_title') }}"
                                    autocomplete="off">
                                @error('twiter_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Link Sosmed 6</label>
                                <input type="text" name="twiter"
                                    class="form-control @error('twiter') is-invalid @enderror"
                                    value="{{ isset($sosmed) ? $sosmed->twiter : old('twiter') }}" autocomplete="off">
                                @error('twiter')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
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