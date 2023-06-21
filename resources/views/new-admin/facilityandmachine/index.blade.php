<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="/admin/facility-and-machine/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description 1</label>
                                <textarea name="head" id="editor"
                                    class="form-control @error('head') is-invalid @enderror">{!! isset($facilityandmachine) ? $facilityandmachine->head : old('head') !!}</textarea>
                                @error('head')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description 2</label>
                                <textarea name="description" id="editor2"
                                    class="form-control @error('description') is-invalid @enderror">{!! isset($facilityandmachine) ? $facilityandmachine->description : old('description') !!}</textarea>
                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 text-start">
                            <button type="submit" class="btn btn-primary pt-2">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>