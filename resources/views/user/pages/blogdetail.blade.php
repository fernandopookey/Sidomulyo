@extends('user.layouts.app')

@section('title')
Sidomulyo | Blog Detail Page
@endsection

@section('content')

<style>
    .blog-page-list {
        text-align: center;
    }
</style>

<div class="pt-breadcrumb">
    <div class="container-fluid">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('blog') }}">Blog</a></li>
            <li>Blog Detail</li>
        </ul>
    </div>
</div>
<div id="pt-pageContent">
    <div class="container-indent">
        <div class="container">
            <div class="row pt-check-onecol">
                <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class="pt-post-single">
                        <div class="pt-post-content">
                            <div class="row">
                                <h4 class="pt-title">{{ $blog->name }}</h4>
                                <div class="pt-autor">
                                    By <span>{{ $blog->author }}</span> {{ $blog->created_at->format('d M Y') }}
                                </div>
                                <div class="col-12 text-center">
                                    <img src="{{ Storage::url($blog->photos ?? '') }}"
                                        style="width: 1000px; height: 300px; object-fit:cover;" alt="">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <p>{!! $blog->description !!}</p>
                            </div>
                            <div class="pt-autor">
                                sumber: <span><a href="{{ $blog->source_link }}" target="_blank">{{
                                        $blog->source }}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 rightColumn indent-aside-col">
                    <div class="pt-block-aside">
                        <h3 class="pt-aside-title">Our Policies</h3>
                        <div class="pt-aside-content">
                            <ul class="pt-list-row">
                                <li><a href="{{ route('faqs') }}">FAQs</a></li>
                                <li><a href="{{ route('privacyPolicy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('termsAndConditions') }}">Terms and Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="pt-block-aside">
                        <h3 class="pt-aside-title">Postingan Terbaru</h3>
                        <div class="pt-aside-content">
                            <div class="pt-aside-post">
                                @foreach ($latestPost as $item)
                                <div class="item">
                                    <a href="{{ route('blog-home-detail', $item->slug) }}">
                                        <div class="pt-title">{{ $item->name }}</div>
                                        <div class="pt-description">{!!
                                            Illuminate\Support\Str::limit($item->description, 150)
                                            !!}</div>
                                    </a>
                                    <div class="pt-info">
                                        by <span>{{ $item->author }}</span> {{ $item->created_at->format('d M Y') }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="pt-block-aside">
                        <h3 class="pt-aside-title">Tentang Kami</h3>
                        <div class="pt-aside-content">
                            <div class="pt-aside-info">
                                <p>{!!
                                    Illuminate\Support\Str::limit($about->description, 150)
                                    !!}</p>
                                <a href="{{ route('profile') }}" class="btn btn-border btn-top">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="pt-block-aside">
                        <h3 class="pt-aside-title">Tambahkan Komentar</h3>
                        <div class="pt-aside-content">
                            <div class="pt-aside-info">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ url('comments') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="blog_slug" value="{{ $blog->slug }}">
                                            <textarea class="form-control" name="user_comment" rows="10"
                                                placeholder="Berikan komentar"></textarea>
                                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-container pt-block-aside">
                        <h3 class="pt-aside-title">Semua Komentar</h3>
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
    </div>
</div>

@endsection

@push('addon-script')
<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>

<script>
    $(document).ready(function(){

        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $(document).on('click', '.deleteComment', function (){
            
            if(confirm('Hapus Komentar ?')){
                var thisClicked = $(this);
                var comment_id =  thisClicked.val();

                $.ajax({
                    type: "POST",
                    url: "/delete-comment",
                    data: {
                        'comment_id': comment_id
                    },
                    success: function (res) {
                        if(res.status == 200){
                            thisClicked.closest('.comment-container').remove();
                            alert(res.message);
                        } else {
                            alert(res.message);
                        }
                    }
                });
            }
        });
    });
</script>
@endpush