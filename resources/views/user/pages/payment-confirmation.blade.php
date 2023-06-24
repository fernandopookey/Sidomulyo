@extends('user.layouts.app')

@section('title')
    Sidomulyo | Payment Confirmation Page
@endsection

<style>
    .tes-card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }
</style>

@section('content')
    <div class="pt-breadcrumb">
        <div class="container-fluid">
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('my-transaction') }}">Pesanan</a>
                </li>
                <li>Detail Pesanan</li>
            </ul>
        </div>
    </div>
    <div id="pt-pageContent">
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <h1 class="pt-title-subpages noborder">Konfirmasi Pembayaran</h1>

                {{-- Before Login --}}
                @guest
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10 col-xl-8">
                            <div class="pt-listing-post">
                                <div class="pt-post">
                                    <p class="text-center">Untuk Konfirmasi Pembayaran, anda perlu login terlebih dahulu</p>
                                    <div class="row-btn pt-2">
                                        <a href="{{ route('login') }}">
                                            <button type="button" class="btn btn-block">Login</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endguest

                {{-- After Login --}}
                @auth
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10 col-xl-8">
                            <div class="">
                                <p class="text-center pb-4">Lakukan konfirmasi pembayaran anda secepatnya, dan kami
                                    akan segera memproses pesanan Anda
                                </p>
                                <table class="pt-table-shop-02">
                                    <tbody>
                                        <tr>
                                            <td>Nama</td>
                                            <td>
                                                <div class="input-group input-group-static">
                                                    <input type="text" name="fullname" class="form-control"
                                                        value="{{ $payment->name }}" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kode Pesanan</td>
                                            <td>
                                                <div class="input-group input-group-static">
                                                    <input type="text" name="username" class="form-control"
                                                        value="{{ $payment->code }}" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total Pembayaran</td>
                                            <td>
                                                <div class="input-group input-group-static">
                                                    <input type="text" name="email" class="form-control"
                                                        value="{{ formatRupiah($payment->total_price) }}" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <form action="{{ route('send-payment-confirmation', $payment->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="pt-post">
                                        <div class="row pt-4">
                                            {{-- <input type="hidden" name="name" value="{{ $payment->name }}"> --}}
                                            <input type="hidden" name="total" value="{{ $payment->total }}">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Product Category</label>
                                                    <select name="bank_id" class="form-control">
                                                        @foreach ($bank as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label>Transfer Bank</label>
                                                    <select name="bank" class="form-control">
                                                        <option value="BANK NEGARA INDONESIA">BNI</option>
                                                        <option value="BANK RAKYAT INDONESIA" selected="selected">BRI</option>
                                                        <option value="BANK CENTRAL ASIA">BCA</option>
                                                        <option value="MANDIRI">Mandiri</option>
                                                        <option value="BANK INDONESIA">Bank Indonesia</option>
                                                        <option value="BANK TABUNGAN NEGARA">Bank Tabungan Negara</option>
                                                        <option value="BANK SYARIAH">Bank Syariah</option>
                                                    </select>
                                                    @error('bank')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Nomor Rekening</label>
                                                    <input type="number" name="account_number"
                                                        class="form-control @error('account_number') is-invalid @enderror"
                                                        autocomplete="off" required>
                                                    @error('account_number')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Atas Nama Rekening</label>
                                                    <input type="text" name="account_name"
                                                        class="form-control @error('account_name') is-invalid @enderror"
                                                        autocomplete="off" required>
                                                    @error('account_name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Upload Bukti Pembayaran</label>
                                                    <input type="file" name="photos"
                                                        class="form-control @error('photos') is-invalid @enderror"
                                                        onchange="loadFile(event)" required>
                                                    @error('photos')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <img id="output" class="pb-4"
                                                    style="width: 200px; height: 150px; object-fit: cover;" />
                                            </div>
                                            <div class="row-btn pl-3">
                                                <button type="submit" class="btn btn-block">Kirim</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth
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
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush
