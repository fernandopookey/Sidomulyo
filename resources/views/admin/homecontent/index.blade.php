<a href="{{ route('homecontent.create') }}" class="btn btn-primary mb-3">
    <i class="fa fa-plus"></i> Tambah
</a>

<div class="table-responsive">
    <table class="table table-hover table-striped scroll-horizontal-vertical w-100" id="crudTable">
        <thead>
            <tr>
                <th>Title Link</th>
                <th>Link</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($product as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td><i class="fa fa-eye"></i></td>
            </tr>
            @endforeach --}}
        </tbody>
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
                // { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'link', name: 'link' },
                { data: 'icon', name: 'icon' },
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