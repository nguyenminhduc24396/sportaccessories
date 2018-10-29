@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center">Bài viết</h3>
    </div>
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-6">
                <input type="text" class="form-control" id="keyword" value="{{ $key }}" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="col-lg-3">
                <button type="button" id="search" class="btn btn-primary" onclick="searchData();">Tìm kiếm</button>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <a href="{{ route('admin.post.add') }}" title="Add Product" class="btn btn-primary float-right">Thêm bài viết</a>
    </div>
    <div class="col-lg-12 mt-3">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá gốc</th>
                    <th>Giá giảm</th>
                    <th>Số lượng</th>
                    <th>Trạng thái</th>
                    <th colspan="2" width="10%" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listPd as $key => $val)
                <tr class="text-center">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $val->namepd }}</td>
                    <td>
                        <img src="{{ URL::to('/').'/uploads/images/'.$val->image }}" alt="" width="120" height="120">
                    </td>
                    <td>{{ number_format($val->price).' VNĐ'}}</td>
                    <td>{{ ($val->sale != null) ? number_format($val->sale).' VNĐ' : '' }}</td>
                    <td>{{ $val->qty }}</td>
                    <td>{{ ($val->status == 1 && $val->qty > 0) ? 'Còn hàng' : 'Hết hàng' }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.product.edit',['id'=>$val->id]) }}" title="Edit">Sửa</a>
                    </td>
                    <td>
                        <button onclick="deletePd({{ $val->id }})" class="btn btn-danger btn-sm" type="button" title="Delete" {{ (Auth::user()->role == 0) ? 'disabled': '' }}>Xóa</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-lg-12 text-center mt-3">
            {{ $listPd->appends(request()->query())->links() }}
        </div>
    </div>
</div>
<script type="text/javascript">
    function searchData()
    {
        let keyword = $('#keyword').val().trim();
        window.location.href = "{{ route('admin.post') }}" + "?keyword="+keyword;
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
