<div class="card">
    <div class="card-body">
        <div class="col-md-12">
            <div class="col-12">
                <div class="form-group">
                    <label for="inputMessage">Judul</label>
                    <input type="text" class="form-control" value="{{ $faq->title }}" disabled>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="form-group">
                    <label for="inputEmail">Deskripsi</label>
                    <span>{!! $faq->description !!}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 text-start">
            <a href="{{ route('faqs.index') }}">
                <button type="button" class="btn btn-primary px-5">
                    Kembali
                </button>
            </a>
        </div>
    </div>
</div>