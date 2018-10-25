@extends('page.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li>Danh mục</li>
                <li class="active">Chi tiết sản phẩm</li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-right">
                    <div class="product-view">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="product-img-box">
                                    <p class="product-image">
                                        <img src="{{ URL::to('/').'/uploads/images/'.$info->image }}"/>
                                    </p>
                                </div>
                            </div>
                            <div class="product-shop col-sm-7">
                                <div class="product-name">
                                    <h1>{{ $info->namepd }}</h1>
                                </div>
                                <div class="ratings">
                                    <div class="rating-box">
                                        <div style="width:67%" class="rating"></div>
                                    </div>
                                    <span class="amount"><a href="#">1 Review(s)</a></span>
                                </div>
                                <div class="box-container2"> 
                                    <div class="price-box">
                                        <p class="special-price">
                                            <span class="price-label">Special Price</span>
                                        <span id="product-price-1" class="price">{{ number_format(($info->sale != null) ? $info->sale : $info->price) }} VNĐ</span>
                                        </p>
                                        <p class="old-price">
                                            <span class="price-label">Regular Price:</span>
                                            <span id="old-price-1" class="price">{{ ($info->sale != null) ? number_format($info->price).' VNĐ' : '' }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="short-description">
                                    <div class="std">{{ $info->description }}</div>
                                </div>
                                <p class="availability in-stock">Tình trạng: <span>{{ ($info->status == 1 && $info->qty > 0) ? 'Còn hàng' : 'Tạm hết hàng' }}</span></p>
                                @if ($info->status == 1 && $info->qty > 0)
                                <a href="{{ route('cart.add', ['id' => $info->id]) }}" class="btn btn-danger btn-cart">Thêm vào giỏ</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-left">
                    <div class="block">
                        <div class="title-group"><h2>Liên quan</h2></div>
                        <div id="special-offer" class="owl-container">
                            <div class="owl">
                                <div class='sepecialoffer-item item'>
                                    @foreach($other1 as $key => $val)
                                    <div class="item-inner first">
                                        <div class="images-container">
                                            <a href="{{ route('detail',['id' => $val->id]) }}" title="Primis in faucibus" class="product-image">
                                                <img height="80" src="{{ URL::to('/').'/uploads/images/'.$val->image }}" alt="Primis in faucibus" />
                                            </a>
                                        </div>
                                        <div class="des-container">
                                            <h2 class="product-name"><a href="#" title="Primis in faucibus">{{ $val->namepd }}</a></h2>
                                            <div class="price-box">
                                                <p class="special-price">
                                                    @if($val->sale == null)
                                                    <span class="price">{{ number_format($val->price) }} VNĐ</span>
                                                    @else
                                                    <span class="price">{{ number_format($val->sale) }} VNĐ</span>
                                                    @endif
                                                </p>
                                                <p class="old-price">
                                                    @if($val->sale == null)
                                                    <span class="price"></span>
                                                    @else
                                                    <span class="price">{{ number_format($val->price) }} VNĐ</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class='sepecialoffer-item item'>
                                    @foreach($other2 as $key => $val)
                                    <div class="item-inner first">
                                        <div class="images-container">
                                            <a href="{{ route('detail',['id' => $val->id]) }}" title="Primis in faucibus" class="product-image">
                                                <img height="80" src="{{ URL::to('/').'/uploads/images/'.$val->image }}" alt="Primis in faucibus" />
                                            </a>
                                        </div>
                                        <div class="des-container">
                                            <h2 class="product-name"><a href="#" title="Primis in faucibus">{{ $val->namepd }}</a></h2>
                                            <div class="price-box">
                                                <p class="special-price">
                                                    @if($val->sale == null)
                                                    <span class="price">{{ number_format($val->price) }} VNĐ</span>
                                                    @else
                                                    <span class="price">{{ number_format($val->sale) }} VNĐ</span>
                                                    @endif
                                                </p>
                                                <p class="old-price">
                                                    @if($val->sale == null)
                                                    <span class="price"></span>
                                                    @else
                                                    <span class="price">{{ number_format($val->price) }} VNĐ</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
