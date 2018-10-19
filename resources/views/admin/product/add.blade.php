@extends('admin.layout')
@section('content')
    <div class="col-lg-12">
        <h3 class="text-center">Thêm sản phẩm</h3>
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
    {!! Form::open(['route' => 'admin.product.handleadd', 'files' => 'true']) !!}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('namepd', 'Tên sản phẩm') !!}
                    {!! Form::text('namepd', null, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Danh mục') !!}
                    {!! Form::select('category_id', $categories->pluck('name_cat', 'id'), null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Giá') !!}
                    {!! Form::number('price', null, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('sale', 'Giảm giá') !!}
                    {!! Form::number('sale', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('qty', 'Số lượng') !!}
                    {!! Form::number('qty', null, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image', 'Ảnh') !!}
                    {!! Form::file('image', ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Mô tả') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'true', 'rows' => 5]) !!}
                </div>
            </div>
        </div>
        <div class="col-lg-6 offset-3">
            {!! Form::submit('Thêm sản phẩm', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    {!! Form::close() !!}
@endsection
