<style>
    .product-route {
        color: #fff;
    }
</style>

<a href="{{ route('admin-product-create') }}" class="btn btn-primary mb-3">
    <i class="fa fa-plus"></i> Tambah
</a>

<div class="table-responsive">
    <table class="table table-bordered table-hover scroll-horizontal-vertical w-100" id="crudTable">
        <thead class="thead-light">
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Kategori Produk</th>
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
                { data: 'price', name: 'price' },
                { data: 'categories.name', name: 'categories.name' },
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
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
              .create(document.querySelector('#editor'))
              .then(editor => {
                console.log(editor);
              })
              .catch(error => {
                console.error(error);
              });
</script>
<script>
    ClassicEditor
              .create(document.querySelector('#editor2'))
              .then(editor => {
                console.log(editor);
              })
              .catch(error => {
                console.error(error);
              });
</script>
@endpush