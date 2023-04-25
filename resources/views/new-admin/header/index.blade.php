<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <form action="/admin/header/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Hubungi Kami</label>
                                <input type="text" name="phone_number"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    value="{{ isset($header) ? $header->phone_number : old('phone_number') }}">
                                @error('phone_number')
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
                                <label for="">Teks Navigasi Bar Facebook</label>
                                <input type="text" name="facebook_title"
                                    class="form-control @error('facebook_title') is-invalid @enderror"
                                    value="{{ isset($header) ? $header->facebook_title : old('facebook_title') }}">
                                @error('facebook_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Link Facebook</label>
                                <input type="text" name="facebook_link"
                                    class="form-control @error('facebook_link') is-invalid @enderror"
                                    value="{{ isset($header) ? $header->facebook_link : old('facebook_link') }}">
                                @error('facebook_link')
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
                                <label for="">Teks Navigasi Bar Twitter</label>
                                <input type="text" name="twiter_title"
                                    class="form-control @error('twiter_title') is-invalid @enderror"
                                    value="{{ isset($header) ? $header->twiter_title : old('twiter_title') }}">
                                @error('twiter_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Link Twitter</label>
                                <input type="text" name="twiter_link"
                                    class="form-control @error('twiter_link') is-invalid @enderror"
                                    value="{{ isset($header) ? $header->twiter_link : old('twiter_link') }}">
                                @error('twiter_link')
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
                                <label for="">Teks Navigasi Bar Instagram</label>
                                <input type="text" name="instagram_title"
                                    class="form-control @error('instagram_title') is-invalid @enderror"
                                    value="{{ isset($header) ? $header->instagram_title : old('instagram_title') }}">
                                @error('instagram_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Link Facebook</label>
                                <input type="text" name="instagram_link"
                                    class="form-control @error('instagram_link') is-invalid @enderror"
                                    value="{{ isset($header) ? $header->instagram_link : old('instagram_link') }}">
                                @error('instagram_link')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Logo Navigasi Bar</label>
                            <input type="file" name="logo" class="form-control" value="{{ $header->logo }}"
                                onchange="loadFile(event)">
                            <img src="{{ Storage::disk('local')->url($header->logo) }}" width="150" class="pt-4" alt="">
                        </div>
                        <img id="output" class="pb-4" style="max-width: 200px" />
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
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
@endpush