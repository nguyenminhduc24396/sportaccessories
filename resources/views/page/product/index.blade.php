@extends('page.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">@lang('layout.home')</a></li>
                <li>@lang('layout.category')</li>
                <li class="active">@lang('layout.product')</li>
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
                                <p class="availability in-stock">@lang('layout.status'): <span>@lang('layout.available')</span></p>
                                @if ($info->status == 1 && $info->qty > 0)
                                <a href="{{ route('cart.add', ['id' => $info->id]) }}" class="btn btn-danger btn-cart">@lang('layout.add')</a>
                                @endif
                            </div>
                        </div>
                        <div class="product-tab tab-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#product-review" data-toggle="tab">Phản hồi của khách hàng</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="product-review">...</div>
                                <div class="title-group3">
                            <h3>Comments (3)</h3>
                        </div>
                        <div class="comment-list">
                            <div class="comment-item">
                                <div class="media">
                                    <div class="media-body">
                                        <div class="comment-date">12.5/2104</div>
                                        <div class="comment-title">Section 1.10.33 of "de Finibus Bonorum et Malorum"</div>
                                        Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. 
                                    </div>
                                </div>
                                <div class="comment-reply">
                                    <div class="media">
                                        <div class="media-body">
                                            <div class="comment-date">12.5/2104</div>
                                            <div class="comment-title">1914 translation by H. Rackham</div>
                                            Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. 
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.commnent-item -->
                            <div class="comment-item">
                                <div class="media">
                                    <div class="media-body">
                                        <div class="comment-date">12.5/2104</div>
                                        <div class="comment-title">Section 1.10.33 of "de Finibus Bonorum et Malorum"</div>
                                        Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="title-group3">
                            <h3>Leave a reply</h3>
                        </div>
                        <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control input-md" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control input-md" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control input-md" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your comment" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default btn-lg">SUBMIT COMMENT</button>
                        </form>
                        <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-left">
                    <div class="block">
                        <div class="title-group"><h2>@lang('other')</h2></div>
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
