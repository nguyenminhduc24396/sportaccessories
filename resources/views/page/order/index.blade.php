@extends('page.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">@lang('layout.home')</a></li>
                <li class="active">@lang('layout.order')</li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="container">
                <div class="table-responsive">
                    <table class="table custom-table">
                        <h4 class="text-center">@lang('layout.order')</h4>
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>@lang('checkout.name1')</th>
                                <th>@lang('checkout.address1')</th>
                                <th>@lang('checkout.total')</th>
                                <th>@lang('layout.status')</th>
                                <th>@lang('layout.create')</th>
                                <th>@lang('layout.done')</th>
                                <th>@lang('cart.delete')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listOd as $key => $val)
                            <tr class="text-center">
                                <td><a style="color: red; font-weight: bold;" href="{{ route('order.detail', ['id' => $val->id]) }}">{{ $key+1 }}</a></td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->address }}</td>
                                <td>{{ number_format($val->total_price) }} VNĐ</td>
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
