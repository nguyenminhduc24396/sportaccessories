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
                                    <a class="btn-remove" href="{{ route('order.remove',['id'=>$val->id]) }}"><span class="fa fa-trash-o"></span></a>
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
@endsection
