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
                        <input type="text" name="fullname" class="form-control" value="{{ $payment->bank }}" disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Nomor Rekening</td>
                <td>
                    <div class="input-group input-group-static">
                        <input type="text" name="fullname" class="form-control" value="{{ $payment->account_number }}"
                            disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Atas nama bank</td>
                <td>
                    <div class="input-group input-group-static">
                        <input type="text" name="fullname" class="form-control" value="{{ $payment->account_name }}"
                            disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Kode Pembayaran</td>
                <td>
                    <div class="input-group input-group-static">
                        <input type="text" name="fullname" class="form-control" value="{{ $payment->code }}" disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Tanggal Pembayaran</td>
                <td>
                    <div class="input-group input-group-static">
                        <input type="text" name="fullname" class="form-control" value="{{ $payment->created_at }}"
                            disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Bukti Pembayaran</td>
                <td>
                    <div class="input-group input-group-static">
                        <img src="{{ Storage::disk('local')->url($payment->photos) }}"
                            style="width: 150px; height: 150px; object-fit:cover;" alt="">
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>