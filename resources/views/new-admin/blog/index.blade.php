<div class="row">
    <div class="card">
        <div class="col-6 text-start mt-4 mb-4">
            <a href="{{ route('blog.create') }}" class="btn bg-gradient-dark mb-0">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover scroll-horizontal-vertical w-100" id="crudTable">
                <thead>
                    <tr>
                        <th>Judul Blog</th>
                        <th>Author</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
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
                { data: 'name', name: 'name', width: '45%' },
                { data: 'author', name: 'author' },
                { data: 'photos', name: 'photos' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '20%'
                },
            ]
        })
</script>
@endpush