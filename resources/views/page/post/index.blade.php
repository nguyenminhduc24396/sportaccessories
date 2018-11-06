@extends('page.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="active">Bài viết</li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol id="products-list" class="blog-list">
                        @foreach($infoPost as $key => $val)
                        <li class="item">
                            <div class="item-inner">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="images-container">
                                            <a class="product-image" href="{{ route('post.detail',['slug' => $val->slug, 'id' => $val->id]) }}" rel="author"><img src="{{ URL::to('/').'/uploads/images/'.$val->thumbnail }}"></a>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <h2 class="product-name"><a title="" href="{{ route('post.detail',['slug' => $val->slug, 'id' => $val->id]) }}">{{ $val->title }}</a></h2>
                                        <div class="ratings">
                                            <span class="amount"><a href="#">1 Review(s)</a></span>
                                            <span class="separator">|</span>
                                            <span class="comment-amount"><a href="#">4 comment</a></span>
                                        </div>
                                        <div class="blog-attr">
                                            <span>Đăng bởi {{ $val->user->name }}</span>
                                            <span class="separator">|</span>
                                            <span>{{ \Carbon\Carbon::parse($val->created_at)->format('H:i:s d-m-Y') }}</span>
                                        </div>
                                        <div class="desc">{!! $title[$key] !!} ...</div>
                                        <a href="{{ route('post.detail',['slug' => $val->slug, 
                                        'id' => $val->id]) }}" class="btn btn-default btn-readmore">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
