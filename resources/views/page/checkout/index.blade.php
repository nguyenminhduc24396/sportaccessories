@extends('page.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">@lang('layout.home')</a></li>
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
                        <h4>@lang('checkout.info')</h4>
                        <p class="text-muted">@lang('checkout.enter')</p>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">@lang('checkout.name1') <em>*</em></label>
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required="required" placeholder="@lang('checkout.name2')">
                        </div>
                        <div class="form-group">
                            <label class="control-label">@lang('checkout.address1') <em>*</em></label>
                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" required="required" placeholder="@lang('checkout.address2')">
                        </div>
                        <div class="form-group">
                            <label class="control-label">@lang('checkout.phone1') <em>*</em></label>
                            <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}" required="required" placeholder="@lang('checkout.phone2')">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">@lang('checkout.mail1') <em>*</em></label>
                            <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" required="required" placeholder="@lang('checkout.mail2')">
                        </div>
                        <div class="form-group">
                            <label class="control-label">@lang('checkout.note')</label>
                            <input type="text" class="form-control" name="note">
                        </div>
                        <div class="form-check">
                            <label class="control-label">@lang('checkout.shipping') <em>*</em></label><br>
                            @foreach($shipping as $key => $val)
                                <input class="form-check-input" type="radio" name="shipping_id" id="shipping" value="{{ $val->id }}" required="required"> {{ $val->type }}
                                <br>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <table class="table table-cart-total" id="price">
                            <tr>
                                <td>@lang('checkout.sub'):</td>
                                <td class="text-right" id="total">{{ \Cart::getSubTotal() }} VNĐ</td>
                            </tr>
                            <tr>
                                <td>@lang('checkout.ship'):</td>
                                <td class="text-right" id="shipping_cost">0 VNĐ</td>
                            </tr>
                            <tr>
                                <td>@lang('checkout.total'):</td>
                                <td class="text-right" id="grand_total">{{ \Cart::getSubTotal() }} VNĐ</td>
                            </tr>
                            <input type="number" id="total_price" name="total_price" hidden="hidden">
                        </table>
                        <div class="text-right">
                            <p><button type="submit" class="btn btn-default btn-md fwb">@lang('checkout.order')</button></p>
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
