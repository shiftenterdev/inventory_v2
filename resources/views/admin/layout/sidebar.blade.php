<div class="col-md-2 sB">
    <div class="list-group sidebar">
        <a href="/" class="list-group-item {{Request::segment(1)==''?'active':''}}"><i class="fa fa-home"></i> Home</a>
        <a href="#" class="list-group-item"><i class="fa fa-shopping-basket"></i> Sell Product</a>
        <a href="product" class="list-group-item {{Request::segment(1)=='product'?'active':''}}">
            <i class="fa fa-cubes"></i> Product</a>
        <hr/>
        <a href="category" class="list-group-item {{Request::segment(1)=='category'?'active':''}}"><i class="fa fa-building"></i> Category</a>
        <hr>
        <a href="user" class="list-group-item"><i class="fa fa-users"></i> Users</a>
        <a href="#" class="list-group-item"><i class="fa fa-cogs"></i> Settings</a>
    </div>
</div>