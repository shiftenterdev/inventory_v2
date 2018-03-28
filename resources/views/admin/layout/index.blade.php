<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Shop</title>
    <base href="/"/>
    <link rel="icon" type="image/png" href="shop.png">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.bootstrap3.min.css">
    <link href="https://livecdn.github.io/cdn/date.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/css/animate.css">
    <link rel="stylesheet" href="admin/css/bb.css">
    <link rel="stylesheet" href="admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/css/ionicons.min.css">
    {{--jquery--}}
    <script src="admin/js/jquery.min.js"></script>
</head>

<body>

<div class="waiting"><i class="fa fa-spinner fa-pulse"></i></div>

@include('admin.layout.header')
@include('admin.layout.toast')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            @include('admin.layout.sidebar')
        </div>
        <div class="col-md-10">
            @yield('content')
        </div>
    </div>
</div>
@include('admin.layout.img_modal')

@section('script')
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
    <script src="https://livecdn.github.io/cdn/date.js"></script>
    <script src="admin/js/bb.js"></script>
    <script src="admin/js/custom.js"></script>
@show

</body>

</html>
