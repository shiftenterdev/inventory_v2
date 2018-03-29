<div class="r-slide animated slideInRight" id="rightSide" style="display: none">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="javascript:"> {{$title}}</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="javascript:" class="cls">Close <i class="fa fa-times"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div style="padding: 0 10px">
            @yield('slot')
        </div>
    </div>
</div>