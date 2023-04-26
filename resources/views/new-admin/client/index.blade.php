<div class="row">
    <div class="card">
        <div class="col-6 text-start mt-4 mb-4">
            <a href="{{ route('client.create') }}" class="btn bg-gradient-dark mb-0">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover scroll-horizontal-vertical w-100" id="crudTable">
                <thead>
                    <tr>
                        <th>Nama Klien</th>
                        <th>Gambar Klien</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    @push('addon-script')
    <script>
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'name', name: 'name' },
                { data: 'photos', name: 'photos' },
                // { data: 'description', name: 'description'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '25%'
                },
            ]
        })
    </script>
    @endpush