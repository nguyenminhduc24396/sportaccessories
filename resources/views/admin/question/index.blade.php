@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center">Câu hỏi thường gặp</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::open(['route' => 'admin.question.add']) !!}
            <div class="row">
                <div class="col-md-3">
                    {!! Form::text('question', null, ['class' => 'form-control', 'placeholder' => 'Nhập câu hỏi']) !!}
                </div>
                <div class="col-md-8">
                    {!! Form::text('answer', null, ['class' => 'form-control', 'placeholder' => 'Nhập câu trả lời']) !!}
                </div>
                <div class="col-md-1">
                    {!! Form::submit('Thêm', ['class' => 'btn btn-primary float-right']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="row">
    <div class="col-lg-12 mt-3">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>#</th>
                    <th>Câu hỏi</th>
                    <th>Trả lời</th>
                    <th width="5%">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listQ as $key => $val)
                <tr>
                    <td class="text-center">{{ $key+1 }}</td>
                    <td class="text-center">{{ $val->question }}</td>
                    <td>{{ $val->answer }}</td>
                    <td>
                        <button onclick="deleteQ({{ $val->id }})" class="btn btn-danger btn-sm" type="button" title="Delete">Xóa</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    function deleteQ(id)
    {
        $.ajax({
            url: "{{ route('admin.question.delete') }}",
            type: "POST",
            data: {id: id},
            success: function(res) {
                res = $.trim(res);
                if (res === 'OK') {
                    alert('Xóa thành công');
                    window.location.reload(true);
                } else {
                    alert('Có lỗi xảy ra');
                }
            }
        });
    }
</script>
@endsection
