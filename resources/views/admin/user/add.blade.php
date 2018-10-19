@extends('admin.layout')
@section('content')
    <div class="col-lg-12">
        <h3 class="text-center">Thêm tài khoản</h3>
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
    {!! Form::open(['route' => 'admin.user.handleadd']) !!}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('email', 'E-Mail') !!}
                    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Mật khẩu'); !!}
                    {!! Form::password('password', ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Họ tên') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('dob', 'Ngày sinh') !!}
                    {!! Form::date('dob', null, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phone', 'Số điện thoại') !!}
                    {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('address', 'Địa chỉ') !!}
                    {!! Form::text('address', null, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
            </div>
        </div>
        <div class="col-lg-6 offset-3">
            {!! Form::submit('Thêm tài khoản', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    {!! Form::close() !!}
@endsection
