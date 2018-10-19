@extends('admin.layout')
@section('content')
    <div class="col-lg-12">
        <h3 class="text-center">Cập nhật sản phẩm</h3>
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
    {!! Form::open(['route' => ['admin.product.handleedit', $info->id], 'files' => 'true']) !!}
        <div class="row">
            <div class="col-lg-6">
                {!! Form::text('id', $info->id, ['hidden' => 'true']) !!}
                <div class="form-group">
                    {!! Form::label('namepd', 'Tên sản phẩm') !!}
                    {!! Form::text('namepd', $info->namepd, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Danh mục') !!}
                    {!! Form::select('category_id', $categories->pluck('name_cat', 'id'), $info->category_id, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Giá') !!}
                    {!! Form::number('price', $info->price, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('sale', 'Giảm giá') !!}
                    {!! Form::number('sale', $info->sale, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('qty', 'Số lượng') !!}
                    {!! Form::number('qty', $info->qty, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('status', 'Trạng thái') !!}
                    {!! Form::select('status', ['0' => 'Hết hàng', '1' => 'Còn hàng'], $info->status, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image', 'Ảnh') !!}
                    {!! Form::file('image', ['class' => 'form-control']) !!}
                    <img src="{{ URL::to('/').'/uploads/images/'.$info->image }}" width="120" height="125">
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Mô tả') !!}
                    {!! Form::textarea('description', $info->description, ['class' => 'form-control', 'required' => 'true', 'rows' => 3]) !!}
                </div>
            </div>
        </div>
        <div class="col-lg-6 offset-3">
            {!! Form::submit('Cập nhật sản phẩm', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    {!! Form::close() !!}
@endsection
