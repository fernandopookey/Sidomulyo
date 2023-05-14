<a href="{{ route('slider.create') }}" class="btn btn-primary mb-3">
    <i class="fa fa-plus"></i> Tambah
</a>

<div class="table-responsive">
    <table class="table table-bordered table-hover scroll-horizontal-vertical w-100" id="crudTable">
        <thead>
            <tr>
                <th>Gambar Slider</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
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
                { data: 'photos', name: 'photos' },
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