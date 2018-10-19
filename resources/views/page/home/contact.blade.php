@extends('page.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="active">Liên hệ</li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="page-title page-title-line">
                        <h2>Liên hệ</h2>
                    </div>
                    <p class="text-muted">Vui lòng điền đầy đủ thông tin dưới đây</p>
                    <form>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Tên khách hàng</label>
                                <input type="text" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input type="text" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control" rows="7" required="required"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default btn-lg">Gửi</button>
                    </form>
                    <br>
                </div>
                <div class="col-sm-3">
                    <div class="block">
                        <div class="block-title">
                            <strong><span>Thông tin liên hệ</span></strong>
                        </div>
                        <div class="block-content">
                            <div class="email add">
                                <p>nguyenminhduc24396@gmail.com</p>
                            </div>
                            <div class="phone add">
                                <p>082 776 8889</p>
                            </div>
                            <div class="address add">Address: 
                                <p>16 Nguyễn Trung Ngạn - Hai Bà Trưng - Hà Nội</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
