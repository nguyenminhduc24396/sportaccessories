@extends('admin.layout')

@section('content')
    <div class="col-lg-12">
        <h3 class="text-center">Thông tin cá nhân</h3>
    </div>
    {!! Form::open(['route' => 'admin.update']) !!}
        <div class="row">
            <div class="col-lg-6">
                {!! Form::text('id', $info->id, ['hidden' => 'true']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Họ tên') !!}
                    {!! Form::text('name', $info->name, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Mật khẩu'); !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('dob', 'Ngày sinh') !!}
                    {!! Form::date('dob', \Carbon\Carbon::parse($info->dob)->format('Y-m-d'), ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('email', 'E-Mail') !!}
                    {!! Form::email('email', $info->email, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phone', 'Số điện thoại') !!}
                    {!! Form::text('phone', $info->phone, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('address', 'Địa chỉ') !!}
                    {!! Form::text('address', $info->address, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
            </div>
        </div>
        <div class="col-lg-6 offset-3">
            {!! Form::submit('Cập nhật thông tin cá nhân', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    {!! Form::close() !!}
@endsection
