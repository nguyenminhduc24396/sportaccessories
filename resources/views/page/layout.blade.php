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
                                <a class="login" href="{{ route('login') }}">@lang('layout.login')</a>
                            </li>
                            <li>
                                @if (Route::has('register'))
                                    <a class="register" href="{{ route('register') }}">@lang('layout.register')</a>
                                @endif
                            </li>
                        @else
                            <li class="dropdown">
                                <a id="navbarDropdown" class="account dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}</a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a title="My Account" href="{{ route('info') }}">@lang('layout.myaccount')</a></li>
                                    <li><a title="My Cart" href="{{ route('cart') }}">@lang('layout.cart')</a></li>
                                    <li><a title="Checkout" href="{{ route('order') }}">@lang('layout.order')</a></li>
                                    @if(Auth::user()->role < 1)
                                    <li><a href="{{ route('admin.dashboard') }}">@lang('layout.dashboard')</a></li>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('layout.logout')
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
                                    <li><a href="{{ route('language', ['lang' => 'vi']) }}"><img src="{{ URL::to('/').'/images/flag-vn.png' }}" width="16px" height="11px" alt=""> &nbsp;Tiếng Việt</a></li>
                                    <li><a href="{{ route('language', ['lang' => 'en']) }}"><img src="{{ URL::to('/').'/images/flag-us.png' }}" width="16px" height="11px" alt=""> &nbsp;English</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
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
                                                <h4><b>@lang('layout.worktime1')</b></h4>
                                                <p>@lang('layout.worktime2')</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="box-container free-shipping">
                                            <div class="box-inner">
                                                <h4><b>@lang('layout.freeship1')</b></h4>
                                                <p>@lang('layout.freeship2')</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="box-container money-back">
                                            <div class="box-inner">
                                                <h4><b>@lang('layout.moneyback1')</b></h4>
                                                <p>@lang('layout.moneyback2')</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="form-search" action="{{ route('search') }}">
                                @csrf
                                <input type="text" class="input-text" name="q" id="search" style="width: 550px" placeholder="@lang('layout.search')">
                                <button type="submit" class="btn btn-danger"><span class="fa fa-search"></span></button>
                            </form>
                            <div class="mini-cart">
                                <div class="top-cart-title">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">@lang('layout.cart') ({{ \Cart::getContent()->count() }})
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
                                                        <div class="mini-cart-qty">@lang('layout.qty'): {{ $val->quantity }}</div>
                                                        <div class="mini-cart-price">{{ number_format($val->price) }} VNĐ</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @endif
                                            <div class="mini-cart-subtotal">@lang('layout.total'): <span class="price">{{ number_format(\Cart::getSubTotal()) }} VNĐ</span></div>
                                            <div class="checkout-btn">
                                                <a href="{{ route('cart') }}" class="btn btn-default btn-md fwb">@lang('layout.showcart')</a>
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
                                    <div class="mega-menu-title"><h3>@lang('layout.category')</h3></div>
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
                                <li class="active"><a href="#">@lang('layout.home')</a></li>
                                <li><a href="{{ route('post') }}">@lang('layout.post')</a></li>
                                <li><a href="{{ route('contact') }}">@lang('layout.contact')</a></li>
                                <li><a href="{{ route('about') }}">@lang('layout.about')</a></li>
                                <li><a href="{{ route('question') }}">@lang('layout.question')</a></li>
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
                                    <h3>@lang('layout.noti')</h3>
                                    @lang('layout.receive')
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-8">
                            <form method="post" class="form-inline form-subscribe">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="newsletter" name="email">
                                </div>
                                <button class="btn btn-danger" title="Subscribe" type="submit">@lang('layout.register')</button>
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
                </div>
                <div class="footer-middle">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="footer-title">
                                <h2>@lang('layout.contactus')</h2>
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
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="footer-title">
                                <h2>@lang('layout.myaccount')</h2>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li><a href="#">@lang('layout.policy')</a></li>
                                    <li><a href="#">@lang('layout.youraccount')</a></li>
                                    <li><a href="#">@lang('layout.contact')</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="footer-title">
                                <h2>@lang('layout.payment')</h2>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li><a href="#">@lang('layout.policy')</a></li>
                                    <li><a href="#">@lang('layout.method')</a></li>
                                    <li><a href="#">@lang('layout.guide')</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="footer-title">
                                <h2>@lang('layout.customer')</h2>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li><a href="#">@lang('layout.shipping')</a></li>
                                    <li><a href="#">@lang('layout.return')</a></li>
                                    <li><a href="#">@lang('layout.contactus')</a></li>
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
