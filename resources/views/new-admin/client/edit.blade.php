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
                <form action="{{ route('client.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Client Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $client->name }}"
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="photos" class="custom-file-input"
                                            value="{{ $client->photos }}" id="exampleInputFile"
                                            onchange="loadFile(event)">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                <img src="{{ Storage::disk('local')->url($client->photos) }}" class="img-fluid mt-4"
                                    width="400" alt="">
                            </div>
                            <img id="output" class="img-fluid mt-4 mb-4" width="400" />
                        </div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-success px-5">
                                Save
                            </button>
                        </div>
                        <div class="col-lg-6 text-right">
                            <a href="{{ route('client.index') }}">
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