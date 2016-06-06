<div class="col-md-2 sB">
    <div class="list-group sidebar">

        <a href="sell" class="list-group-item {{Request::segment(1)=='sell'?'active':''}}">
            <i class="fa fa-shopping-bag"></i> Sell</a>
        <a href="purchase" class="list-group-item {{Request::segment(1)=='purchase'?'active':''}}">
            <i class="fa fa-shopping-basket"></i> Purchase</a>
        <a href="payment" class="list-group-item {{Request::segment(1)=='purchase'?'active':''}}">
            <i class="fa fa-money"></i> Payment</a>
        <hr>

        <a href="brand" class="list-group-item {{Request::segment(1)=='brand'?'active':''}}">
            <i class="fa fa-contao"></i> Brand</a>
        <a href="category" class="list-group-item {{Request::segment(1)=='category'?'active':''}}">
            <i class="fa fa-clone"></i> Category</a>
        <a href="product" class="list-group-item {{Request::segment(1)=='product'?'active':''}}">
            <i class="fa fa-cube"></i> Product</a>
        <a href="discount" class="list-group-item {{Request::segment(1)=='discount'?'active':''}}">
            <i class="fa fa-crop"></i> Discount</a>
        <hr>

        <a href="sells-history" class="list-group-item {{Request::segment(1)=='sells-history'?'active':''}}">
            <i class="fa fa-list-alt"></i> Sell History</a>
        <a href="purchase-history" class="list-group-item {{Request::segment(1)=='purchase-history'?'active':''}}">
            <i class="fa fa-list-ul"></i> Purchase History</a>
        <hr>
        <a href="stock" class="list-group-item {{Request::segment(1)=='stock'?'active':''}}">
            <i class="fa fa-cubes"></i> Stock</a>
        <a href="refund" class="list-group-item {{Request::segment(1)=='refund'?'active':''}}">
            <i class="fa fa-share-square-o"></i> Refund/Return</a>
        <hr>
        <a href="customer" class="list-group-item {{Request::segment(1)=='customer'?'active':''}}">
            <i class="fa fa-user"></i> Customers</a>
        <a href="user" class="list-group-item {{Request::segment(1)=='user'?'active':''}}">
            <i class="fa fa-users"></i> Users</a>
        <a href="settings/update-password" class="list-group-item {{Request::segment(1)=='settings'?'active':''}}">
            <i class="fa fa-cogs"></i> Settings</a>
    </div>
</div>
