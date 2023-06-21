<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form action="/admin/navbar_content/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phone Number / Call Us</label>
                                <input type="text" name="phone_number"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    value="{{ isset($header) ? $header->phone_number : old('phone_number') }}"
                                    autocomplete="off">
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
                                <label for="">Navigation Text 1</label>
                                <input type="text" name="facebook_title"
                                    class="form-control @error('facebook_title') is-invalid @enderror"
                                    value="{{ isset($header) ? $header->facebook_title : old('facebook_title') }}"
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
                                <label for="">Navigation Link Text 1</label>
                                <input type="text" name="facebook_link"
                                    class="form-control @error('facebook_link') is-invalid @enderror"
                                    value="{{ isset($header) ? $header->facebook_link : old('facebook_link') }}"
                                    autocomplete="off">
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
                                <label for="">Navigation Text 2</label>
                                <input type="text" name="twiter_title"
                                    class="form-control @error('twiter_title') is-invalid @enderror"
                                    value="{{ isset($header) ? $header->twiter_title : old('twiter_title') }}"
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
                                <label for="">Navigation Link Text 2</label>
                                <input type="text" name="twiter_link"
                                    class="form-control @error('twiter_link') is-invalid @enderror"
                                    value="{{ isset($header) ? $header->twiter_link : old('twiter_link') }}"
                                    autocomplete="off">
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
                                <label for="">Navigation Text 3</label>
                                <input type="text" name="instagram_title"
                                    class="form-control @error('instagram_title') is-invalid @enderror"
                                    value="{{ isset($header) ? $header->instagram_title : old('instagram_title') }}"
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
                                <label for="">Navigation Link Text 3</label>
                                <input type="text" name="instagram_link"
                                    class="form-control @error('instagram_link') is-invalid @enderror"
                                    value="{{ isset($header) ? $header->instagram_link : old('instagram_link') }}"
                                    autocomplete="off" autocomplete="off">
                                @error('instagram_link')
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
                                <label>Logo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="logo" class="custom-file-input"
                                            value="{{ $header->logo }}" id="exampleInputFile"
                                            onchange="loadFile(event)">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                <img src="{{ Storage::disk('local')->url($header->logo) }}" class="img-fluid mt-2 mb-2"
                                    width="300">
                            </div>
                            <img id="output" class="img-fluid mb-3" width="200" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>