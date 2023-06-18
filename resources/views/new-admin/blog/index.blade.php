<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <a href="{{ route('blog.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add
                        New</a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Sumber</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blog as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->author }}</td>
                                <td>{{ $item->source }}</td>
                                <td>
                                    <a href="{{ route('blog.edit', $item->id) }}"
                                        class="btn btn-block btn-outline-success"><i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                    <a href="{{ route('blog.show', $item->id) }}"
                                        class="btn btn-block btn-outline-secondary"><i class="fas fa-edit"></i>
                                        Detail
                                    </a>
                                    <form action="{{ route('blog.destroy', $item->id) }}"
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