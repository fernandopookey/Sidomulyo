<div class="car">
    <div class="card-body">
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
                        <label for="inputName">Blog Title</label><br />
                        <input type="text" value="{{ $blog->name }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Author</label><br />
                        <input type="text" value="{{ $blog->author }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Input Date</label>
                        <input type="text" class="form-control" value="{{ $blog->created_at->format('d M Y') }}"
                            disabled>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="inputMessage">Source</label>
                    <input type="text" class="form-control" value="{{ $blog->source }}" disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="inputMessage">Source Link</label>
                    <input type="text" class="form-control" value="{{ $blog->source_link }}" disabled>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="form-group">
                    <label for="inputEmail">Description</label>
                    <span>{!! $blog->description !!}</span>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="col-12 mt-4">
                        <div class="form-group">
                            <h3>Comments</h3>
                            <div class="pt-aside-content">
                                @forelse ($blog->comments as $item)
                                <div class="pt-aside-info">
                                    @if ($item->user)
                                    <p><b>{{ $item->user->username }}</b></p>
                                    @endif
                                    <small>{{ $item->created_at->format('d M Y') }}</small>
                                </div>
                                <div class="pt-aside-info mb-2">
                                    <p>{!! $item->user_comment !!}</p>
                                </div>
                                <div class="pt-aside-info">
                                    {{-- <button type="button" value="{{ $item->id }}"
                                        class="deleteComment btn btn-info">Hapus</button> --}}
                                    {{-- <form action="{{ route('comment-delete', $item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Hapus Komentar ?')"
                                            class="btn-danger">Delete</button>
                                    </form> --}}
                                    <form action="{{ route('comment-delete', $item->id) }}"
                                        onclick="return confirm('Delete ?')" method="POST" class="mt-2">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </div>
                                @empty
                                <h6 class="pt-aside-title">No comments yet</h6>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-lg-6 text-start mb-4">
        <a href="{{ route('blog.index') }}">
            <button type="button" class="btn btn-primary px-5">
                Kembali
            </button>
        </a>
    </div>
</div>