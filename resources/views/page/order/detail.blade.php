@extends('page.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">@lang('layout.home')</a></li>
                <li class="active"><a href="{{ route('order') }}">@lang('layout.order')</a></li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="container">
                <div class="table-responsive">
                    <table class="table custom-table">
                        <h4 class="text-center">@lang('layout.order')</h4>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('cart.name')</th>
                                <th>@lang('cart.image')</th>
                                <th>@lang('cart.price')</th>
                                <th>@lang('cart.qty')</th>
                                <th>@lang('cart.sub')</th>
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
                                <td>{{ $val->namepd }}</td>
                                <td><img src="{{ URL::to('/').'/uploads/images/'.$val->image }}" alt="" width="120" height="120"></td>
                                <td>{{ number_format($val->price) }} VNĐ</td>
                                <td>{{ $val->qty }}</td>
                                <td>{{ number_format($subTotal) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <td colspan="5">@lang('cart.total')</td>
                                <td>{{ number_format($total) }} VNĐ</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            <div class="line2"></div>
        </div>
    </div>
@endsection
