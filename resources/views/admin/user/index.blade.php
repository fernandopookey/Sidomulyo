<style>
    .table-index {
        text-align: center;
    }
</style>

<a href="{{ route('user.create') }}" class="btn btn-primary mb-3">
    <i class="fa fa-plus"></i> Tambah
</a>

<div class="table-responsive">
    <table class="table table-hover scroll-horizontal-vertical w-100 table-index">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
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
                    {{-- <input data-id="{{ route('user.change', $item->id) }}" class="toggle-class" type="checkbox"
                        data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                        data-off="InActive" {{ $item->status ? 'checked' : '' }}> --}}
                    {{-- @if ($item->status==1)
                    <form action="/admin/change/{$id}" method="POST">
                        @csrf
                        <button class="btn btn-primary">Active</button>
                    </form>
                    @else
                    <form action="/admin/change/{$id}" method="POST">
                        @csrf
                        <button class="btn btn-danger">Inactive</button>
                    </form>
                    @endif --}}

                    {{-- @if ($item->status==1)
                    <a href="{{ route('change.index', $item->id) }}" class="btn btn-success">Active</a>
                    @else
                    <a href="{{ route('change.index', $item->id) }}" class="btn btn-danger">Inactive</a>
                    @endif --}}
                </td>
                <td>
                    <img src="{{ Storage::disk('local')->url($item->photos) }}"
                        style="width: 100px; height: 70px; object-fit: cover;" alt="">
                </td>
                <td width="20%">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-success mx-2"><i
                                class="fas fa-edit"></i>
                            Edit</a>
                        <form action="{{ route('user.destroy', $item->id) }}" method="POST">
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