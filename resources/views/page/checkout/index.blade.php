@extends('page.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="active">Checkout</li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="cart">
                <form action="{{ route('handlecheckout') }}" method="POST">
                    @csrf
                    <div class="col-sm-12 col-lg-offset-2">
                        <h4>THÔNG TIN KHÁCH HÀNG</h4>
                        <p class="text-muted">Nhập thông tin và địa chỉ bạn muốn giao hàng</p>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Tên người nhận <em>*</em></label>
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required="required">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Địa chỉ người nhận <em>*</em></label>
                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" required="required">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Số điện thoại người nhận <em>*</em></label>
                            <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}" required="required">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Email người nhận <em>*</em></label>
                            <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" required="required">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Lưu ý</label>
                            <input type="text" class="form-control" name="note">
                        </div>
                        <div class="form-check">
                            <label class="control-label">Hình thức giao hàng <em>*</em></label><br>
                            @foreach($shipping as $key => $val)
                                <input class="form-check-input" type="radio" name="shipping_id" id="shipping" value="{{ $val->id }}" required="required"> {{ $val->type }}
                                <br>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <table class="table table-cart-total" id="price">
                            <tr>
                                <td>Đơn hàng:</td>
                                <td class="text-right" id="total">{{ \Cart::getSubTotal() }} VNĐ</td>
                            </tr>
                            <tr>
                                <td>Phí giao hàng:</td>
                                <td class="text-right" id="shipping_cost">0 VNĐ</td>
                            </tr>
                            <tr>
                                <td>Tổng:</td>
                                <td class="text-right" id="grand_total">{{ \Cart::getSubTotal() }} VNĐ</td>
                            </tr>
                            <input type="number" id="total_price" name="total_price" hidden="hidden">
                        </table>
                        <div class="text-right">
                            <p><button type="submit" class="btn btn-default btn-md fwb">ĐẶT HÀNG</button></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("input:radio[name=shipping_id]").on("click", function()
            {
                let shipping_id = $( "input:radio[name=shipping_id]:checked" ).val();
                if (shipping_id == 1) {
                    let shipping_cost = 35000;
                    let grand_total = (parseFloat(shipping_cost) + parseFloat($("#price").find("#total").text()));
                    $("#shipping_cost").text(shipping_cost + " VNĐ");
                    $("#grand_total").text(grand_total + ' VNĐ');
                    $('#total_price').val(grand_total);
                } else {
                    let shipping_cost = 12000;
                    let grand_total = (parseFloat(shipping_cost) + parseFloat($("#price").find("#total").text()));
                    $("#shipping_cost").text(shipping_cost + " VNĐ");
                    $("#grand_total").text(grand_total + ' VNĐ');
                    $('#total_price').val(grand_total);
                }
            })
        });
    </script>
@endsection
