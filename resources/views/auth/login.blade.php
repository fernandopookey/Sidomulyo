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
                            <h2 class="pt-title-page text-center">Login</h2>
                            <form id="login-form" class="form-default form-layout-01" method="post"
                                novalidate="novalidate" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputFitstName">Email</label>
                                    {{-- <div class="pt-required">* Required Fields</div> --}}
                                    <input type="email" type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="Masukan Email anda" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputLastName">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password"
                                        placeholder="Masukan Password anda" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="row-btn">
                                    <button type="submit" class="btn btn-block">LOGIN</button>
                                </div>
                                <div class="form-content">
                                    <h3 class="pt-title-page text-center">Belum Punya Akun ?</h3>
                                    <button type="button" class="btn btn-dark btn-block btn-top">
                                        <a href="{{ route('register') }}" style="color: white;">Registrasi Akun</a>
                                    </button>
                                </div>
                            </form>
                            {{-- <div class="row-btn">
                                <button type="submit" class="btn btn-block">LOGIN WITH GOOGLE</button>
                            </div> --}}
                            <div class="row-btn">
                                <a href="{{ route('google.login') }}" class="btn">Login With Google</a>
                            </div>
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