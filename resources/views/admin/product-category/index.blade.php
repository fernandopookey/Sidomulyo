<a href="{{ route('product-category.create') }}" class="btn btn-primary mb-3">
    <i class="fa fa-plus"></i> Tambah
</a>

<div class="table-responsive">
    <table class="table table-hover table-striped scroll-horizontal-vertical w-100" id="crudTable">
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Gambar Kategori Produk</th>
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
                { data: 'name', name: 'name' },
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