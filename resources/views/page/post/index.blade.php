@extends('page.layout')

@section('content')
<div class="main">
<div class="container">
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="active">Bài viết</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="block block-layered-nav">
                <div class="block-content">
                    <h2>Categories</h2>
                    <ol>
                        <li><a href="#">Clothing</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Bags</a></li>
                        <li><a href="#">Shoes</a></li>
                        <li><a href="#">HandBag</a></li>
                        <li><a href="#">Fashion</a></li>
                    </ol>
                </div>
            </div>
            <div class="block">
                <div class="title-group"><h2>Recent post</h2></div>
                <div id="recent-post" class="owl-container">
                    <div class="owl">
                        <div class='sepecialoffer-item item'>
                            <div class="item-inner first">
                                <div class="images-container">
                                    <a href="#" title="Demonstraverunt lectores" class="product-image">
                                        <img src="images/blog/blog-sm-01.jpg" alt="Demonstraverunt lectores" />
                                    </a>
                                </div>
                                <div class="des-container">
                                    <h2 class="product-name"><a href="#" title="Demonstraverunt lectores">Demonstraverunt lectores</a></h2>
                                </div>
                            </div>
                            <div class="item-inner">
                                <div class="images-container">
                                    <a href="#" title="Accumsan elit " class="product-image">
                                        <img src="images/blog/blog-sm-02.jpg" alt="Accumsan elit " />
                                    </a>
                                </div>
                                <div class="des-container">
                                    <h2 class="product-name"><a href="#" title="Accumsan elit ">Accumsan elit </a></h2>
                                </div>
                            </div>
                            <div class="item-inner">
                                <div class="images-container">
                                    <a href="#" title="Nunc facilisis" class="product-image">
                                        <img src="images/blog/blog-sm-03.jpg" alt="Nunc facilisis" />
                                    </a>
                                </div>
                                <div class="des-container">
                                    <h2 class="product-name"><a href="#" title="Nunc facilisis">Nunc facilisis</a></h2>
                                </div>
                            </div>
                            <div class="item-inner last">
                                <div class="images-container">
                                    <a href="#" title="Fusce aliquam" class="product-image">
                                        <img src="images/blog/blog-sm-04.jpg" alt="Fusce aliquam" />
                                    </a>
                                </div>
                                <div class="des-container">
                                    <h2 class="product-name"><a href="#" title="Fusce aliquam">Fusce aliquam</a></h2>
                                </div>
                            </div>
                        </div>
                        <div class='sepecialoffer-item item'>
                            <div class="item-inner first">
                                <div class="images-container">
                                    <a href="#" title="Demonstraverunt lectores" class="product-image">
                                        <img src="images/blog/blog-sm-01.jpg" alt="Demonstraverunt lectores" />
                                    </a>
                                </div>
                                <div class="des-container">
                                    <h2 class="product-name"><a href="#" title="Demonstraverunt lectores">Demonstraverunt lectores</a></h2>
                                </div>
                            </div>
                            <div class="item-inner">
                                <div class="images-container">
                                    <a href="#" title="Accumsan elit " class="product-image">
                                        <img src="images/blog/blog-sm-02.jpg" alt="Accumsan elit " />
                                    </a>
                                </div>
                                <div class="des-container">
                                    <h2 class="product-name"><a href="#" title="Accumsan elit ">Accumsan elit </a></h2>
                                </div>
                            </div>
                            <div class="item-inner">
                                <div class="images-container">
                                    <a href="#" title="Nunc facilisis" class="product-image">
                                        <img src="images/blog/blog-sm-03.jpg" alt="Nunc facilisis" />
                                    </a>
                                </div>
                                <div class="des-container">
                                    <h2 class="product-name"><a href="#" title="Nunc facilisis">Nunc facilisis</a></h2>
                                </div>
                            </div>
                            <div class="item-inner last">
                                <div class="images-container">
                                    <a href="#" title="Fusce aliquam" class="product-image">
                                        <img src="images/blog/blog-sm-04.jpg" alt="Fusce aliquam" />
                                    </a>
                                </div>
                                <div class="des-container">
                                    <h2 class="product-name"><a href="#" title="Fusce aliquam">Fusce aliquam</a></h2>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.owl-container -->
            </div><!-- /.block - Recent post -->
            <div class="block">
                <div class="title-group"><h2>Comments</h2></div>
                <div class="block-content">
                    <div class="comment-item">
                        <h4><a href="#">Natalia Assyrian</a></h4>
                        <div class="comment-date">13 / 6 /2014 </div>
                        <p>“  Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.   “</p>
                    </div>
                    <div class="comment-item">
                        <h4><a href="#">John</a></h4>
                        <div class="comment-date">13 / 6 /2014 </div>
                        <p>“  IEodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum   “</p>
                    </div>
                    <div class="comment-item">
                        <h4><a href="#">Thomas Hurt</a></h4>
                        <div class="comment-date">13 / 6 /2014 </div>
                        <p>“  Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus   “</p>
                    </div>
                </div>
            </div>
            <div class="block">
                <div class="title-group"><h2>Tags</h2></div>
                <div class="block-content">
                    <ol class="tags">
                        <li><a href="#">Women</a></li>
                        <li><a href="#">Men</a></li>
                        <li class="active"><a href="#">Bags</a></li>
                        <li><a href="#">Suits</a></li>
                        <li><a href="#">Sweatshirts</a></li>
                        <li><a href="#">Shopping</a></li>
                        <li><a href="#">Hoodies</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <ol id="products-list" class="blog-list">
                <li class="item">
                    <div class="item-inner">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="images-container">
                                    <a class="product-image" title="Fusce aliquam" href="#" rel="author"><img alt="Fusce aliquam" src="images/blog/blog-03.jpg"></a>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <h2 class="product-name"><a title="" href="#">Fusce aliquam</a></h2>
                                <div class="ratings">
                                    <div class="rating-box">
                                        <div style="width:67%" class="rating"></div>
                                    </div>
                                    <span class="amount"><a href="#">1 Review(s)</a></span>
                                    <span class="separator">|</span>
                                    <span class="comment-amount"><a href="#">4 comment</a></span>
                                </div>
                                <div class="blog-attr">
                                    <span>Post by <a href="#">Admin</a></span>
                                    <span class="separator">|</span>
                                    <span>On February 09, 2015</span>
                                </div>
                                <div class="desc">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.
                                </div>
                                <a href="#" class="btn btn-default btn-readmore">Read more</a>
                            </div>
                        </div>
                    </div>
                </li>
                    {{-- <li class="item">
                        <div class="item-inner">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="images-container">
                                        <a class="product-image" title="Fusce aliquam" href="#" rel="author"><img alt="Fusce aliquam" src="images/blog/blog-04.jpg"></a>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <h2 class="product-name"><a title="" href="#">Fusce aliquam</a></h2>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div style="width:67%" class="rating"></div>
                                        </div>
                                        <span class="amount"><a href="#">1 Review(s)</a></span>
                                        <span class="separator">|</span>
                                        <span class="comment-amount"><a href="#">4 comment</a></span>
                                    </div>
                                    <div class="blog-attr">
                                    	<span>Post by <a href="#">Admin</a></span>
                                        <span class="separator">|</span>
                                        <span>On February 09, 2015</span>
                                    </div>
                                    <div class="desc">
                                       Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.
                                    </div>
                                    <a href="#" class="btn btn-default btn-readmore">Read more</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="item">
                        <div class="item-inner">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="images-container">
                                        <a class="product-image" title="Fusce aliquam" href="#" rel="author"><img alt="Fusce aliquam" src="images/blog/blog-05.jpg"></a>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <h2 class="product-name"><a title="" href="#">Fusce aliquam</a></h2>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div style="width:67%" class="rating"></div>
                                        </div>
                                        <span class="amount"><a href="#">1 Review(s)</a></span>
                                        <span class="separator">|</span>
                                        <span class="comment-amount"><a href="#">4 comment</a></span>
                                    </div>
                                    <div class="blog-attr">
                                    	<span>Post by <a href="#">Admin</a></span>
                                        <span class="separator">|</span>
                                        <span>On February 09, 2015</span>
                                    </div>
                                    <div class="desc">
                                       Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.
                                    </div>
                                    <a href="#" class="btn btn-default btn-readmore">Read more</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="item">
                        <div class="item-inner">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="images-container">
                                        <a class="product-image" title="Fusce aliquam" href="#" rel="author"><img alt="Fusce aliquam" src="images/blog/blog-06.jpg"></a>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <h2 class="product-name"><a title="" href="#">Fusce aliquam</a></h2>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div style="width:67%" class="rating"></div>
                                        </div>
                                        <span class="amount"><a href="#">1 Review(s)</a></span>
                                        <span class="separator">|</span>
                                        <span class="comment-amount"><a href="#">4 comment</a></span>
                                    </div>
                                    <div class="blog-attr">
                                    	<span>Post by <a href="#">Admin</a></span>
                                        <span class="separator">|</span>
                                        <span>On February 09, 2015</span>
                                    </div>
                                    <div class="desc">
                                       Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.
                                    </div>
                                    <a href="#" class="btn btn-default btn-readmore">Read more</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="item">
                        <div class="item-inner">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="images-container">
                                        <a class="product-image" title="Fusce aliquam" href="#" rel="author"><img alt="Fusce aliquam" src="images/blog/blog-07.jpg"></a>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <h2 class="product-name"><a title="" href="#">Fusce aliquam</a></h2>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div style="width:67%" class="rating"></div>
                                        </div>
                                        <span class="amount"><a href="#">1 Review(s)</a></span>
                                        <span class="separator">|</span>
                                        <span class="comment-amount"><a href="#">4 comment</a></span>
                                    </div>
                                    <div class="blog-attr">
                                    	<span>Post by <a href="#">Admin</a></span>
                                        <span class="separator">|</span>
                                        <span>On February 09, 2015</span>
                                    </div>
                                    <div class="desc">
                                       Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.
                                    </div>
                                    <a href="#" class="btn btn-default btn-readmore">Read more</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="item">
                        <div class="item-inner">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="images-container">
                                        <a class="product-image" title="Fusce aliquam" href="#" rel="author"><img alt="Fusce aliquam" src="images/blog/blog-08.jpg"></a>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <h2 class="product-name"><a title="" href="#">Fusce aliquam</a></h2>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div style="width:67%" class="rating"></div>
                                        </div>
                                        <span class="amount"><a href="#">1 Review(s)</a></span>
                                        <span class="separator">|</span>
                                        <span class="comment-amount"><a href="#">4 comment</a></span>
                                    </div>
                                    <div class="blog-attr">
                                    	<span>Post by <a href="#">Admin</a></span>
                                        <span class="separator">|</span>
                                        <span>On February 09, 2015</span>
                                    </div>
                                    <div class="desc">
                                       Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.
                                    </div>
                                    <a href="#" class="btn btn-default btn-readmore">Read more</a>
                                </div>
                            </div>
                        </div>
                    </li> --}}
                </ol>
                <nav>
                  <ul class="pagination">
                    <li><a href="#" aria-label="Previous">Prev</a></li>
                    <li class="divider"><span>|</span></li>
                    <li><a href="#">1</a></li>
                    <li class="divider"><span>|</span></li>
                    <li><a href="#">2</a></li>
                    <li class="divider"><span>|</span></li>
                    <li><a href="#" aria-label="Next">Next</a></li>
                  </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
