@extends('page.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="active">Về chúng tôi</li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blog-detail blog-list">
                        <div class="item">
                            <div class="item-inner">
                                <div class="block">
                                    <div class="block-title">
                                        <strong><span>Thông tin Shop</span></strong>
                                    </div>
                                    <div class="desc">Sports Accessories Shop - Chuyên bán buôn, bán lẻ đồ tập, phụ kiện, quần áo thể thao nam nữ. Chúng tôi hân hạnh mang đến cho quý khách những sản phẩm chất lượng với giá cả phù hợp và dịch vụ uy tín. Tất cả các sản phẩm của Sports Accessories Shop đều được chúng tôi tuyển chọn một cách kỹ lưỡng sao cho phù hợp với phong cách Châu Á và bắt nhịp cùng xu hướng đồ tập thế giới. Đến với chúng tôi khách hàng có thể yên tâm mua hàng với nhiều mẫu mã được cập nhật thường xuyên và nhiều khuyến mại hấp dẫn.
                                    </div>
                                </div>
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
                                <div class="share-post">
                                    <span class="share-label">Chia sẻ trang web này</span>
                                    <ul>
                                        <li class="color-facebook"><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                                        <li class="color-twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
                                        <li class="color-pinterest"><a href="#"><span class="fa fa-pinterest"></span></a></li>
                                        <li class="color-gplus"><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                        <li class="color-linkedin"><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
