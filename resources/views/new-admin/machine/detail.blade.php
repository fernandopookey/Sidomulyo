<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-5 text-center d-flex align-items-center justify-content-center">
                        <div class="">
                            <img src="{{ Storage::url($machine->photos) }}" alt=""
                                style="width: 250px; height: 200px; object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="form-group">
                            <label for="inputName">Name</label><br />
                            <input type="text" value="{{ $machine->name }}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Description</label>
                            <span>{!! $machine->description !!}</span>
                        </div>
                        <div class="form-group">
                            <label for="inputMessage">Input Date</label>
                            <input type="text" class="form-control" value="{{ $machine->created_at->format('d M Y') }}"
                                disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 text-start">
                        <a href="{{ route('machine.index') }}">
                            <button type="button" class="btn btn-primary px-5">
                                Back
                            </button>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>