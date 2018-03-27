<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Shop</title>
    <base href="/"/>
    <link rel="icon" type="image/png" href="shop.png">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/css/bb.css">
    <link rel="stylesheet" href="admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/css/ionicons.min.css">
</head>

<body>

<div class="waiting"><i class="fa fa-spinner fa-pulse"></i></div>

@include('admin.layout.header')

@include('admin.layout.toast')

<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="homcon">
            <div class="row">
                <div class="col-md-2 ball">
                    <div class="n">{{$products}}</div>
                    <a href="product"><img src="icons/packing.png" alt=""><span>Product</span></a>
                </div>
                <div class="col-md-2 ball">
                    <div class="n">{{$categories}}</div>
                    <a href="category"><img src="icons/category.png" alt=""><span>Category</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="discount"><img src="icons/percentage.png" alt=""><span>Discount</span></a>
                </div>
                <div class="col-md-2 ball">
                    <div class="n">{{$brands}}</div>
                    <a href="brand"><img src="icons/creative-market.png" alt=""><span>Brand</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="report"><img src="icons/line-chart.png" alt=""><span>Report</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="analysis"><img src="icons/analytics.png" alt=""><span>Analysis</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="purchase"><img src="icons/buy.png" alt=""><span>Purchase</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="sell"><img src="icons/sell.png" alt=""><span>Sell</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="payment"><img src="icons/check.png" alt=""><span>Payment</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="sells-history"><img src="icons/order.png" alt=""><span>History</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="stock"><img src="icons/warehouse.png" alt=""><span>Stock</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="refund"><img src="icons/money-refund.png" alt=""><span>Refund</span></a>
                </div>
                <div class="col-md-2 ball">
                    <div class="n">{{$customers}}</div>
                    <a href="customer"><i class="ion-android-people"></i><span>Customer</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="settings"><img src="icons/settings.png" alt=""><span>Setting</span></a>
                </div>
                <div class="col-md-2 ball">
                    <div class="n">{{$users}}</div>
                    <a href="user"><img src="icons/users.png" alt=""><span>User</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/bb.js"></script>
@show

</body>

</html>


