<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sports Accessories</title>
    <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipiscing elit.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Nguyễn Minh Đức">
    <link rel="shortcut icon" href="{{ asset('images/favicon.jpg') }}">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800" rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Oswald" rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,700" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page/nivo-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page/style-boxed.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page/mystyle.css') }}" rel="stylesheet">
    <script src="{{ asset('js/page/jquery-1.11.3.min.js') }}"></script>
</head>
<body>
    <div class="header">
            <div class="container">
                <div class="topbar">
                    <div class="topbar-left">
                        <ul class="topbar-nav clearfix">
                            <li><span class="phone">082 776 8889</span></li>
                            <li><span class="email">nguyenminhduc24396@gmail.com</span></li>
                        </ul>
                    </div>
                    <div class="topbar-right">
                        <ul class="topbar-nav clearfix">
                        @guest
                            <li>
                                <a class="login" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                            </li>
                            <li>
                                @if (Route::has('register'))
                                    <a class="register" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="dropdown">
                                <a id="navbarDropdown" class="account dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}</a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a title="My Account" href="{{ route('info') }}">Tài khoản</a></li>
                                    <li><a title="My Cart" href="{{ route('cart') }}">Giỏ hàng</a></li>
                                    <li><a title="Checkout" href="{{ route('order') }}">Lịch sử mua hàng</a></li>
                                    @if(Auth::user()->role < 1)
                                    <li><a href="{{ route('admin.dashboard') }}">Bảng quản lý</a></li>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Đăng xuất') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        </form>
                                    </li>
                                </ul>
                                
                            </li>
                        @endguest
                            <li class="dropdown">
                                <a href="#" class="language dropdown-toggle" data-toggle="dropdown"><img src="{{ URL::to('/').'/images/flag-vn.png' }}" width="16px" height="11px" alt="">Tiếng Việt</a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><img src="{{ URL::to('/').'/images/flag-vn.png' }}" width="16px" height="11px" alt=""> &nbsp;Tiếng Việt</a></li>
                                    <li><a href="#"><img src="{{ URL::to('/').'/images/flag-us.png' }}" width="16px" height="11px" alt=""> &nbsp;English</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.topbar -->
                <div class="header-bottom">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ route('home') }}" class="logo"><img width="265" height="120" src="{{ URL::to('/').'/images/logo.jpg' }}"></a>
                        </div>
                        <div class="col-md-9">
                            <div class="support-client">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="box-container time">
                                            <div class="box-inner">
                                                <h4><b>Giờ mở cửa</b></h4>
                                                <p>Thứ 2 - Chủ nhật: 8:00 - 22:00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="box-container free-shipping">
                                            <div class="box-inner">
                                                <h4><b>Giao hàng miễn phí</b></h4>
                                                <p>Với hóa đơn trên 1.000.000 VNĐ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="box-container money-back">
                                            <div class="box-inner">
                                                <h4><b>Hoàn trả 100%</b></h4>
                                                <p>Trong 30 ngày sau khi giao hàng</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="form-search">
                                <input type="text" class="input-text" name="q" id="search" style="width: 550px" placeholder="Tìm kiếm sản phẩm ...">
                                <button type="submit" class="btn btn-danger"><span class="fa fa-search"></span></button>
                            </form>
                            <div class="mini-cart">
                                <div class="top-cart-title">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">Giỏ hàng ({{ \Cart::getContent()->count() }})
                                        <span class="price">{{ number_format(\Cart::getSubTotal()) }}</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="cart-listing">
                                            @if(!\Cart::isEmpty())
                                            @foreach($cart as $key => $val)
                                                <div class="media">
                                                    <div class="media-left"><a href="#"><img src="{{ URL::to('/').'/uploads/images/'.$val->attributes->image }}" class="img-responsive" alt=""></a></div>
                                                    <div class="media-body">
                                                        <a class="remove-cart-item" href="{{ route('cart.remove',['id'=>$val->id]) }}">&times;</a>
                                                        <h4>{{ $val->name }}</h4>
                                                        <div class="mini-cart-qty">Số lượng: {{ $val->quantity }}</div>
                                                        <div class="mini-cart-price">{{ number_format($val->price) }} VNĐ</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @endif
                                            <div class="mini-cart-subtotal">Tổng: <span class="price">{{ number_format(\Cart::getSubTotal()) }} VNĐ</span></div>
                                            <div class="checkout-btn">
                                                <a href="{{ route('cart') }}" class="btn btn-default btn-md fwb">Xem giỏ hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mega-container visible-lg visible-md">
                                <div class="navleft-container">
                                    <div class="mega-menu-title"><h3>Danh mục</h3></div>
                                    <div class="mega-menu-category" style="display: none;" id="menu-layout">
                                        <ul class="nav">
                                            @foreach($categories as $key => $val)
                                            <li class="nosub">
                                                <a href="{{ route('categories',['id'=>$val->id]) }}">{{ $val->name_cat }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <ul class="menu clearfix visible-lg visible-md">
                                <li class="active"><a href="#">Trang chủ</a></li>
                                <li><a href="{{ route('post') }}">Bài viết</a></li>
                                <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                                <li><a href="{{ route('about') }}">Về chúng tôi</a></li>
                                <li><a href="{{ route('question') }}">Câu hỏi thường gặp</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        <div class="footer">
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-md-5 col-sm-4 hidden-sm hidden-xs">
                            <div class="subscribe">
                                <div class="subscribe-inner">
                                    <h3>Đăng ký nhận thông báo</h3>
                                    Luôn nhận được thông báo khi có sản phẩm mới
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-8">
                            <form method="post" class="form-inline form-subscribe">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="newsletter" name="email">
                                </div>
                                <button class="btn btn-danger" title="Subscribe" type="submit">Đăng ký</button>
                            </form>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <ul class="social">
                                <li><a href="#" class="face">face</a></li>
                                <li><a href="#" class="google">google</a></li>
                                <li><a href="#" class="twitter">twitter</a></li>
                                <li><a href="#" class="youtube">youtube</a></li>
                                <li><a href="#" class="linkedin">linkedin</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.footer-top -->
                <div class="footer-middle">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="footer-title">
                                <h2>Liên hệ với chúng tôi</h2>
                            </div>
                            <div class="footer-content">
                                <div class="email add">
                                    <p>nguyenminhduc24396@gmail.com</p>
                                </div>
                                <div class="phone add">
                                    <p>082 776 8889</p>
                                </div>
                                <div class="address add">Địa chỉ: 
                                    <p>16 Nguyễn Trung Ngạn - Hai Bà Trưng - Hà Nội</p>
                                </div>
                                <div class="contact-link"><a href="https://www.google.com/maps/place/Nguy%E1%BB%85n+Trung+Ng%E1%BA%A1n,+Ph%E1%BA%A1m+%C4%90%C3%ACnh+H%E1%BB%93,+Hai+B%C3%A0+Tr%C6%B0ng,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam/@21.014671,105.8570222,18.35z/data=!4m5!3m4!1s0x3135abf3cfd6e17b:0xb07803945e3732fe!8m2!3d21.014676!4d105.8577091" class="btn btn-default">Mở trong Google Maps</a></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="footer-title">
                                <h2>Tài khoản của tôi</h2>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li><a href="#">Chính sách bảo mật</a></li>
                                    <li><a href="#">Thông tin tài khoản</a></li>
                                    <li><a href="#">Liên hệ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="footer-title">
                                <h2>Thanh toán &amp; giao hàng</h2>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li><a href="#">Điều khoản sử dụng</a></li>
                                    <li><a href="#">Cách thức thanh toán</a></li>
                                    <li><a href="#">Hướng dẫn đặt hàng</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="footer-title">
                                <h2>Dịch vụ khách hàng</h2>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li><a href="#">Chính sách vận chuyển</a></li>
                                    <li><a href="#">Chính sách đổi trả</a></li>
                                    <li><a href="#">Liên hệ với chúng tôi</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="copy">Copyright &copy; 2015 Plazathemes. All Rights Reserved</div>
                        </div>
                        <div class="col-sm-4">
                            <div class="payment"><img src="{{ URL::to('/').'/images/payment.png' }}" alt="" class="img-responsive"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="fb-root"></div>
        <div id="cfacebook">
            <a href="javascript:;" class="chat_fb" onclick="return:false;"><i class="fa fa-facebook-square"></i> Sports Accessories Shop</a>
            <div class="fchat">
                <div class="fb-page" data-tabs="messages" data-href="https://www.facebook.com/Sports-Accessories-Shop-2499964193564464/?modal=admin_todo_tour" data-width="300" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
            </div>
        </div>

        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) 
                    return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
                fjs.parentNode.insertBefore(js, fjs);
            }
            (document, 'script', 'facebook-jssdk'));
        </script>
        <script>
            jQuery(document).ready(function () {
                jQuery(".chat_fb").click(function() {
                jQuery('.fchat').toggle('slow');
                });
            });
        </script>
        <script src="{{ asset('js/page/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/page/jquery.nivo.slider.pack.js') }}"></script>
        <script src="{{ asset('js/page/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/page/countdown.js') }}"></script>
        <script src="{{ asset('js/page/custom.js') }}"></script>
        <script type="text/javascript">
            /* Main Slideshow */
            jQuery(window).load(function() {
                jQuery(document).off('mouseenter').on('mouseenter', '.pos-slideshow', function(e){
                    $('.ma-banner7-container .timethai').addClass('pos_hover');
                });
                jQuery(document).off('mouseleave').on('mouseleave', '.pos-slideshow', function(e){
                    $('.ma-banner7-container .timethai').removeClass('pos_hover');
                });
            });
            jQuery(window).load(function() {
                $('#ma-inivoslider-banner7').nivoSlider({
                    effect: 'random',
                    slices: 15,
                    boxCols: 8,
                    boxRows: 4,
                    animSpeed: 1000,
                    pauseTime: 6000,
                    startSlide: 0,
                    controlNav: false,
                    controlNavThumbs: false,
                    pauseOnHover: true,
                    manualAdvance: false,
                    prevText: 'Prev',
                    nextText: 'Next',
                    afterLoad: function(){
                        $('.ma-loading').css("display","none");
                        $('.banner7-title, .banner7-des, .banner7-readmore').css("left","100px") ;
                        },     
                    beforeChange: function(){ 
                        $('.banner7-title, .banner7-des').css("left","-2000px" );
                        $('.banner7-readmore').css("left","-2000px"); 
                    }, 
                    afterChange: function(){ 
                        $('.banner7-title, .banner7-des, .banner7-readmore').css("left","0") 
                    }
                });
            });
        </script>
    </body>
</html>
