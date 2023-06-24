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
                <form action="{{ route('bank.update', $bank->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $bank->name }}"
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-success px-5">
                                Save
                            </button>
                        </div>
                        <div class="col-lg-6 text-right">
                            <a href="{{ route('bank.index') }}">
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
