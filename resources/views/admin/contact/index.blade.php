@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center">Liên hệ</h3>
    </div>
    <div class="col-lg-6">
        <input type="text" id="keyword" value="{{ $key }}">
        <button type="button" id="search" class="btn btn-primary" onclick="searchData();">Tìm kiếm</button>
    </div>
    <div class="col-lg-12 mt-3">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>#</th>
                    <th>Tên khách hàng</th>
                    <th>E-Mail</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    <th>Ngày hỏi</th>
                    <th>Ngày phản hồi</th>
                    <th width="5%">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contact as $key => $val)
                <tr class="text-center">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->email }}</td>
                    <td>{{ $val->subject }}</td>
                    <td>{{ $val->message }}</td>
                    <td>{{ \Carbon\Carbon::parse($val->created_at)->format('H:i:s d-m-Y') }}</td>
                    <td>{{ ($val->updated_at != null) ? \Carbon\Carbon::parse($val->updated_at)->format('H:i:s d-m-Y') : '' }}</td>
                    <td>
                        <button onclick="deleteCt({{ $val->id }})" class="btn btn-danger btn-sm" type="button" title="Delete" {{ ($val->updated_at != null) ? 'disabled': '' }}>Phản hồi</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-lg-12 text-center mt-3">
            {{ $contact->appends(request()->query())->links() }}
        </div>
    </div>
</div>
<script type="text/javascript">
    function searchData()
    {
        let keyword = $('#keyword').val().trim();
        window.location.href = "{{ route('admin.contact') }}" + "?keyword="+keyword;
    }
    function deleteCt(id)
    {
        $.ajax({
            url: "{{ route('admin.contact.reply') }}",
            type: "POST",
            data: {id: id},
            success: function(res) {
                res = $.trim(res);
                if (res === 'OK') {
                    window.location.reload(true);
                } else {
                    alert('Có lỗi xảy ra');
                }
            }
        });
    }
</script>
@endsection
