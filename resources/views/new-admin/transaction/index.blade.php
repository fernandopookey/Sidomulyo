<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Waktu Transaksi</th>
                                <th>Status Transaksi</th>
                                <th>Konfirmasi Pembayaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>
                                    <?php if ($item->transaction_status == 'SUCCESS'){ ?>
                                    <a href="{{ url('/admin/transaction-status-update', $item->id) }}"
                                        class="btn btn-success">SUKSES</a>
                                    <?php }else{ ?>
                                    <a href="{{ url('/admin/transaction-status-update', $item->id) }}"
                                        class="btn btn-warning">PENDING</a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="{{ route('admin-payment-confirmation', $item->id) }}"
                                        class="btn btn-primary">
                                        Lihat
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('transaction.show', $item->id) }}"
                                        class="btn btn-block btn-outline-secondary"><i class="fas fa-edit"></i>
                                        Detail
                                    </a>
                                    <form action="{{ route('transaction.destroy', $item->id) }}"
                                        onclick="return confirm('Hapus Data ?')" method="POST" class="mt-2">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-block btn-outline-danger"><i
                                                class="fas fa-trash"></i>
                                            Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
</div>