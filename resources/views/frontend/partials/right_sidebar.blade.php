<section id="sidebar-wrapper" class="col-12 col-lg-4">
    <div class="sidebar common-widget section" id="sidebar-right" name="Sidebar Right">
        <div class="widget Category p-3 mb-4">
            <div class="widget-title mb-2">
                <h3 class="title p-2">Danh mục</h3>
            </div>
            <div class="widget-content list-label">
                <ul class="list-unstyled mb-0">
                    @foreach($categories as $item)
                        <li class="ml-0"><a class="label-name" href="{!! URL('category',[$item->calias]) !!}.html">{!! $item->categoryname !!} ({!! $item->num !!})</a></li>
                    @endforeach()
                </ul>
            </div>
        </div>
        <div class="widget Label p-3">
            <div class="widget-title mb-2">
                <h3 class="title p-2">Thẻ</h3>
            </div>
            <div class="widget-content cloud-label">
                <ul class="list-unstyled mb-0 list-inline">
                    @foreach($tags as $item)
                        <li class="list-inline-item"><a class="label-name" href="{!! URL('tag',[$item->alias]) !!}.html">{!! $item->name !!}</a></li>
                    @endforeach()
                </ul>
            </div>
        </div>
        <div class="widget PopularPosts p-3 mb-4">
            <div class="widget-title mb-2">
                <h3 class="title"> Bài viết mới nhất </h3>
                <div class="widget-content">
                    @foreach($newestPost as $item)
                    <div class="post">
                        <div class="post-content">
                            <a class="post-image-link" href="{!! URL('post',[$item->alias]) !!}.html" title="{!! $item->name !!}">
                                    <img alt={!! $item->name !!}" class="post-thumb" src="{!! $item->image !!}">
                                </a>
                            <div class="post-info">
                                <h2 class="post-title">
                                    <a href="{!! URL('post',[$item->alias]) !!}.html">{!! $item->name !!}</a>
                                </h2>
                                <div class="post-meta">
                                    <span class="post-views">{!! $item->view !!}</span>
                                    <span class="post-date published" datetime="{!! $item->created_at !!}">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach()
                </div>
            </div>
        </div>
        <div class="widget PopularPosts p-3 mb-4">
            <div class="widget-title mb-2">
                <h3 class="title"> Bài viết xem nhiều </h3>
                <div class="widget-content">
                    @foreach($mostViewPost as $item)
                    <div class="post">
                        <div class="post-content">
                            <a class="post-image-link" href="{!! URL('post',[$item->alias]) !!}.html" title="{!! $item->name !!}">
                                    <img alt={!! $item->name !!}" class="post-thumb" src="{!! $item->image !!}">
                                </a>
                            <div class="post-info">
                                <h2 class="post-title">
                                    <a href="{!! URL('post',[$item->alias]) !!}.html">{!! $item->name !!}</a>
                                </h2>
                                <div class="post-meta">
                                    <span class="post-views">{!! $item->view !!}</span>
                                    <span class="post-date published" datetime="{!! $item->created_at !!}">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach()
                </div>
            </div>
        </div>
    </div>
</section>
