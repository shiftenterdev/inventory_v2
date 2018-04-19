<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stocart</title>
    <base href="/" />
    <link rel="icon" type="image/png" href="/warehouse.png">
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/css/bb.css">
</head>

<body style="background: #fff">

    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 lP">
                <div class="text-center">
                    <img src="/warehouse.png" style="width: 100px;margin-bottom: 0px" alt="">
                </div>
                <div class="panel panel-info ">

                    <div class="panel-heading">
                        <div class="panel-title">
                            Admin Console
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="auth" class="form-horizontal" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Email</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="email" id="inputEmail" value="admin@demo.com" placeholder="Email" autofocus="on" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-3 control-label">Password</label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" name="password" id="inputPassword" value="demo123" placeholder="Password" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>