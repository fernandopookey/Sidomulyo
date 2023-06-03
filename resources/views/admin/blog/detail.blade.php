<section class="content">
    <div class="row">
        <div class="col-5 text-center d-flex align-items-center justify-content-center">
            <div class="">
                <img src="{{ Storage::url($blog->photos) }}" alt=""
                    style="width: 250px; height: 200px; object-fit: cover;">
            </div>
        </div>
        <div class="col-7">
            <div class="form-group">
                <label for="inputName">Judul Blog</label><br />
                <input type="text" value="{{ $blog->name }}" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="inputName">Penulis</label><br />
                <input type="text" value="{{ $blog->author }}" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="inputMessage">Tanggal Input</label>
                <input type="text" class="form-control" value="{{ $blog->created_at }}" disabled>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="inputMessage">Sumber</label>
            <input type="text" class="form-control" value="{{ $blog->source }}" disabled>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="inputMessage">Link Sumber</label>
            <input type="text" class="form-control" value="{{ $blog->source_link }}" disabled>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="inputEmail">Deskripsi</label>
            <span>{!! $blog->description !!}</span>
        </div>
    </div>
</section>

<div class="row">
    <div class="col-lg-6 text-start">
        <a href="{{ route('blog.index') }}">
            <button type="button" class="btn btn-primary px-5">
                Kembali
            </button>
        </a>
    </div>
</div>