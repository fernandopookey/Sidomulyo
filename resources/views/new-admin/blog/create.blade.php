<div class="card">
    <div class="card-body">
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
                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Judul Blog</label>
                            <input type="text" name="name" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Penulis</label>
                            <input type="text" name="author" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Sumber</label>
                            <input type="text" name="source" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Link Sumber</label>
                            <input type="text" name="source_link" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" id="editor" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Gambar</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="photos" class="custom-file-input" id="exampleInputFile"
                                        onchange="loadFile(event)" required>
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <img id="output" class="img-fluid mt-2 mb-4" width="400" />
                    </div>
                    <div class="d-flex">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-success px-5">
                                Simpan
                            </button>
                        </div>
                        <div class="col-lg-6 text-right">
                            <a href="{{ route('blog.index') }}">
                                <button type="button" class="btn btn-primary px-5">
                                    Kembali
                                </button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>