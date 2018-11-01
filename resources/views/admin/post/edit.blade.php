@extends('admin.layout')
@section('content')
    <div class="col-lg-12">
        <h3 class="text-center">Sửa bài viết</h3>
    </div>
    {!! Form::open(['route' => ['admin.post.handleedit', $info->id], 'files' => 'true']) !!}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('title', 'Tiêu đề') !!}
                    {!! Form::text('title', $info->title, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                @if(Auth::user()->role == -1)
                <div class="form-group">
                    {!! Form::label('status', 'Trạng thái') !!}
                    {!! Form::select('status', ['0' => 'Chưa duyệt', '1' => 'Đã duyệt'], $info->status, ['class' => 'form-control']) !!}
                </div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('thumbnail', 'Ảnh') !!}
                    {!! Form::file('thumbnail', ['class' => 'form-control']) !!}
                </div>
                <img src="{{ URL::to('/').'/uploads/images/'.$info->thumbnail }}" width="120" height="125">
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('description', 'Nội dung') !!}
                    {!! Form::textarea('description', $info->description, ['class' => 'form-control', 'required' => 'true', 'id' => 'editor1']) !!}
                </div>
            </div>
        </div>
        <div class="col-lg-6 offset-3">
            {!! Form::submit('Cập nhật bài viết', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    {!! Form::close() !!}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script> CKEDITOR.replace('editor1'); </script>
@endsection
