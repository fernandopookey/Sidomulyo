<style>
    .table-index {
        text-align: center;
    }
</style>

<div class="row">
    <div class="card">
        <div class="col-6 text-start mt-4 mb-4">
            <a href="{{ route('user.create') }}" class="btn bg-gradient-dark mb-0">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover scroll-horizontal-vertical w-100">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach ($users as $item)
                    <tr class="tbl">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->fullname }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->roles }}</td>
                        <td>
                            <?php if ($item->status == '1'){ ?>
                            <a href="{{ url('/admin/status-update', $item->id) }}" class="btn btn-success">Active</a>
                            <?php }else{ ?>
                            <a href="{{ url('/admin/status-update', $item->id) }}" class="btn btn-danger">Inactive</a>
                            <?php } ?>
                        </td>
                        <td width="20%">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning mx-2"><i
                                        class="fas fa-edit"></i>
                                    Edit
                                </a>
                                <a href="{{ route('user.show', $item->id) }}" class="btn btn-success mx-2"><i
                                        class="fas fa-edit"></i>
                                    Detail
                                </a>
                                <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
                                        Hapus
                                    </button>
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