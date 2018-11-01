@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center">Đơn hàng</h3>
    </div>
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-6">
                <input type="text" id="keyword" value="{{ $key }}" class="form-control" placeholder="Nhập tên khách hàng">
            </div>
            <div class="col-lg-3">
                <button type="button" id="search" class="btn btn-primary" onclick="searchData();">Tìm kiếm</button>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mt-3">
        <table class="table table-striped table-bordered table-sm">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>#</th>
                    <th>Tên khách hàng</th>
                    <th>Lưu ý</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Hoàn thành</th>
                    <th colspan="4" width="10%" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listOd as $key => $val)
                <tr class="text-center">
                    <td><a href="{{ route('admin.order.detail', ['id' => $val->id]) }}" style="color: blue;">{{ $key+1 }}</a></td>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->note }}</td>
                    <td>{{ $val->phone }}</td>
                    <td>{{ $val->address }}</td>
                    <td>{{ ($val->ship_date != null && $val->order_status->id == 3) ? \Carbon\Carbon::parse($val->ship_date)->format('H:i:s d-m-Y') : '' }}</td>
                    @if($val->shipping_id == 1)
                    <td>
                        <button onclick="ship({{ $val->id }})" class="btn btn-warning btn-sm" type="button" title="Ship" {{ ($val->order_status_id == 3) ? 'disabled': (($val->order_status_id == 2) ? 'disabled': '')}}>Giao hàng</button>
                    </td>
                    @else
                    <td>
                        <button onclick="ship({{ $val->id }})" class="btn btn-info btn-sm" type="button" title="Ship" {{ ($val->order_status_id == 3) ? 'disabled': (($val->order_status_id == 2) ? 'disabled': '')}}>Giao hàng</button>
                    </td>
                    @endif
                    <td>
                        <button onclick="done({{ $val->id }})" class="btn btn-success btn-sm" type="button" title="Success" {{ ($val->order_status_id == 3) ? 'disabled': ''}}>Đã nhận hàng</button>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.order.edit', ['id' => $val->id]) }}" title="Edit">Sửa</a>
                    </td>
                    <td>
                        <button onclick="deleteOd({{ $val->id }})" class="btn btn-danger btn-sm" type="button" title="Delete">Xóa</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-lg-12 text-center mt-3">
            {{ $listOd->appends(request()->query())->links() }}
        </div>
    </div>
</div>
<script type="text/javascript">
    function searchData()
    {
        let keyword = $('#keyword').val().trim();
        window.location.href = "{{ route('admin.order') }}" + "?keyword="+keyword;
    }
    function ship(id)
    {
        $.ajax({
            url: "{{ route('admin.order.ship') }}",
            type: "POST",
            data: {id: id},
            success: function(res) {
                res = $.trim(res);
                if (res === 'OK') {
                    alert('Đơn hàng bắt đầu được giao');
                    window.location.reload(true);
                } else {
                    alert('Có lỗi xảy ra');
                }
            }
        });
    }
    function done(id)
    {
        $.ajax({
            url: "{{ route('admin.order.done') }}",
            type: "POST",
            data: {id: id},
            success: function(res) {
                res = $.trim(res);
                if (res === 'OK') {
                    alert('Đơn hàng đã giao thành công');
                    window.location.reload(true);
                } else {
                    alert('Có lỗi xảy ra');
                }
            }
        });
    }
    function deleteOd(id)
    {
        $.ajax({
            url: "{{ route('admin.order.delete') }}",
            type: "POST",
            data: {id: id},
            success: function(res) {
                res = $.trim(res);
                if (res === 'OK') {
                    alert('Xóa thành công');
                    window.location.reload(true);
                } else {
                    alert('Có lỗi xảy ra');
                }
            }
        });
    }
</script>
@endsection
