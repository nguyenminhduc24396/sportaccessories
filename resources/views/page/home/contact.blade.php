@extends('page.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="active">Liên hệ</li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="page-title page-title-line">
                        <h2>Liên hệ</h2>
                    </div>
                    <p class="text-muted">Vui lòng điền đầy đủ thông tin dưới đây</p>
                    {!! Form::open(['route' => 'handlecontact']) !!}
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('email', 'E-Mail') !!}
                                    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('name', 'Tên khách hàng') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('subject', 'Tiêu đề') !!}
                                    {!! Form::text('subject', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('message', 'Mô tả') !!}
                                    {!! Form::textarea('message', null, ['class' => 'form-control', 'required' => 'true', 'rows' => 7]) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::submit('Gửi', ['class' => 'btn btn-default btn-lg']) !!}
                    {!! Form::close() !!}
                    <br>
                </div>
                <div class="col-sm-3">
                    <div class="block">
                        <div class="block-title">
                            <strong><span>Thông tin liên hệ</span></strong>
                        </div>
                        <div class="block-content">
                            <div class="email add">
                                <p>nguyenminhduc24396@gmail.com</p>
                            </div>
                            <div class="phone add">
                                <p>082 776 8889</p>
                            </div>
                            <div class="address add">Address: 
                                <p>16 Nguyễn Trung Ngạn - Hai Bà Trưng - Hà Nội</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
