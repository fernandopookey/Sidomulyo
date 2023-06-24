<style>
    .table-index {
        text-align: center;
    }
</style>

<div class="table-responsive">
    <table class="table table-hover scroll-horizontal-vertical w-100 table-index">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Nomor HP</th>
                <th scope="col">Status Transaksi</th>
                <th>Konfirmasi Pembayaran</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaction as $item)
            <tr class="tbl">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->phone_number }}</td>
                <td>
                    {{-- <a href="#" class="btn btn-warning">{{ $item->transaction_status }}</a> --}}
                    <?php if ($item->transaction_status == 'SUCCESS'){ ?>
                    <a href="{{ url('/admin/transaction-status-update', $item->id) }}"
                        class="btn btn-success">SUKSES</a>
                    <?php }else{ ?>
                    <a href="{{ url('/admin/transaction-status-update', $item->id) }}"
                        class="btn btn-warning">PENDING</a>
                    <?php } ?>
                </td>
                <td>
                    <a href="{{ route('admin-payment-confirmation', $item->id) }}" class="btn btn-primary">
                        Lihat
                    </a>
                </td>
                <td width="14%">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-info mx-2 text-light"><i
                                class="fas fa-edit"></i>
                            Detail
                        </a>
                        <form action="{{ route('transaction.destroy', $item->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>