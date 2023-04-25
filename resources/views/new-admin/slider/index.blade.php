<a href="{{ route('slider.create') }}" class="btn btn-primary mb-3">
    <i class="fa fa-plus"></i> Tambah
</a>

<div class="table-responsive">
    <table class="table table-hover table-striped scroll-horizontal-vertical w-100" id="crudTable">
        <thead>
            <tr>
                <th>Judul Slider</th>
                <th>Gambar Slider</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($slider as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <img src="" width="100px" alt="">
                    <img src="{{ asset('/app/assets/slider/' . $item->photos) }}" width="100px" alt="">
                </td>
                <td>
                    <div class="d-flex">
                        <a class="pr-2" href="/admin/slider/{{ $item->id }}/edit">
                            <button class="btn btn-warning w-full"> Edit</button>
                        </a>

                        <form action="/admin/slider/{{ $item->id }}" class="w-full" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </td>
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