@extends('page.layout')

@section('content')
    <div class="container">
        <div class="main">
            <div class="row">
                <div class="col-md-9 col-md-offset-3">
                        <div class="flexslider ma-nivoslider">
                        <div class="ma-loading"></div>
                        <div id="ma-inivoslider-banner7" class="slides">
                            <img src="images/slider/slide-01.jpg" class="dn" alt="" title="#banner7-caption1"/>
                            <img src="images/slider/slide-02.jpg" class="dn" alt="" title="#banner7-caption2"/>
                            <img src="images/slider/slide-03.jpg" class="dn" alt="" title="#banner7-caption3"/>
                            <img src="images/slider/slide-04.jpg" class="dn" alt="" title="#banner7-caption4"/>
                            <img src="images/slider/slide-05.jpg" class="dn" alt="" title="#banner7-caption5"/>
                        </div>
                        <div id="banner7-caption1" class="banner7-caption nivo-html-caption nivo-caption">
                            <div class="timethai"></div>
                            <div class="banner7-content slider-1">
                                <div class="banner7-des">
                                    <div class="des">
                                        <h1>sale up to!</h1>
                                        <h2>50% off</h2>
                                        <div class="check-box">
                                            <ul class="list-unstyled">
                                                <li>With all products in shop</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="banner7-caption2" class="banner7-caption nivo-html-caption nivo-caption">
                                <div class="timethai"></div>
                            <div class="banner7-content slider-2">
                            </div>
                        </div>
                    </div><!-- /.flexslider -->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 col-left">
                    <div class="block">
                            <!-- ĐỂ GOOGLE MAP Ở ĐÂY -->
                        <div class="owl" style="margin-top: 5px;">
                            <div class="title-group"><h2>Bản đồ</h2></div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d931.1124732925513!2d105.8571619!3d21.0146773!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abf3cfd6e17b%3A0xb07803945e3732fe!2zTmd1eeG7hW4gVHJ1bmcgTmfhuqFuLCBQaOG6oW0gxJDDrG5oIEjhu5MsIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1534069022237" width="270" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="block">
                            <!-- ĐỂ Fanpage Ở ĐÂY -->
                        <div class="owl" style="margin-top: 5px;">
                            <div class="title-group"><h2>Fanpage</h2></div>
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fthatshoweplay&tabs=timeline&width=270&height=750&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true&appId" width="270" height="750" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                        </div>
                    </div>
                </div><!-- /.col-left -->
                <div class="col-sm-9 col-right">
                    <div class="featuredproductslider-container"> 
                        <div class="title-group1"><h2>Sản phẩm mới</h2></div>
                        <div id="featured-products" class="owl-container">
                            <div class="owl">
                                @foreach($new as $key => $val)
                                <div class='productslider-item item'>
                                    <div class="item-inner">
                                        <div class="images-container">
                                            <div class="product_icon">
                                                <div class='new-icon'><span>new</span></div>
                                            </div>
                                            <a href="#" title="Nunc facilisis" class="product-image">
                                                <img height="200" src="{{ URL::to('/').'/uploads/images/'.$val->image }}" alt="Nunc facilisis"/>
                                            </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a href="{{ route('detail', ['id' => $val->id]) }}" class="link-quickview">Xem chi tiết</a></li>
                                                    <li><a href="{{ route('cart.add', ['id' => $val->id]) }}" class="link-cart">Thêm vào giỏ</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="des-container">
                                            <h2 class="product-name"><a href="#" title="Nunc facilisis">{{ $val->namepd }}</a></h2>
                                            <div class="price-box">
                                                <p class="special-price">
                                                    <span class="price-label">Special Price</span>
                                                    <span class="price">{{ number_format($val->price) }} VNĐ</span>
                                                </p>
                                                <p class="old-price">
                                                	<span class="price-label">Regular Price: </span>
                                                    <span class="price"></span>
                                                </p>
                                            </div>
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:67%"></div>
                                                </div>
                                                <span class="amount"><a href="#">3 Review(s)</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="newproductslider-container"> 
                        <div class="title-group1"><h2>Đang giảm giá</h2></div>
                        <div id="new-products" class="owl-container">
                            <div class="owl">
                                @foreach($sale as $key => $val)
                                <div class='productslider-item item'>
                                    <div class="item-inner">
                                        <div class="images-container">
                                            <div class="product_icon">
                                                <div class='new-icon'><span>new</span></div>
                                                <div class="sale-icon"><span>sale</span></div>
                                            </div>
                                            <a href="#" title="Nunc facilisis" class="product-image">
                                                <img height="200" src="{{ URL::to('/').'/uploads/images/'.$val->image }}" alt="Nunc facilisis"/>
                                            </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a href="{{ route('detail', ['id' => $val->id]) }}" class="link-quickview">Xem chi tiết</a></li>
                                                    <li><a href="{{ route('cart.add', ['id' => $val->id]) }}" class="link-cart">Thêm vào giỏ</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="des-container">
                                            <h2 class="product-name"><a href="#" title="Nunc facilisis">{{ $val->namepd }}</a></h2>
                                            <div class="price-box">
                                                <p class="special-price">
                                                    <span class="price-label">Special Price</span>
                                                    <span class="price">{{ number_format($val->sale) }} VNĐ</span>
                                                </p>
                                                <p class="old-price">
                                                	<span class="price-label">Regular Price: </span>
                                                    <span class="price">{{ number_format($val->price) }} VNĐ</span>
                                                </p>
                                            </div>
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:67%"></div>
                                                </div>
                                                <span class="amount"><a href="#">3 Review(s)</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        	</div>
                    	</div>
                    </div>
                    <div class="catlist"> 
                        <div class="title-group1"><h2>Mua nhiều nhất</h2></div>
                        <div id="new-products" class="owl-container">
                            <div class="owl">
                                @foreach($best as $key => $val)
                                <div class='productslider-item item'>
                                    @if($val->sale != null)
                                    <div class="item-inner">
                                        <div class="images-container">
                                            <div class="product_icon">
                                                <div class='new-icon'><span>new</span></div>
                                                <div class="sale-icon"><span>sale</span></div>
                                            </div>
                                            <a href="#" title="Nunc facilisis" class="product-image">
                                                <img height="200" src="{{ URL::to('/').'/uploads/images/'.$val->image }}" alt="Nunc facilisis"/>
                                            </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a href="{{ route('detail', ['id' => $val->id]) }}" class="link-quickview">Xem chi tiết</a></li>
                                                    <li><a href="{{ route('cart.add', ['id' => $val->id]) }}" class="link-cart">Thêm vào giỏ</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="des-container">
                                            <h2 class="product-name"><a href="#" title="Nunc facilisis">{{ $val->namepd }}</a></h2>
                                            <div class="price-box">
                                                <p class="special-price">
                                                    <span class="price-label">Special Price</span>
                                                    <span class="price">{{ number_format($val->sale) }} VNĐ</span>
                                                </p>
                                                <p class="old-price">
                                                    <span class="price-label">Regular Price: </span>
                                                    <span class="price">{{ number_format($val->price) }} VNĐ</span>
                                                </p>
                                            </div>
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:67%"></div>
                                                </div>
                                                <span class="amount"><a href="#">3 Review(s)</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($val->sale == null)
                                    <div class="item-inner">
                                        <div class="images-container">
                                            <div class="product_icon">
                                                <div class='new-icon'><span>new</span></div>
                                            </div>
                                            <a href="#" title="Nunc facilisis" class="product-image">
                                                <img height="200" src="{{ URL::to('/').'/uploads/images/'.$val->image }}" alt="Nunc facilisis"/>
                                            </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a href="{{ route('detail', ['id' => $val->id]) }}" class="link-quickview">Xem chi tiết</a></li>
                                                    <li><a href="{{ route('cart.add', ['id' => $val->id]) }}" class="link-cart">Thêm vào giỏ</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="des-container">
                                            <h2 class="product-name"><a href="#" title="Nunc facilisis">{{ $val->namepd }}</a></h2>
                                            <div class="price-box">
                                                <p class="special-price">
                                                    <span class="price-label">Special Price</span>
                                                    <span class="price">{{ number_format($val->price) }} VNĐ</span>
                                                </p>
                                                <p class="old-price">
                                                    <span class="price-label">Regular Price: </span>
                                                    <span class="price"></span>
                                                </p>
                                            </div>
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:67%"></div>
                                                </div>
                                                <span class="amount"><a href="#">3 Review(s)</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-right -->
            </div>
        </div><!-- /.main -->
    
        <div class="brands">
            <div class="title-group1">
                <h2>Thương hiệu</h2>
            </div>
            <div id="brands" class="owl-container">
                <div class="owl">
                    <div class='item'>
                        <div class="item-innner">
                            <a href="#" title=""><img width="200" height="90" src="images/brand/addidas.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class='item'>
                        <div class="item-innner">
                            <a href="#" title=""><img width="200" height="90" src="images/brand/nike.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class='item'>
                        <div class="item-innner">
                            <a href="#" title=""><img width="200" height="90" src="images/brand/fila.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class='item'>
                        <div class="item-innner">
                            <a href="#" title=""><img width="200" height="90" src="images/brand/puma.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class='item'>
                        <div class="item-innner">
                            <a href="#" title=""><img width="200" height="90" src="images/brand/NB.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class='item'>
                        <div class="item-innner">
                            <a href="#" title=""><img width="200" height="90" src="images/brand/hi-tec.jpg" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div><!-- /#brands -->
        </div><!-- /.brands -->
    </div>
<script type="text/javascript" charset="utf-8">
    document.getElementById("menu-layout").style.display = "contents";
</script>
@endsection
