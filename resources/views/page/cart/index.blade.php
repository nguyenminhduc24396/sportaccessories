@extends('page.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="active">Giỏ hàng</li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="cart">
                <form>
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead>
                                <tr class="first last">
                                    <th>Xóa</th>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $key => $val)
                                <tr>
                                    <td class="text-center"><a class="btn-remove" href="{{ route('cart.remove',['id'=>$val->id]) }}"><span class="fa fa-trash-o"></span></a></td>
                                    <td>
                                        <img class="product-image" src="{{ URL::to('/').'/uploads/images/'.$val->attributes->image }}">
                                    </td>
                                    <td>
                                        <a href="{{ route('detail', ['id' => $val->id]) }}">{{ $val->name }}</a>
                                    </td>
                                    <td class="qty">
                                        <div class="input-group">
                                            <input type="number" onchange="updateCart(this.value, '{{ $val->id }}')" class="form-control" value="{{ $val->quantity }}" min="1">
                                        </div>
                                    </td>
                                    <td class="subtotal" >{{ number_format($val->price) }}</td>
                                    <td class="grandtotal">{{ number_format($val->price*$val->quantity) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-center">Tổng giá đơn hàng</td>
                                    <td class="grandtotal">{{ number_format(\Cart::getSubTotal()) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('home') }}" class="btn btn-default btn-md">TIẾP TỤC MUA HÀNG</a>
                        @if(!\Cart::isEmpty())
                        <a href="{{ route('checkout') }}" class="btn btn-danger btn-md">TIẾN HÀNH ĐẶT HÀNG</a>
                        @endif
                    </div>
                    <div class="line2"></div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function updateCart(quantity, id)
        {
            $.get(
                "{{ asset("updatecart") }}",
                { quantity:quantity, id:id },
                function () {
                    location.reload();
                }
            );
        }
    </script>
@endsection
