<div class="row">
    <div class="card">
        <div class="col-6 text-start mt-4 mb-4">
            <a class="btn bg-gradient-dark mb-0" href="{{ route('product-category.create') }}">
                <i class="fa fa-plus"></i> Tambah</a>
        </div>

        {{-- <a href="{{ route('product-category.create') }}" class="btn btn-primary mb-3 btn-blcok">
            <i class="fa fa-plus"></i> Tambah
        </a> --}}

        <div class="table-responsive">
            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                <thead>
                    <tr>
                        <th>Nama Kategori</th>
                        <th>Gambar Kategori</th>
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