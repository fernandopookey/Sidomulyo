<style>
    .table-index {
        text-align: center;
    }
</style>

<div class="table-responsive">
    <table class="table table-hover scroll-horizontal-vertical w-100 table-index">
        <tbody>
            <tr>
                <td>Bank</td>
                <td>
                    <div class="input-group input-group-static">
                        {{-- <input type="text" name="bank" class="form-control" value="{{ $payment->bank }}" disabled> --}}
                        <input type="text" name="bank" class="form-control"
                            value="{{ !empty($payment->bank->name) ? $payment->bank->name : 'Bank name has  been deleted' }}"
                            disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Nomor Rekening</td>
                <td>
                    <div class="input-group input-group-static">
                        <input type="text" name="account_number" class="form-control"
                            value="{{ $payment->account_number }}" disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Atas nama bank</td>
                <td>
                    <div class="input-group input-group-static">
                        <input type="text" name="account_name" class="form-control"
                            value="{{ $payment->account_name }}" disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Kode Pembayaran</td>
                <td>
                    <div class="input-group input-group-static">
                        <input type="text" name="code" class="form-control" value="{{ $payment->code }}" disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Tanggal Pembayaran</td>
                <td>
                    <div class="input-group input-group-static">
                        <input type="text" name="created_at" class="form-control" value="{{ $payment->created_at }}"
                            disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Bukti Pembayaran</td>
                <td>
                    <div class="input-group input-group-static">
                        <img src="{{ Storage::disk('local')->url($payment->photos) }}" class="img-fluid" width="400"
                            alt="">
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('transaction.index') }}" class="btn btn-primary">Kembali</a>
</div>
