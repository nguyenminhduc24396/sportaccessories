@extends('admin.layout')
@section('content')
    <div class="col-lg-12">
        <h3 class="text-center">Thêm bài viết</h3>
    </div>
    {!! Form::open(['route' => 'admin.post.handleadd', 'files' => 'true']) !!}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('title', 'Tiêu đề') !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('thumbnail', 'Ảnh') !!}
                    {!! Form::file('thumbnail', ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('description', 'Nội dung') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'true', 'id' => 'editor1']) !!}
                </div>
            </div>
        </div>
        <div class="col-lg-6 offset-3">
            {!! Form::submit('Thêm bài viết', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    {!! Form::close() !!}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script> CKEDITOR.replace('editor1'); </script>
@endsection
