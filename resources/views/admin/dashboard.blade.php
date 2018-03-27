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
                    <a href="product"><img src="imgs/packing.svg" alt=""><span>Product</span></a>
                </div>
                <div class="col-md-2 ball">
                    <div class="n">{{$categories}}</div>
                    <a href="category"><img src="imgs/category.svg" alt=""><span>Category</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="discount"><img src="imgs/percentage.svg" alt=""><span>Discount</span></a>
                </div>
                <div class="col-md-2 ball">
                    <div class="n">{{$brands}}</div>
                    <a href="brand"><img src="imgs/creative-market.svg" alt=""><span>Brand</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="report"><img src="imgs/line-chart.svg" alt=""><span>Report</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="analysis"><img src="imgs/analytics.svg" alt=""><span>Analysis</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="purchase"><img src="imgs/buy.svg" alt=""><span>Purchase</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="sell"><img src="imgs/sell.svg" alt=""><span>Sell</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="payment"><img src="imgs/check.svg" alt=""><span>Payment</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="sells-history"><img src="imgs/order.svg" alt=""><span>History</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="stock"><img src="imgs/warehouse.svg" alt=""><span>Stock</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="refund"><img src="imgs/money-refund.svg" alt=""><span>Refund</span></a>
                </div>
                <div class="col-md-2 ball">
                    <div class="n">{{$customers}}</div>
                    <a href="customer"><i class="ion-android-people"></i><span>Customer</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="settings"><img src="imgs/settings.svg" alt=""><span>Setting</span></a>
                </div>
                <div class="col-md-2 ball">
                    <div class="n">{{$users}}</div>
                    <a href="user"><img src="imgs/users.svg" alt=""><span>User</span></a>
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


