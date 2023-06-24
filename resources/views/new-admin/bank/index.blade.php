<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <a href="{{ route('bank.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add
                        New</a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="4%">No</th>
                                <th>Name</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bank as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('bank.edit', $item->id) }}"
                                            class="btn btn-block btn-outline-success"><i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('bank.destroy', $item->id) }}"
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
