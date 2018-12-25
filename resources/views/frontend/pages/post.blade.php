@extends('frontend.master')
@section('title',$post[0]->title)
@section('description',$post[0]->description)
@section('keyword',$post[0]->keyword)
@section('content')
    <main id="main-wrapper" class="col-12 col-lg-8 mb-4">
        <div class="main section bg-white px-3 pt-3 pb-4" id="main" name="Main Posts">
            <div class="table-responsive d-flex justify-content-center">
            </div>

            <ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="breadcrumb rounded-0 mb">
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                    <a itemscope="" itemtype="http://schema.org/Thing" itemprop="item" href="{{ url('') }}">
                        <span itemprop="name">Trang chủ</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                    <a itemscope="" itemtype="http://schema.org/Thing" itemprop="item" href="{!! URL('category',[$post[0]->category->alias]) !!}.html">
                        <span itemprop="name">{{ $post[0]->category->name }}</span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="breadcrumb-item active">
                    <span itemprop="name">{{ $post[0]->name }}</span>
                    <meta itemprop="position" content="3">
                </li>
            </ol>
            <article class="widget Blog" id="single-post-203">
                <div class="blog-posts hfeed item-post-wrap">
                    <div class="blog-post hentry item-post">
                        <div class="post-content-wrap">
                            <header class="post-header blog-post-info">
                                <div class="post-thumb">
                                    <img class="w-100" alt="{!! $post[0]->name !!}" border="0" src="{!! $post[0]->image !!}" title="{!! $post[0]->name !!}">
                                </div>
                                <h1 class="post-title"> {{ $post[0]->name }} </h1>
                                <div class="post-meta">
                                    <span class="post-author"><a href="#" title="Author {{ $post[0]->username }}">{{ $post[0]->user->name }}</a></span>
                                    <span class="post-date published" datetime="{!! $post[0]->created_at !!}">{{ \Carbon\Carbon::parse($post[0]->created_at)->diffForHumans() }}</span>
                                    <span class="post-views">{!! $post[0]->view !!}</span>
                                    <span class="post-reply"><a href="{{ $post[0]->alias }}#comments">{!! $post[0]->view !!}</a></span>
                                </div>
                                <hr />
                            </header>
                            <section class="post-body post-content">
                                <div class="text-left">
                                    {!! $post[0]->content !!}
                                </div>
                            </section>
                            <div class="post-action mb-3 row">
                                <div class="col">
                                    <div class="btn-group d-flex" role="group">
                                        <button id="like" type="button" class="hover-primary btn btn-light border rounded-0 w-100"><i class="far fa-thumbs-up"></i> Like</button>
                                        <button id="comment" type="button" class="hover-success btn btn-light border w-100"><i class="far fa-comment-alt"></i> Comment</button>
                                        <button id="share" type="button" class="btn btn-light border rounded-0 w-100"><i class="far fa-share-square"></i> Share</button>
                                    </div>
                                </div>
                            </div>
                            <div id="rating" class="row mb-3 bg-light">
                                <section class="container text-right">
                                    <h2 class="text-black-50 mb-0 mt-2 sr-only">Đánh giá bài viết</h2>
                                    <div><img src="{{asset('photos/1/thichthilike1.png')}}" alt="Thích thì like"></div>
                                    <div class="starrating risingstar d-flex flex-row-reverse">
                                        <input type="radio" id="star5" name="rating" value="5">
                                        <label class="mb-0" for="star5" data-url="/posts/203/star/5" title="5 star"></label>
                                        <input type="radio" id="star4" name="rating" value="4">
                                        <label class="mb-0" for="star4" data-url="/posts/203/star/4" title="4 star"></label>
                                        <input type="radio" id="star3" name="rating" value="3">
                                        <label class="mb-0" for="star3" data-url="/posts/203/star/3" title="3 star"></label>
                                        <input type="radio" id="star2" name="rating" value="2">
                                        <label class="mb-0" for="star2" data-url="/posts/203/star/2" title="2 star"></label>
                                        <input type="radio" id="star1" name="rating" value="1">
                                        <label class="mb-0" for="star1" data-url="/posts/203/star/1" title="1 star"></label>
                                    </div>
                                    <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                                        <div itemprop="name" class="d-none">Laravel không chỉ là Framework, nó là cả một hệ sinh thái</div>
                                        <span itemprop="ratingValue">5</span>/5 <span itemprop="ratingCount">1</span> votes
                                        <meta itemprop="bestRating" content="5">
                                        <meta itemprop="worstRating" content="1">
                                        <div itemprop="itemReviewed" itemscope="" itemtype="http://schema.org/CreativeWork"></div>
                                    </div>
                                </section>
                            </div>
                            <div class="post-footer mb-4">
                                <div class="post-labels mb-3">
                                    <span class="text-black">
                                        <i class="fas fa-tags"></i> Tags:
                                    </span>
                                    <span>
                                        <a href="{!! URL('tag',[$post[0]->tag[0]['alias']]) !!}.html"><span class="label-link badge badge-dark" rel="tag">{!! $post[0]->tag[0]['name'] !!} </span></a>
                                    </span>
                                </div>
                                <section class="about-author border media p-3 shadow-sm">
                                    <img class="d-flex mr-3 author-avatar rounded-circle" alt="Author $post[0]->user->name" src="https://www.gravatar.com/avatar/ae9400c5091902176317fe0a0a662393?s=80&amp;d=identicon&amp;r=g">
                                    <div class="media-body">
                                        <h3 class="author-name">
                                            <span>Posted by:</span>
                                            <a class="author-link" alt="Author{!! $post[0]->user->name !!}" href="#" target="_blank">{!! $post[0]->user->name !!}</a>
                                        </h3>
                                        <div class="author-description">
                                            ...
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div id="comments">
                        <h2>Bình luận</h2>
                        <div class="comment-form">
                            <div class="card mb-3 comment-form">
                                <div class="card-body p-2">
                                    <form method="POST" action="{{ url('comment') }}" class="postAjax" id="comment0">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                        <input type="hidden" name="pid" id="pid" value="{!! $post[0]->id !!}" />
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Họ tên" name="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Email" name="email">
                                        </div>
                                        <textarea id="content" name="content" rows="1" class="form-control"></textarea>
                                        <br />
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-paper-plane"></i> Gửi bình luận</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="comment-show mb-5">
                            @foreach($comments as $item)
                                <div class="media mb-2 comment-parent" id="comment{!! $item['id'] !!}">
                                    <img class="d-flex mr-2 border rounded comment-avatar" src="https://www.gravatar.com/avatar/fb73417f95090111eadc8624ac52e4c4?s=80&amp;d=identicon&amp;r=g" alt="Vượng Nguyễn avatar" title="Vượng Nguyễn avatar">
                                    <div class="media-body comment-body">
                                        <div class="card bg-light p-2">
                                            <h5 class="mt-0">{!! $item['comment']['name'] !!}</h5>
                                            {!! $item['comment']['content'] !!}
                                        </div>
                                        <div>
                                            <ul class="list-inline mb-1 comment-action">
                                                <li class="list-inline-item">Like</li>
                                                <li class="list-inline-item">
                                                    <a data-scrollto="#reply{!! $item['id'] !!}" data-toggle="collapse" data-pell="{!! $item['id'] !!}" href="#reply{!! $item['id'] !!}" role="button" aria-expanded="false" aria-controls="" class="collapsed">Comment</a>
                                                </li>
                                                <li class="list-inline-item">{{ \Carbon\Carbon::parse($item['comment']['created_at'])->diffForHumans() }}</li>
                                            </ul>
                                        </div>
                                        <div class="collapse mb-1 reply" id="reply{!! $item['id'] !!}">
                                            <form method="POST" action="{{ url('comment') }}" class="postAjax" id="comment0">
                                                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                                <input type="hidden" name="pid" id="pid" value="{!! $post[0]->id !!}" />
                                                <input type="hidden" name="paid" id="paid" value="{!! $item['id'] !!}" />
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Họ tên" name="name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Email" name="email">
                                                </div>
                                                <textarea id="replycontent" name="content" rows="3" class="form-control"></textarea>
                                                <br />
                                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-paper-plane"></i> Gửi bình luận</button>
                                            </form>
                                        </div>
                                        @if(count($item['replies']) > 0)
                                            @foreach($item['replies'] as $replies)
                                            <div class="media mb-2 comment-children" id="comment{!! $replies['id'] !!}">
                                                <img class="d-flex mr-2 border rounded comment-avatar" src="https://www.gravatar.com/avatar/ae9400c5091902176317fe0a0a662393?s=80&amp;d=identicon&amp;r=g" alt="Chung Nguyễn avatar" title="Chung Nguyễn avatar">
                                                <div class="media-body">
                                                    <div class="card bg-light p-2">
                                                        <h5 class="mt-0">{!! $replies['name'] !!}</h5>
                                                        <p>{!! $replies['content'] !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach()
                                        @endif

                                    </div>
                                </div>
                            @endforeach()
                        </div>
                    </div>
                </div>
            </article>
            <div class="table-responsive d-flex justify-content-center">
            </div>
        </div>
    </main>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            toolbar: [
                { name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
                [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
		'/',																					// Line break - next group will be placed in new line.
                { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
	       ]
        };
    </script>
    <script>
        CKEDITOR.replace('content', options);
        CKEDITOR.replace('replycontent',options);
    </script>
@endsection
