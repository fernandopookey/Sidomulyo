<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <a href="{{ route('slider.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add
                        New</a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th style="width: 15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slider as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ Storage::url($item->photos) }}" class="img-fluid" width="300" alt="">
                                </td>
                                <td>
                                    <?php if ($item->status == 'Enable'){ ?>
                                    <a href="{{ url('/admin/slider-status-update', $item->id) }}"
                                        class="btn btn-success">Enable</a>
                                    <?php }else{ ?>
                                    <a href="{{ url('/admin/slider-status-update', $item->id) }}"
                                        class="btn btn-danger">Disable</a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="{{ route('slider.edit', $item->id) }}"
                                        class="btn btn-block btn-outline-success"><i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('slider.destroy', $item->id) }}"
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
            </div>
        </div>
    </div>
</div>