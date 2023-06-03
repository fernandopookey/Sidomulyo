<link rel="shortcut icon" href="images/iconcircle.png">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

{{--
<link rel="stylesheet" href="user-template/build/css/style.css"> --}}


{{--
<link rel="stylesheet" href="user-template/src/css/style.css"> --}}

<link rel="stylesheet" href="{{ asset('user-template/src/css/style.css') }}">
<script src="https://kit.fontawesome.com/5ba479d13b.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


<main id="pt-pageContent">
    <div class="container-indent">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-5 col-xl-4">
                            <h2 class="pt-title-page text-center">Lupa Password</h2>
                            <form id="login-form" class="form-default form-layout-01" method="post"
                                novalidate="novalidate" action="{{ route('password.email') }}">
                                @csrf

                                @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                                @endif

                                <div class="form-group">
                                    <label for="inputLastName">Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        value="{{ old('email') }}" placeholder="Masukan Email anda" required>
                                    <span class="text-danger">
                                        @error('email'){{ $message }}@enderror
                                    </span>
                                    {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror --}}
                                </div>
                                <div class="form-content">
                                    <button type="submit" class="btn btn-dark btn-block btn-top">
                                        Kirim Link Reset Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="user-template/external/jquery/jquery.min.js"><\/script>')
</script>
<script async src="user-template/build/js/bundle.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>