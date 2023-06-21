<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="align-items-center justify-content-center">
                            <div class="form-group">
                                <label for="inputName">Full Name</label><br />
                                <input type="text" value="{{ $user->fullname }}" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputName">Username</label><br />
                            <input type="text" value="{{ $user->username }}" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Email</label>
                        <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" value="{{ $user->phone_number }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label>Roles</label>
                        <input type="text" class="form-control" value="{{ $user->roles }}" disabled>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <label for="inputEmail">Address</label>
                            <span>{!! $user->address !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-6 text-start">
        <a href="{{ route('user.index') }}">
            <button type="button" class="btn btn-primary px-5">
                Back
            </button>
        </a>
    </div>
</div>