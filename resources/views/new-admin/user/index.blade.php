<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="card-header justify-content-between d-flex">
                    <div class="col-md-6">
                        <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add
                            New</a>
                    </div>
                    <div class="col-6 text-right">
                        <form action="user-filter" class="text-right" method="GET">
                            @csrf
                            <div class="d-flex">
                                <div class="col-md-5 d-flex">
                                    <label class="mt-1 mr-1">Start: </label>
                                    <input type="date" class="form-control input-sm" name="fromDate" id="fromDate"
                                        required>
                                </div>
                                <div class="col-md-5 d-flex">
                                    <label class="mt-1 mr-1">End: </label>
                                    <input type="date" class="form-control input-sm" name="toDate" id="toDate"
                                        required>
                                </div>
                                <button type="submit" name="search" class="btn btn-primary">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Full Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->fullname }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->roles }}</td>
                                    <td>
                                        <a href="{{ route('user.edit', $item->id) }}"
                                            class="btn btn-block btn-outline-success"><i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="{{ route('user.show', $item->id) }}"
                                            class="btn btn-block btn-outline-secondary"><i class="fas fa-edit"></i>
                                            Detail
                                        </a>
                                        <form action="{{ route('user.destroy', $item->id) }}"
                                            onclick="return confirm('Delete Data ?')" method="POST" class="mt-2">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-block btn-outline-danger"><i
                                                    class="fas fa-trash"></i>
                                                Delete</button>
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

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": false,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-12:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
