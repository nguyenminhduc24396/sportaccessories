@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center">Tài khoản</h3>
    </div>
    <div class="col-lg-6">
        <select name="role" id="role" style="height: 31px">
            <option value="-1">Tất cả</option>
            <option value="0">Quản lý</option>
            <option value="1">Người dùng</option>
        </select>
        <input type="text" id="keyword" value="{{ $key }}">
        <button type="button" id="search" class="btn btn-primary" onclick="searchData();">Tìm kiếm</button>
    </div>
    <div class="col-lg-6">
        @if (Auth::user()->role == -1)
        <a href="{{ route('admin.user.add') }}" title="Add Product" class="btn btn-primary float-right">Thêm tài khoản quản lý</a>
        @endif
    </div>
    <div class="col-lg-12 mt-3">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>#</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Ngày sinh</th>
                    <th>Trạng thái</th>
                    <th colspan="2" width="10%" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listAcc as $key => $val)
                <tr class="text-center">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->email }}</td>
                    <td>{{ $val->phone }}</td>
                    <td>{{ $val->address }}</td>
                    <td>{{ \Carbon\Carbon::parse($val->dob)->format('d-m-Y') }}</td>
                    <td>{{ ($val->status == 1) ? 'Hoạt động' : 'Ngừng hoạt động' }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.user.edit',['id'=>$val->id]) }}" title="Edit">Sửa</a>
                    </td>
                    <td>
                        <button onclick="deleteAc({{ $val->id }})" class="btn btn-danger btn-sm" type="button" title="Delete" {{ (Auth::user()->role == 0) ? 'disabled': '' }}>Xóa</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-lg-12 text-center mt-3">
            {{ $listAcc->appends(request()->query())->links() }}
        </div>
    </div>
</div>
<script type="text/javascript">
    function searchData()
    {
        let keyword = $('#keyword').val().trim();
        let role = $('#role').val().trim();
        window.location.href = "{{ route('admin.user') }}" + "?keyword="+keyword+"&role="+role;
    }
    function deleteAc(id)
    {
        $.ajax({
            url: "{{ route('admin.user.delete') }}",
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
