@extends('page.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">@lang('layout.home')</a></li>
                <li class="active">@lang('layout.category')</li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-left">
                    <div class="block block-layered-nav">
                        <div class="block-content">
                            <p class="block-subtitle">Shopping Options</p>
                            <div id="narrow-by-list">
                                <div class="layered layered-Category">
                                    <h2>@lang('layout.category')</h2>
                                    <div class="content-shopby">
                                        <ol>
                                            @foreach($categories as $key => $val)
                                            <li>
                                                <a href="{{ route('categories',['id'=>$val->id]) }}">{{ $val->name_cat }}</a>
                                            </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 col-right">
                    <div class="row products">
                        @foreach($listPd as $key => $val)
                        <div class="col-md-3 col-sm-6">
                            @if($val->sale == null)
                            <div class='productslider-item item'>
                                    <div class="item-inner">
                                        <div class="images-container">
                                            <div class="product_icon">
                                                <div class='new-icon'><span>new</span></div>
                                            </div>
                                            <a href="{{ route('detail', ['id' => $val->id]) }}" class="product-image">
                                                <img height="200" src="{{ URL::to('/').'/uploads/images/'.$val->image }}" alt="Nunc facilisis"/>
                                            </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a href="{{ route('detail', ['id' => $val->id]) }}" class="link-quickview">@lang('layout.detail')</a></li>
                                                    <li><a href="{{ route('cart.add', ['id' => $val->id]) }}" class="link-cart">@lang('layout.add')</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="des-container">
                                            <h2 class="product-name"><a href="{{ route('detail', ['id' => $val->id]) }}">{{ $val->namepd }}</a></h2>
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
                                        </div>
                                    </div>
                                </div>
                            @elseif($val->sale != null)
                            <div class='productslider-item item'>
                                    <div class="item-inner">
                                        <div class="images-container">
                                            <div class="product_icon">
                                                <div class='new-icon'><span>new</span></div>
                                                <div class="sale-icon"><span>sale</span></div>
                                            </div>
                                            <a href="{{ route('detail', ['id' => $val->id]) }}" class="product-image">
                                                <img height="200" src="{{ URL::to('/').'/uploads/images/'.$val->image }}" alt="Nunc facilisis"/>
                                            </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a href="{{ route('detail', ['id' => $val->id]) }}" class="link-quickview">@lang('layout.detail')</a></li>
                                                    <li><a href="{{ route('cart.add', ['id' => $val->id]) }}" class="link-cart">@lang('layout.add')</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="des-container">
                                            <h2 class="product-name"><a href="{{ route('detail', ['id' => $val->id]) }}">{{ $val->namepd }}</a></h2>
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
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    {{ $listPd->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
