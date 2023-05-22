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
                <th scope="col">Bank</th>
                <th scope="col">Nomor Rekening</th>
                <th scope="col">Atas Nama Bank</th>
                <th scope="col">Bukti Transfer</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payment as $item)
            <tr class="tbl">
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
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>