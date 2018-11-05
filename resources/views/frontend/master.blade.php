<!DOCTYPE html>
<html lang="vi">
<head itemscope itemtype="http://schema.org/WebSite">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="@yield('description')">
<meta name="author" content="">
<meta name="csrf-token" content="">
<meta name="user_id" content="0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="vi" />
<title>@yield('title')</title>
<meta name="keyword" content="@yield('keyword')">
<meta property="fb:app_id" content="1315292411897301">
<meta name="google-site-verification" content="o5zcQFix1DIZk3bVSX2DUM9tYj6w0pU8I2_tOUsEf1s">
<meta property="og:title" content="Trang chủ" />
<meta property="og:description" content="Blog cá nhân Hồ Minh, chia sẻ kiến thức lập trình Laravel" />
<meta property="og:url" content="index.html" />
<meta property="og:type" content="website" />
<meta property="og:image" content="image/logo.jpg" />

<meta name="twitter:title" content="Trang chủ" />
<link rel="shortcut icon" href="image/icon/favicon.ico" type="image/x-icon">
<link rel="icon" href="image/icon/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="image/icon/favicon.ico">
<link rel="apple-touch-icon" sizes="57x57" href="image/icon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="image/icon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="image/icon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="image/icon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="image/icon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="image/icon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="image/icon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="image/icon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="image/icon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="image/icon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="image/icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="image/icon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="image/icon/favicon-16x16.png">
<link rel="manifest" href="image/icon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="image/icon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<!-- CSS -->
<link rel="stylesheet" href="{{ URL::asset('css/all.css') }}">

<link rel="stylesheet" href="{{ URL::asset('css/app00e6.css') }}">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
    @include('frontend/partials/header')
    <div class="container">
        <div class="row">
            @yield('content')
            @include('frontend/partials/right_sidebar')
        </div>
    </div>

    @include('frontend/partials/footer')
</body>
