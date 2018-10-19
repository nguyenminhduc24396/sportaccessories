@extends('page.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="active">Lịch sử mua hàng</li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="container">
                <div class="table-responsive">
                    <table class="table custom-table">
                        <h4 class="text-center">Lịch sử mua hàng</h4>
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Người nhận</th>
                                <th>Địa chỉ nhận hàng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Ngày nhận</th>
                                <th>Hủy</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listOd as $key => $val)
                            <tr class="text-center">
                                <td><a style="color: red; font-weight: bold;" href="{{ route('order.detail', ['id' => $val->id]) }}">{{ $key+1 }}</a></td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->address }}</td>
                                <td>{{ number_format($val->total_price) }}</td>
                                <td>{{ $val->order_status->description }}</td>
                                <td>{{ \Carbon\Carbon::parse($val->created_at)->format('H:i:s d-m-Y') }}</td>
                                <td>{{ ($val->ship_date != null ) ? \Carbon\Carbon::parse($val->ship_date)->format('H:i:s d-m-Y') : '' }}</td>
                                <td class="text-center">
                                    @if($val->order_status_id == 1)
                                    <button onclick="deleteOd({{ $val->id }})"><span class="fa fa-trash-o"></span></button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <div class="line2"></div>
        </div>
    </div>
    <script type="text/javascript">
    function deleteOd(id)
    {
        $.ajax(
        {
            url: "{{ route('order.remove') }}",
            type: "POST",
            data: {id: id},
            success: function(res) {
                res = $.trim(res);
                if (res === 'OK') {
                    alert('Hủy đơn hàng thành công');
                    window.location.reload(true);
                } else {
                    alert('Có lỗi xảy ra');
                }
            }
        });
    }
    </script>
@endsection
