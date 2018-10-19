@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center">Chi tiết đơn hàng</h3>
    </div>
    <div class="col-lg-12 mt-3">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng giá</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $total = 0;
                @endphp
                @foreach($infoOd as $key => $val)
                    @php
                        $subTotal = $val->qty * $val->price;
                        $total += $subTotal;
                    @endphp
                    <tr class="text-center">
                        <td>{{ $key+1 }}</td>
                        <td>{{ $val->product->namepd }}</td>
                        <td><img src="{{ URL::to('/').'/uploads/images/'.$val->product->image }}" alt="" width="120" height="120"></td>
                        <td>{{ $val->qty }}</td>
                        <td>{{ number_format($val->price) }}</td>
                        <td>{{ number_format($subTotal) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="text-center">
                    <td colspan="5">Tổng giá đơn hàng</td>
                    <td>{{ number_format($total) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<script type="text/javascript">
    function searchData()
    {
        let keyword = $('#keyword').val().trim();
        window.location.href = "{{ route('admin.order') }}" + "?keyword="+keyword;
    }
    function deletePd(id)
    {
        $.ajax({
            url: "{{ route('admin.order.delete') }}",
            type: "POST",
            data: {id: id},
            success: function(res) {
                res =$.trim(res);
                if (res === 'OK') {
                    alert('Xóa thành công');
                    window.location.reload(true);
                } else {
                    alert('có lỗi xảy ra');
                }
            }
        });
    }
</script>
@endsection
