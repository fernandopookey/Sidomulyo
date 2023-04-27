<style>
    .table-index {
        text-align: center;
    }
</style>

<div class="row">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover scroll-horizontal-vertical w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Bank</th>
                        <th>Nomor Rekening</th>
                        <th>Atas Nama Bank</th>
                        <th>Bukti Transfer</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach ($paymentConfirmation as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->bank }}</td>
                        <td>{{ $item->account_number }}</td>
                        <td>{{ $item->account_name }}</td>
                        <td>
                            <img src="{{ Storage::disk('local')->url($item->photos) }}"
                                style="width: 100px; height: 70px; object-fit: cover;" alt="">
                        </td>
                        <td width="14%">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('paymentConfirmation.show', $item->id) }}"
                                    class="btn btn-info mx-2 text-light"><i class="fas fa-edit"></i>
                                    Detail
                                </a>
                                <form action="{{ route('paymentConfirmation.destroy', $item->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
                                        Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>