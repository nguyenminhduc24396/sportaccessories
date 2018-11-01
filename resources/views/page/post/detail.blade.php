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
                    <div class="blog-detail blog-list">
                        <div class="blog-image"><img src="{{ URL::to('/').'/uploads/images/'.$infoPost->thumbnail }}" class="img-responsive" alt=""></div>
                        <div class="item">
                            <div class="item-inner">
                                <h2 class="product-name">{{ $infoPost->title }}</h2>
                                <div class="ratings">
                                    <span class="amount"><a href="#">1 Review(s)</a></span>
                                    <span class="separator">|</span>
                                    <span class="comment-amount"><a href="#">4 comment</a></span>
                                </div>
                                <div class="blog-attr">
                                    <span>Đăng bởi {{ $infoPost->user->name }}</span>
                                    <span class="separator">|</span>
                                    <span>{{ \Carbon\Carbon::parse($infoPost->created_at)->format('H:i:s d-m-Y') }}</span>
                                </div>
                                <div class="desc">
                                    {!! $infoPost->description !!}
                                </div>
                                <div class="share-post">
                                    <span class="share-label">Chia sẻ bài viết này</span>
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
    </div>
@endsection