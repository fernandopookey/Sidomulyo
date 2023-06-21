<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form action="/admin/home-text-content/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-12">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ isset($item) ? $item->title : old('title') }}">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="editor"
                                class="form-control @error('description') is-invalid @enderror">{!! isset($item) ? $item->description : old('description') !!}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
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