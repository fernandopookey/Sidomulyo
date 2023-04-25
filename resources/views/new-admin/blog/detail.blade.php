<section class="content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-5 text-center d-flex align-items-center justify-content-center">
                    <div class="">
                        <img src="{{ Storage::url($blog->photos) }}" alt="" style="max-width: 300px">
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-group">
                        <label for="inputName">Judul Blog</label><br />
                        <input type="text" value="{{ $blog->name }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Author</label><br />
                        <input type="text" value="{{ $blog->author }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Tanggal Input</label>
                        <input type="text" class="form-control" value="{{ $blog->created_at }}" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="inputEmail">Deskripsi</label>
                        <span>{!! $blog->description !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="col-lg-6">
        <div class="col text-start">
            <a href="{{ route('blog.index') }}">
                <button type="button" class="btn btn-primary px-5">
                    Kembali
                </button>
            </a>
        </div>
    </div>
</div>