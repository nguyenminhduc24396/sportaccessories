@extends('page.layout')

@section('content')
<div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="active"><a href="{{ route('order') }}">Lịch sử mua hàng</a></li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="container">
                <div class="table-responsive">
                    <table class="table custom-table">
                        <h4 class="text-center">Lịch sử mua hàng</h4>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        @php 
                            $total = 0;
                        @endphp
                        <tbody>
                            @foreach($infoOd as $key => $val)
                            @php
                                $subTotal = $val->qty * $val->price;
                                $total += $subTotal;
                            @endphp
                            <tr class="text-center">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $val->product->namepd }}</td>
                                <td><img src="{{ URL::to('/').'/uploads/images/'.$val->product->image }}" alt="" width="120" height="120"></td>
                                <td>{{ number_format($val->price) }}</td>
                                <td>{{ $val->qty }}</td>
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
            <div class="line2"></div>
        </div>
    </div>
@endsection
