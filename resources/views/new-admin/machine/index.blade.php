<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <a href="{{ route('machine.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add
                        New</a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Photos</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($machine as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <img src="{{ Storage::url($item->photos) }}" class="img-fluid" width="200" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('machine.edit', $item->id) }}"
                                        class="btn btn-block btn-outline-success"><i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                    <a href="{{ route('machine.show', $item->id) }}"
                                        class="btn btn-block btn-outline-secondary"><i class="fas fa-edit"></i>
                                        Detail
                                    </a>
                                    <form action="{{ route('machine.destroy', $item->id) }}"
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