@extends('admin.master')

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row">
        <form role="form" action="{!! route('admin.config.store') !!}"  method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
            <div class="col-md-8">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase">Add config</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label required">Address</label>
                                <input type="text" class="form-control" placeholder="Address" name="address">
                            </div>
                            <div class="form-group">
                                <label class="control-label required">Phone</label>
                                <input type="text" class="form-control" placeholder="Phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label class="control-label required">Email</label>
                                <input type="text" class="form-control" placeholder="Email" name="email">
                            </div>
                            <div class="form-group">
                                <label class="control-label required">Skype</label>
                                <input type="text" class="form-control" placeholder="Skype" name="skype">
                            </div>
                            <div class="form-group">
                              <label class="">Logo</label>
                                <div class="input-group">
                                  <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                      <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                  </span>
                                  <input id="thumbnail" class="form-control" type="text" name="image">
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;">
                            </div>
                            <div class="form-group">
                              <label class="">Logo footer</label>
                                <div class="input-group">
                                  <span class="input-group-btn">
                                    <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                                      <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                  </span>
                                  <input id="thumbnail2" class="form-control" type="text" name="logo_footer">
                                </div>
                                <img id="holder2" style="margin-top:15px;max-height:100px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-black-sunglo">
                            <span class="caption-subject bold uppercase">Search Engine Optimize</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="">SEO title</label>
                                <input type="text" class="form-control" placeholder="Title" name="title">
                                <div class="help-ts">
                                    <i class="fa fa-info-circle"></i>
                                    <span>Title tags are displayed on search engine results pages (SERPs) as the clickable headline for a given result, and are important for usability, SEO, and social sharing. The title tag of a web page is meant to be an accurate and concise description of a page's content.</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="">SEO keyword</label>
                                <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                                <div class="help-ts">
                                    <i class="fa fa-info-circle"></i>
                                    <span> Your SEO keywords are the key words and phrases in your web content that make it possible for people to find your site via search engines. A website that is well optimized for search engines "speaks the same language" as its potential visitor base with keywords for SEO that help connect searchers to your site.</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="">SEO description</label>
                                <input type="text" class="form-control" placeholder="Description" name="description">
                                <div class="help-ts">
                                    <i class="fa fa-info-circle"></i>
                                    <span> The meta description is a ~160 character snippet, a tag in HTML, that summarizes a page's content. Search engines show the meta description in search results mostly when the searched for phrase is contained in the description. Optimizing the meta description is a very important aspect of on-page SEO.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-black-sunglo">
                            <span class="caption-subject bold uppercase">Publish</span>
                        </div>
                    </div>
                    <div class="portlet-body form">

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Publish</button>
                            <button type="submit" class="btn blue">Publish & edit</button>
                        </div>
                    </div>
                </div>

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-black-sunglo">
                            <span class="caption-subject bold uppercase">Status</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-group">
                            <select class="form-control" name="status">
                                <option value="1">Actived</option>
                                <option value="0">Disable</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('content', options);
    </script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('#lfm').filemanager('image');
        $('#lfm2').filemanager('image');
    </script>
    <link href="{{ URL::asset('/admin/assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css') }}" rel="stylesheet" type="text/css" />
@endsection()
