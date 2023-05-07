<div class="dashboard-content">
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
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="input-group input-group-static">
                                    <label>Full Name</label>
                                    <input type="text" name="fullname" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-group input-group-static">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-md-4 mb-4">
                                <div class="input-group input-group-static">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="input-group input-group-static">
                                    <label>Nomor HP</label>
                                    <input type="text" name="phone_number" class="form-control" autocomplete="off"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="input-group input-group-static">
                                    <label>Roles</label>
                                    <select name="roles" class="form-control" required>
                                        <option value="ADMIN">Admin</option>
                                        <option value="USER">User</option>
                                        <option value="CS">Customer Service</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-md-6">
                                <label>Alamat</label>
                                <div class="input-group input-group-static">
                                    <textarea name="address" id="editor" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-group input-group-static">
                                    <label>Password</label>
                                    <input type="text" name="password" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="col text-start">
                                    <button type="submit" class="btn btn-success px-5">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col text-end">
                                    <a href="{{ route('user.index') }}">
                                        <button type="button" class="btn btn-primary px-5">
                                            Kembali
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
              .create(document.querySelector('#editor'))
              .then(editor => {
                console.log(editor);
              })
              .catch(error => {
                console.error(error);
              });
</script>
@endpush