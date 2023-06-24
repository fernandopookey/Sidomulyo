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
                <input type="text" class="form-control" value="{{ $blog->created_at->format('d M Y') }}" disabled>
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
    <div class="col-12 mb-4">
        <div class="form-group">
            <label for="inputEmail">Deskripsi</label>
            <span>{!! $blog->description !!}</span>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="col-12 mt-4">
                <div class="form-group">
                    <h3>Semua Komentar</h3>
                    <div class="pt-aside-content">
                        @forelse ($blog->comments as $item)
                        <div class="pt-aside-info">
                            @if ($item->user)
                            <p><b>{{ $item->user->username }}</b></p>
                            @endif
                            <small>{{ $item->created_at->format('d M Y') }}</small>
                        </div>
                        <div class="pt-aside-info">
                            <p>{!! $item->user_comment !!}</p>
                        </div>
                        @if (Auth::check() && Auth::id() == $item->user_id)
                        <div class="pt-aside-info">
                            {{-- <button type="button" value="{{ $item->id }}"
                                class="deleteComment btn btn-info">Hapus</button> --}}
                            <form action="{{ route('comment-delete', $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" onclick="return confirm('Hapus Komentar ?')"
                                    class="btn-danger">Hapus</button>
                            </form>
                        </div>
                        @endif
                        @empty
                        <h6 class="pt-aside-title">Belum ada komentar</h6>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="col-lg-6 text-start">
    <a href="{{ route('blog.index') }}">
        <button type="button" class="btn btn-primary px-5">
            Kembali
        </button>
    </a>
</div>