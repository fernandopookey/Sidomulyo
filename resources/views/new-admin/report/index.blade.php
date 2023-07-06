<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="col-md-6">
                    <form action="report-filter" class="text-right" method="GET">
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
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Payment Confirmation Code</th>
                                <th>Profit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($report as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ formatRupiah($item->profit) }}</td>
                                    <td>
                                        <form action="{{ route('transaction.destroy', $item->id) }}"
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
