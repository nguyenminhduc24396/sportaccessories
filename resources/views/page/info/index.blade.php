@extends('page.layout')

@section('content')
<div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="active">Quản lý tài khoản</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
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
    <div class="main">
        <div class="container">
            {!! Form::open(['route' => 'info.update']) !!}
            <div class="col-sm-6">
                <h4>Thông tin cá nhân</h4>
                <div class="line2 mtb20"></div>
                {!! Form::text('id', Auth::id(), ['hidden' => 'true']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'E-Mail', ['class' => 'control-label']) !!}
                    {!! Form::email('email', Auth::user()->email, ['class' => 'form-control', 'readonly' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Mật khẩu', ['class' => 'control-label']); !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Họ tên', ['class' => 'control-label']) !!}
                    {!! Form::text('name', Auth::user()->name, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('dob', 'Ngày sinh', ['class' => 'control-label']) !!}
                    {!! Form::date('dob', \Carbon\Carbon::parse(Auth::user()->dob)->format('Y-m-d'), ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phone', 'Số điện thoại', ['class' => 'control-label']) !!}
                    {!! Form::text('phone', Auth::user()->phone, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('address', 'Địa chỉ', ['class' => 'control-label']) !!}
                    {!! Form::textarea('address', Auth::user()->address, ['class' => 'form-control', 'required' => 'true', 'rows' => 3]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Cập nhật thông tin cá nhân', ['class' => 'btn btn-danger btn-md']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
