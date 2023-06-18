<style>
    .table-index {
        text-align: center;
    }
</style>

<a href="{{ route('discountTotalPayment.create') }}" class="btn btn-primary mb-3">
    <i class="fa fa-plus"></i> Tambah
</a>

<div class="table-responsive">
    <table class="table table-hover scroll-horizontal-vertical w-100 table-index">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Total Pembayaran</th>
                <th scope="col">Diskon</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($discountTotalPayment as $item)
            <tr class="tbl">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->total_payment }}</td>
                <td>{{ $item->discount }}</td>
                <td width="13%">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('discountTotalPayment.edit', $item->id) }}" class="btn btn-success mx-2"><i
                                class="fas fa-edit"></i>
                            Edit
                        </a>
                        <form action="{{ route('discountTotalPayment.destroy', $item->id) }}" method="POST"
                            onclick="return confirm('Anda Yakin ?')">
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

@push('addon-script')

<script>
    $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
         console.log(status);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/change',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>

@endpush