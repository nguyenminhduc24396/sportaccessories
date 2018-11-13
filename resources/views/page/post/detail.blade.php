@extends('page.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">@lang('layout.home')</a></li>
                <li class="active">@lang('layout.post')</li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blog-detail blog-list">
                        <div class="blog-image"><img src="{{ URL::to('/').'/uploads/images/'.$infoPost->thumbnail }}" class="img-responsive" alt=""></div>
                        <div class="item">
                            <div class="item-inner">
                                <h2 class="product-name">{{ $infoPost->title }}</h2>
                                <div class="blog-attr">
                                    <span>@lang('layout.postby') {{ $infoPost->user->name }}</span>
                                    <span class="separator">|</span>
                                    <span>{{ \Carbon\Carbon::parse($infoPost->created_at)->format('H:i:s d-m-Y') }}</span>
                                </div>
                                <div class="desc">
                                    {!! $infoPost->description !!}
                                </div>
                                <div class="share-post">
                                    <span class="share-label">@lang('layout.sharepost')</span>
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
                        <div class="comment-list">
                            <div class="comment-item">
                                <div class="media">
                                    <div class="media-body">
                                        <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="10" data-width="1170"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=289973708510931&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@endsection