<a href="{{ route('client.create') }}" class="btn btn-primary mb-3">
    <i class="fa fa-plus"></i> Tambah
</a>

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