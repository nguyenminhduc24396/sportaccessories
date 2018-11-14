@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center">Bài viết</h3>
    </div>
    <div class="col-lg-12">
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-6">
                <input type="text" class="form-control" id="keyword" value="{{ $key }}" placeholder="Nhập tiêu đề">
            </div>
            <div class="col-lg-3">
                <button type="button" id="search" class="btn btn-primary" onclick="searchData();">Tìm kiếm</button>
            </div>
        </div>
    </div>
    @if(Auth::user()->role == 0)
        <div class="col-lg-3">
            <a href="{{ route('admin.post.add') }}" title="Add Product" class="btn btn-primary float-right">Thêm bài viết</a>
        </div>
    @endif
    <div class="col-lg-12 mt-3">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Ảnh</th>
                    <th>Tác giả</th>
                    <th>Trạng thái</th>
                    <th colspan="3" width="10%" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listPost as $key => $val)
                <tr class="text-center">
                    <td><a href="{{ route('admin.post.detail',['id'=>$val->id]) }}" style="color: blue;">{{ $key+1 }}</a></td>
                    <td>{{ $val->title }}</td>
                    <td>
                        <img src="{{ URL::to('/').'/uploads/images/'.$val->thumbnail }}" alt="" width="120" height="120">
                    </td>
                    <td>{{ $val->user->name }}</td>
                    <td>{{ ($val->status == 0) ? 'Chưa duyệt' : 'Đã duyệt' }}</td>
                    <td>
                        <button onclick="browse({{ $val->id }})" class="btn btn-success btn-sm" type="button" title="Success" {{ (Auth::user()->role == 0 || $val->status == 1) ? 'disabled': ''}}>Duyệt</button>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.post.edit',['id'=>$val->id]) }}" title="Edit">Sửa</a>
                    </td>
                    <td>
                        <button onclick="deletePd({{ $val->id }})" class="btn btn-danger btn-sm" type="button" title="Delete" {{ (Auth::user()->role == 0) ? 'disabled': '' }}>Xóa</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-lg-12 text-center mt-3">
            {{ $listPost->appends(request()->query())->links() }}
        </div>
    </div>
</div>
<script type="text/javascript">
    function searchData()
    {
        let keyword = $('#keyword').val().trim();
        window.location.href = "{{ route('admin.post') }}" + "?keyword="+keyword;
    }
    function browse(id)
    {
        $.ajax({
            url: "{{ route('admin.post.browse') }}",
            type: "POST",
            data: {id: id},
            success: function(res) {
                res = $.trim(res);
                if (res === 'OK') {
                    alert('Bài viết đã được duyệt');
                    window.location.reload(true);
                } else {
                    alert('Có lỗi xảy ra');
                }
            }
        });
    }
    function deletePd(id)
    {
        $.ajax({
            url: "{{ route('admin.post.delete') }}",
            type: "POST",
            data: {id: id},
            success: function(res) {
                res =$.trim(res);
                if (res === 'OK') {
                    alert('Xóa thành công');
                    window.location.reload(true);
                } else {
                    alert('có lỗi xảy ra');
                }
            }
        });
    }
</script>
@endsection
