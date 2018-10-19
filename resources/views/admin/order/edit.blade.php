@extends('admin.layout')
@section('content')
    <div class="col-lg-12">
        <h3 class="text-center">Cập nhật đơn hàng</h3>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    {!! Form::open(['route' => ['admin.order.handleedit', $info->id]]) !!}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('name', 'Họ tên') !!}
                    {!! Form::text('name', $info->name, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('address', 'Địa chỉ') !!}
                    {!! Form::text('address', $info->address, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('note', 'Lưu ý') !!}
                    {!! Form::text('note', $info->note, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('shipping_id', 'Hình thức giao hàng') !!}
                    {!! Form::select('shipping_id', $shipping->pluck('type', 'id'), $info->shipping_id, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('payment_id', 'Phương thức thanh toán') !!}
                    {!! Form::select('payment_id', $payment->pluck('name', 'id'), $info->payment_id, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('order_status_id', 'Trạng thái') !!}
                    {!! Form::select('order_status_id', $orderStatus->pluck('description', 'id'), $info->order_status_id, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="col-lg-6 offset-3">
            {!! Form::submit('Cập nhật đơn hàng', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    {!! Form::close() !!}
@endsection
