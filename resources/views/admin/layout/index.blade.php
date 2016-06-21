<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Shop</title>
    <base href="/" />
    <link rel="icon" type="image/png" href="shop.png">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/css/bb.css">
    <link rel="stylesheet" href="admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/css/ionicons.min.css">
</head>

<body>

    <div class="waiting"><i class="fa fa-spinner fa-pulse"></i></div>

    @include('admin.layout.header')

    @include('admin.layout.toast')
    @if(!Request::is('/'))
    @include('admin.layout.sidebar')
    @endif

    @yield('content')

    @include('admin.layout.img_modal')

    @section('script')
        <script src="admin/js/jquery.min.js"></script>
        <script src="admin/js/bootstrap.min.js"></script>
        <script src="admin/js/bb.js"></script>
        <script src="admin/js/custom.js"></script>
    @show

</body>

</html>
