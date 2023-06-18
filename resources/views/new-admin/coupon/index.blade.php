<style>
    .table-index {
        text-align: center;
    }
</style>

<a href="{{ route('user.create') }}" class="btn btn-primary mb-3">
    <i class="fa fa-plus"></i> Tambah
</a>

<div class="table-responsive">
    <table class="table table-hover scroll-horizontal-vertical w-100 table-index">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kupon Option</th>
                <th scope="col">Kode</th>
                <th scope="col">Kategori</th>
                <th scope="col">User</th>
                <th scope="col">Kupon Type</th>
                <th scope="col">Rasio Kupon</th>
                <th scope="col">Potongan</th>
                <th scope="col">Tanggal Kadaluarsa</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coupon as $item)
            <tr class="tbl">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->coupon_option }}</td>
                <td>{{ $item->coupon_code }}</td>
                <td>{{ $item->categories }}</td>
                <td>{{ $item->users }}</td>
                <td>{{ $item->coupon_type }}</td>
                <td>
                    {{ $item->amount }}
                    @if ($item->amount_type == "Percentage")
                    %
                    @else
                    INR
                    @endif
                </td>
                <td>{{ $item->amount }}</td>
                <td>{{ $item->expiry_date }}</td>
                <td>
                    <?php if ($item->status == '1'){ ?>
                    <a href="{{ route('coupons.show', $item->id) }}" class="btn btn-success">Active</a>
                    <?php }else{ ?>
                    <a href="{{ route('coupons.show', $item->id) }}" class="btn btn-danger">Inactive</a>
                    <?php } ?>
                </td>
                <td width="20%">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-success mx-2"><i
                                class="fas fa-edit"></i>
                            Edit
                        </a>
                        <a href="{{ route('user.show', $item->id) }}" class="btn btn-warning mx-2"><i
                                class="fas fa-edit"></i>
                            Detail
                        </a>
                        <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
                                Hapus</button>
                        </form>
                    </div>
                    {{-- @if ($item->status == 1)
                    <a class="updateCouponStatus" id="coupon-{{ $item['id'] }}" coupon_id="{{ $item['id'] }}"
                        href="javascript:void(0)"><i class="fas fa-toggle-on" aria-hidden="true" status="Active"></i>
                    </a>
                    @else
                    <a class="updateCouponStatus" id="coupon-{{ $item['id'] }}" coupon_id="{{ $item['id'] }}"
                        href="javascript:void(0)"><i class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i>
                    </a>
                    @endif --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@push('addon-script')

<script>
    $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
         console.log(status);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/change',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>

<script>
    $(document).on("click", "updateCouponStatus", function(){
        var status = $(this).children("i").attr("status");
        var coupon_id = $(this).attr("coupon_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-coupon-status',
            data: {status: status, coupon_id: coupon_id},
            success: function(resp) {
                if(resp['status']==0){
                    $("#coupon-"+coupon_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Active'></i>")
                }else if (resp['status']==1){
                    $("#coupon-"+coupon_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Inactive'></i>")
                }
            }, error: function(){
                alert("Error");
            }
        })
    });
</script>

@endpush