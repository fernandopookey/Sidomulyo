<section class="content">
    <div class="card">
        <div class="card-body row">
            <div class="col-12">
                <h2>Data Transaksi</h2>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="inputName">Nama Pemesan</label><br />
                            <input type="text" value="{{ $transaction->name }}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="inputName">Nomor Handphone</label><br />
                            <input type="text" value="{{ $transaction->phone_number }}" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="inputName">Alamat</label><br />
                            <input type="text" value="{{ $transaction->address }}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="inputName">Status Transaksi</label><br />
                            <input type="text" value="{{ $transaction->transaction_status }}" class="form-control"
                                disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="inputName">Total Harga</label><br />
                            <input type="text" value="{{ $transaction->total_price }}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="inputName">Kode Transaksi</label><br />
                            <input type="text" value="{{ $transaction->code }}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="inputMessage">Tanggal Transaksi</label>
                            <input type="text" class="form-control" value="{{ $transaction->created_at }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body row">
            <div class="col-12">
                <h2>Produk Yang Dibeli</h2>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga Produk</th>
                                <th scope="col">Banyak Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction->transactionDetails as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->product->price }}</td>
                                <td>{{ $item->qty }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body row">
            <div class="col-12">
                <h2>Data User</h2>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="inputName">Nama Lengkap</label><br />
                            <input type="text" value="{{ $transaction->user->fullname }}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="inputName">Username</label><br />
                            <input type="text" value="{{ $transaction->user->username }}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="inputName">Nomor Handphone</label><br />
                            <input type="text" value="{{ $transaction->user->phone_number }}" class="form-control"
                                disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="inputName">Email</label><br />
                            <input type="text" value="{{ $transaction->user->email }}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="inputName">Alamat</label><br />
                            <input type="text" value="{{ $transaction->user->address }}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="inputName">Roles</label><br />
                            <input type="text" value="{{ $transaction->user->roles }}" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="inputName">Status</label><br />
                            <?php if ($transaction->user->status == '1'){ ?>
                            <a href="#" class="btn btn-success" disabled>Active</a>
                            <?php }else{ ?>
                            <a href="#" class="btn btn-danger" disabled>Inactive</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="col-lg-6">
        <div class="col text-start">
            <a href="{{ route('transaction.index') }}">
                <button type="button" class="btn btn-primary px-5">
                    Kembali
                </button>
            </a>
        </div>
    </div>
</div>