@extends('frontend.master')
@section('title','Search Results')
@section('description','Search Results')
@section('keyword','Search Results')
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
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="breadcrumb-item active">
                    @<span itemprop="name">Tìm kiếm</span>
                    <meta itemprop="position" content="2">
                </li>
            </ol>

            <div class="widget Blog">
                <div class="blog-posts hfeed index-post-wrap">
                    @foreach($posts as $item)
                        <section class="blog-post hentry index-post shadow-sm pr-lg-3">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="post-image-wrap">
                                        <a class="post-image-link" href="posts/php-khac-nhau-trong-ket-hop-mang-bang-array-merge-va.html" title="{!! $item->title !!}">
                                            <img class="post-thumb img-fluid lazy" data-src="{{URL::asset($item->image)}}" alt="{!! $item->name !!}" src="{{URL::asset($item->image)}}">
                                        </a>
                                        <span class="post-tag index-post-tag">
                                            <a href="category/php.html" alt="Category {!! $item->cname !!}" title="Category {!! $item->cname !!}">{!! $item->cname !!}</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-7 text-justify pl-lg-0">
                                    <div class="post-info px-2 px-lg-0">
                                        <h2 class="post-title">
                                            <a href="{!! URL('post',[$item->alias]) !!}.html">{!! $item->name !!}</a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="post-author"><a href="#" title="{!! $item->username !!}">{!! $item->username !!}</a></span>
                                            <span class="post-date published" datetime="{!! $item->created_at !!}">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                            <span class="post-views">226</span>
                                            <span class="post-reply"><a href="{!! URL('post',[$item->alias]) !!}.html#comments">Bình luận</a></span>
                                        </div>
                                        <div class="post-snippet">
                                            {!! $item->intro !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endforeach()

                </div>
            </div>
            <div class="table-responsive d-flex justify-content-center">
            </div>
        </div>
    </main>
@endsection
