<a href="{{ route('installation.create') }}" class="btn btn-primary mb-3">
    <i class="fa fa-plus"></i> Tambah
</a>

<div class="table-responsive">
    <table class="table table-striped table-hover scroll-horizontal-vertical w-100" id="crudTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Gambar</th>
                <th>Action</th>
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