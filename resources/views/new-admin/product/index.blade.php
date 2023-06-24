<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <a href="{{ route('admin-product-create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add
                        New</a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Product Category</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ formatRupiah($item->price) }}</td>
                                    {{-- <td>{{ $item->categories->name }}</td> --}}
                                    <td>{{ !empty($item->categories->name) ? $item->categories->name : 'Product category has been deleted' }}
                                    </td>
                                    <td>{!! $item->description !!}</td>
                                    <td>{!! $item->additional_info !!}</td>
                                    <td>
                                        <a href="{{ route('admin-product-details', $item->id) }}"
                                            class="btn btn-block btn-outline-success"><i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="{{ route('admin-product-ratings', $item->id) }}"
                                            class="btn btn-block btn-outline-secondary"><i class="fas fa-edit"></i>
                                            Rating
                                        </a>
                                        <form action="{{ route('admin-product-delete', $item->id) }}"
                                            onclick="return confirm('Delete Data ?')" method="POST" class="mt-2">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-block btn-outline-danger"><i
                                                    class="fas fa-trash"></i>
                                                Delete</button>
                                        </form>
                                        {{-- @endif --}}
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
