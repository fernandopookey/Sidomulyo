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
            <form action="{{ route('discountTotalPayment.update', $discountTotalPayment->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Total Pembayaran</label>
                            <input type="number" name="total_payment" class="form-control"
                                value="{{ $discountTotalPayment->total_payment }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Diskon</label>
                            <input type="number" name="discount" class="form-control"
                                value="{{ $discountTotalPayment->discount }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 text-start">
                        <button type="submit" class="btn btn-success px-5">
                            Simpan
                        </button>
                    </div>
                    <div class="col-lg-6 text-end">
                        <a href="{{ route('discountTotalPayment.index') }}">
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