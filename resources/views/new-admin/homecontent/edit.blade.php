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
                <form action="{{ route('home-page-links.update', $homecontent->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="title" class="form-control" value="{{ $homecontent->title }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" name="link" class="form-control" value="{{ $homecontent->link }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Link Icon</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="icon" class="custom-file-input"
                                            value="{{ $homecontent->icon }}" id="exampleInputFile"
                                            onchange="loadFile(event)">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                <img src="{{ Storage::disk('local')->url($homecontent->icon) }}"
                                    class="img-fluid mt-4 mb-4" width="400" alt="">
                            </div>
                            <img id="output" class="img-fluid mt-4" width="400" />
                        </div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-success px-5">
                                Save
                            </button>
                        </div>
                        <div class="col-lg-6 text-right">
                            <a href="{{ route('home-page-links.index') }}">
                                <button type="button" class="btn btn-primary px-5">
                                    Back
                                </button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>