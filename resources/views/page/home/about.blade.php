@extends('page.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">@lang('layout.home')</a></li>
                <li class="active">@lang('layout.about')</li>
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
                                        <strong><span>@lang('layout.shopinfo')</span></strong>
                                    </div>
                                    <div class="desc">@lang('layout.des')</div>
                                </div>
                                <div class="block">
                                    <div class="block-title">
                                        <strong><span>@lang('layout.contactinfo')</span></strong>
                                    </div>
                                    <div class="block-content">
                                        <div class="email add">
                                            <p>nguyenminhduc24396@gmail.com</p>
                                        </div>
                                        <div class="phone add">
                                            <p>082 776 8889</p>
                                        </div>
                                        <div class="address add">@lang('checkout.address1'): 
                                            <p>16 Nguyễn Trung Ngạn - Hai Bà Trưng - Hà Nội</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="share-post">
                                    <span class="share-label">@lang('layout.share')</span>
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
