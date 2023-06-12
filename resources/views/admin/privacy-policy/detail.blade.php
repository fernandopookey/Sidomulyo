<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="inputMessage">Judul</label>
                <input type="text" class="form-control" value="{{ $privacyPolicy->title }}" disabled>
            </div>
        </div>
        <div class="col-12 mt-4">
            <div class="form-group">
                <label for="inputEmail">Deskripsi</label>
                <span>{!! $privacyPolicy->description !!}</span>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-6 text-start">
            <a href="{{ route('privacyPolicy.index') }}">
                <button type="button" class="btn btn-primary px-5">
                    Kembali
                </button>
            </a>
        </div>
    </div>
</section>