<div class="list-group sidebar">

    <a href="sell/create" class="list-group-item {{Request::is('sell/create')?'active':''}}">
        <i class="fa fa-shopping-bag"></i> New Sell</a>
    <a href="purchase/create" class="list-group-item {{Request::is('purchase/create')?'active':''}}">
        <i class="fa fa-shopping-basket"></i> New Purchase</a>
    <a href="payment" class="list-group-item {{Request::is('payment')?'active':''}}">
        <i class="fa fa-money"></i> Invoice Payment</a>
    <hr>

    <a href="sell" class="list-group-item {{Request::is('sell')?'active':''}}">
        <i class="fa fa-list-alt"></i> Sell List</a>
    <a href="purchase" class="list-group-item {{Request::is('purchase')?'active':''}}">
        <i class="fa fa-list-ul"></i> Purchase List</a>
    <hr>
    <a href="food" class="list-group-item {{Request::is('food')?'active':''}}">
        <i class="fa fa-coffee"></i> Food</a>
    <a href="food/category" class="list-group-item {{Request::is('food/category')?'active':''}}">
        <i class="fa fa-tasks"></i> Food Category</a>
    <a href="table" class="list-group-item {{Request::is('table')?'active':''}}">
        <i class="fa fa-cutlery"></i> Table</a>
    {{-- <a href="bill" class="list-group-item {{Request::is('bill')?'active':''}}">
        <i class="fa fa-file-text"></i> Bill</a> --}}
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
    <a href="report" class="list-group-item {{Request::segment(1)=='report'?'active':''}}">
        <i class="fa fa-bar-chart"></i> Report</a>

    <hr>
    <a href="stock" class="list-group-item {{Request::segment(1)=='stock'?'active':''}}">
        <i class="fa fa-cubes"></i> Stock</a>
    <a href="refund" class="list-group-item {{Request::segment(1)=='refund'?'active':''}}">
        <i class="fa fa-share-square-o"></i> Refund/Return</a>
    <hr>
    <a href="employee" class="list-group-item {{Request::segment(1)=='employee'?'active':''}}">
        <i class="fa fa-user-secret"></i> Employee</a>
    <hr>
    <a href="customer" class="list-group-item {{Request::segment(1)=='customer'?'active':''}}">
        <i class="fa fa-user"></i> Customers</a>
    <a href="user" class="list-group-item {{Request::segment(1)=='user'?'active':''}}">
        <i class="fa fa-users"></i> Users</a>
    <a href="role" class="list-group-item {{Request::segment(1)=='role'?'active':''}}">
        <i class="fa fa-user"></i> Roles</a>
    <a href="permission" class="list-group-item {{Request::segment(1)=='permission'?'active':''}}">
        <i class="fa fa-cog"></i> Permission</a>
    <a href="slider" class="list-group-item {{Request::segment(1)=='slider'?'active':''}}">
        <i class="fa fa-cog"></i> Slider</a>
    <a href="settings" class="list-group-item {{Request::segment(1)=='settings'?'active':''}}">
        <i class="fa fa-cogs"></i> Settings</a>
</div>