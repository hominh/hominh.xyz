@extends('frontend.master')
@section('title','Contact')
@section('description','Contact')
@section('keyword','Contact')
@section('content')
    <main id="main-wrapper" class="col-12 col-lg-8 mb-4">
        <div class="container py-3 my-4 bg-white">
            <div class="border rounded">
                <div class="bg-white mt-4 jumbotron p-3">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h1 class="page-header text-center my-4">Liên hệ với Ho Minh Blog </h1>
                    <div class="text-center">
                        <p>Email: <a href="mailto:"></a></p>
                        <p>Facebook: <a href=""></a></p>
                    </div>
                    <h2 class="text-center">hoặc gửi lời nhắn</h2>
                </div>
                <div class="bg-light col-10 mb-5 offset-xl-1 py-5 center">
                    <form method="POST" action="{{ url('contact') }}" id="ajaxForm">
                         {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Tên</label>
                                    <input class="form-control" required="required" placeholder="Tên" name="name" type="text" id="name">
                                    <small class="text-danger"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Địa chỉ Email</label>
                                    <input class="form-control" required="required" placeholder="Địa chỉ Email" name="email" type="email" value="@gmail.com" id="email">
                                    <small class="text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input class="form-control" required="required" placeholder="Tiêu đề" name="title" type="text" id="title">
                            <small class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for="message">Lời nhắn</label>
                            <textarea class="form-control" required="required" placeholder="Lời nhắn" name="content" cols="50" rows="10" id="message"></textarea>
                            <small class="text-danger"></small>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LdH5XsUAAAAAJ--Ryw8sbb2jp7E3-jtw3MTSkrs"></div>
                        <br />
                        <div>
                            <input type="submit" class="btn btn-success btn-send" value="Gửi tin nhắn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
