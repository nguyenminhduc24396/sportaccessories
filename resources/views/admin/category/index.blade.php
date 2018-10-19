@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center">Danh mục</h3>
    </div>
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
<div class="row">
    <div class="col-md-8">
        <input type="text" id="keyword" value="{{ $key }}">
        <button type="button" class="btn btn-primary" id="search" onclick="searchData();">Tìm kiếm</button>
    </div>
    <div class="col-md-4">
        {!! Form::open(['route' => 'admin.category.add']) !!}
            {!! Form::text('name_cat', null, ['placeholder' => 'Nhập tên danh mục']) !!}
            {!! Form::submit('Thêm danh mục', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
<div class="row">
    <div class="col-lg-12 mt-3">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>#</th>
                    <th>Tên danh mục</th>
                    <th>Trạng thái</th>
                    <th colspan="2" width="10%" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listCat as $key => $val)
                <tr class="text-center">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $val->name_cat }}</td>
                    {!! Form::open(['route' => ['admin.category.update', $val->id]]) !!}
                    <td>
                        {!! Form::select('status', array('0' => 'Ngừng hoạt động', '1' => 'Hoạt động'), $val->status, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                        {!! Form::submit('Cập nhật', ['class' => 'btn btn-primary btn-sm']) !!}
                    </td>
                    {!! Form::close() !!}
                    <td>
                        <button onclick="deleteCat({{ $val->id }})" class="btn btn-danger btn-sm" type="button" title="Delete" {{ (Auth::user()->role == 0) ? 'disabled': '' }}>Xóa</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-lg-12 text-center mt-3">
            <p style="color: red">* Chỉ xóa được danh mục khi các sản phẩm thuộc danh mục đó đã xóa hết</p>
        </div>
        <div class="col-lg-12 text-center mt-3">
            {{ $listCat->appends(request()->query())->links() }}
        </div>
    </div>
</div>
<script type="text/javascript">
    function searchData()
    {
        let keyword = $('#keyword').val().trim();
        window.location.href = "{{ route('admin.category') }}" + "?keyword="+keyword;
    }
    function deleteCat(id)
    {
        $.ajax({
            url: "{{ route('admin.category.delete') }}",
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
