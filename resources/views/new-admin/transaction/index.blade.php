<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Transaction Date</th>
                                <th>Transaction Totals</th>
                                <th>Code</th>
                                <th>Phone Number</th>
                                <th>Transaction Status</th>
                                <th>Payment Confirmation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->created_at->format('d M Y', 'h:i') }}</td>
                                    <td>{{ formatRupiah($item->total_price) }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>
                                        <?php if ($item->transaction_status == 'SUCCESS'){ ?>
                                        <a href="{{ url('/admin/transaction-status-update', $item->id) }}"
                                            onclick="return confirm('Change Status to PENDING ?')"
                                            class="btn btn-success">SUCCESS</a>
                                        <?php }else{ ?>
                                        <a href="{{ url('/admin/transaction-status-update', $item->id) }}"
                                            onclick="return confirm('Change Status to SUCCESS ?')"
                                            class="btn btn-warning">PENDING</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin-payment-confirmation', $item->id) }}"
                                            class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('transaction.show', $item->id) }}"
                                            class="btn btn-block btn-outline-secondary"><i class="fas fa-edit"></i>
                                            Detail
                                        </a>
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
