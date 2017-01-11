<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Shop</title>
    <base href="/" />
    <link rel="icon" type="image/png" href="shop.png">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="admin/css/bb.css">
    <link rel="stylesheet" href="admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/css/ionicons.min.css">
</head>

<body>

    <div class="waiting"><i class="fa fa-spinner fa-pulse"></i></div>

    @include('admin.layout.header')
    @include('admin.layout.toast')
    <div class="row">
        <div class="col-md-2">
            @include('admin.layout.sidebar')
        </div>
        <div class="col-md-10">
            @yield('content')
        </div>
    </div>
    @include('admin.layout.img_modal')

    @section('script')
        <script src="admin/js/jquery.min.js"></script>
        <script src="admin/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script src="admin/js/bb.js"></script>
        <script src="admin/js/custom.js"></script>
    @show

</body>

</html>
